import { addInputProcent, addInputValue, createPlMin, FV, getAccumulatedAmount, getAccumulatedSum, getConfigValue, getDocument, getFutureAccumulatedSum, getFuturePension, getMonthlyIncomeRate, getNumOfPayments, percenageToNumber, PMT, rate, restrictValueMax, separator, writePrecent } from './calculations2.js';
import tarifnik from './config.js';

const rangeIDS = ["rangeTrenutnoStanjeKli", "rangeIznosUplateMesKli", "rangeGodinaPocetkaUplateKli", "rangeGodinaPovlacenjeKli", "rangeStopaPrinosaKli", "rangePeriodIsplateGodinamaKli"];
const inputIDS = ["inputTrenutnoStanjeKli", "inputIznosUplateMesKli", "inputUlaznaNaknadaKli", "inputGodinaPocetkaUplateKli", "inputGodinaPovlacenjeKli", "inputPeriodAkumulacijeKli", "inputStopaPrinosaKli", "inputUkupnoUplacenoKli", "inputZaradjenoKli", "inputAkumuliranaTrenutnoKli", "inputAkumuliranaMesKli", "inputAkumuliranaSumaKli", "inputPeriodIsplateGodinamaKli", "inputIznosIsplateMesecnoKli", "inputUkupanIznosIsplacenihSredstavaKli", "btnKli"];
const notToWrite = ["inputIznosUplateMesKli", "inputGodinaPovlacenjeKli", "inputGodinaPocetkaUplateKli", "inputStopaPrinosaKli", "inputTrenutnoStanjeKli", "inputPeriodIsplateGodinamaKli", "btnKli"];
const plusMinusIDS = [];

const objRanges = {};
const objInputs = {};
const objPlusMinus = {};
const globalValues = {};

createPlMin(plusMinusIDS, 6, "Kor");

getDocument(inputIDS, objInputs);
getDocument(rangeIDS, objRanges);
getDocument(plusMinusIDS, objPlusMinus);

const { btnKli } = objInputs;

rangeIDS.forEach(element => {
    objRanges[element].addEventListener("input", (e) => {
        const prop = element.replace("range", "input");
        objInputs[prop].dataset.value = e.target.value;
        getFromInput(objInputs);
        calculate();
        write();
    });
});

btnKli.addEventListener("click", () => {
    getFromInput(objInputs);
    calculate();
    write();
    renderanjePieUplataPostojeciKlijent();
});

callPlusMinus(objPlusMinus, objInputs, objRanges);
changInputFields(objInputs);

getFromInput(objInputs);
calculate();
write();

function getFromInput({ inputIznosUplateMesKli, inputGodinaPovlacenjeKli, inputGodinaPocetkaUplateKli, inputStopaPrinosaKli, inputTrenutnoStanjeKli, inputPeriodIsplateGodinamaKli }) {
    const parseOrDefault = (el) => {
        let val = parseFloat(el.dataset.value);
        if (isNaN(val)) {
            val = parseFloat(el.getAttribute('data-value')) || 0;
            el.dataset.value = val;
        }
        return val;
    };

    globalValues.inputIznosUplateMesKliVal = parseOrDefault(inputIznosUplateMesKli);
    globalValues.inputGodinaPovlacenjeKliVal = parseOrDefault(inputGodinaPovlacenjeKli);
    globalValues.inputGodinaPocetkaUplateKliVal = parseOrDefault(inputGodinaPocetkaUplateKli);
    globalValues.inputStopaPrinosaKliVal = parseOrDefault(inputStopaPrinosaKli);
    globalValues.inputTrenutnoStanjeKliVal = parseOrDefault(inputTrenutnoStanjeKli);
    globalValues.inputPeriodIsplateGodinamaKliVal = parseOrDefault(inputPeriodIsplateGodinamaKli);
}

// ------------------ CALCULATION FUNCTIONS ------------------
function calculate() {
    let periodAkumulacijePostSumCheck = globalValues.inputGodinaPovlacenjeKliVal - globalValues.inputGodinaPocetkaUplateKliVal;

    globalValues.inputUlaznaNaknadaKliVal = getConfigValue(globalValues.inputIznosUplateMesKliVal, tarifnik);
    globalValues.inputPeriodAkumulacijeKliVal = periodAkumulacijePostSumCheck >= 0 ? periodAkumulacijePostSumCheck : 0;
    globalValues.inputUkupnoUplacenoKliVal = 12 * globalValues.inputPeriodAkumulacijeKliVal * globalValues.inputIznosUplateMesKliVal;
    globalValues.inputAkumuliranaTrenutnoKliVal = accumulateSum(globalValues);
    globalValues.inputAkumuliranaMesKliVal = accumulateMonSum(globalValues);
    globalValues.inputAkumuliranaSumaKliVal = (globalValues.inputAkumuliranaTrenutnoKliVal + globalValues.inputAkumuliranaMesKliVal).toFixed(2);
    globalValues.inputZaradjenoKliVal = earnedFunds(globalValues).toFixed(2);
    globalValues.inputIznosIsplateMesecnoKliVal = monthlyPay(globalValues);
    globalValues.inputUkupanIznosIsplacenihSredstavaKliVal = sumPaid(globalValues).toFixed(2);
}

function write() {
    inputIDS.forEach(element => {
        if (!notToWrite.includes(element)) {
            const val = parseFloat(globalValues[`${element}Val`]);
            objInputs[element].dataset.value = val;
            const precentArr = ["inputUlaznaNaknadaKli"];
            let shouldAddPrecent = writePrecent(objInputs[element].id, precentArr);
            objInputs[element].value = shouldAddPrecent ? `${separator(val.toFixed(2))}%` : separator(val.toFixed(2));
        }
    });
}

// ------------------ HELPER CALC FUNCTIONS ------------------
function sumPaid({ inputIznosIsplateMesecnoKliVal, inputPeriodIsplateGodinamaKliVal }) {
    return inputIznosIsplateMesecnoKliVal * inputPeriodIsplateGodinamaKliVal * 12;
}

function monthlyPay({ inputAkumuliranaSumaKliVal, monthlyIncomeRate, inputPeriodIsplateGodinamaKliVal, inputStopaPrinosaKliVal, inputUkupanIznosIsplacenihSredstavaKliVal }) {
    let _numOfPayments = getNumOfPayments(inputPeriodIsplateGodinamaKliVal);
    let futurePension = getFuturePension(inputAkumuliranaSumaKliVal, monthlyIncomeRate, _numOfPayments);

    let ir = rate(inputStopaPrinosaKliVal);
    let nper = inputPeriodIsplateGodinamaKliVal * 12;
    let pv = inputAkumuliranaSumaKliVal * -1;
    let pmt = PMT(ir, nper, pv);

    return inputStopaPrinosaKliVal ? futurePension : pmt;
}

function earnedFunds({ inputAkumuliranaSumaKliVal, inputTrenutnoStanjeKliVal, inputUkupnoUplacenoKliVal }) {
    return inputAkumuliranaSumaKliVal - inputTrenutnoStanjeKliVal - inputUkupnoUplacenoKliVal;
}

function accumulateSum({ inputTrenutnoStanjeKliVal, inputStopaPrinosaKliVal, inputPeriodAkumulacijeKliVal }) {
    let accumulatedSum = getFutureAccumulatedSum(inputTrenutnoStanjeKliVal, inputStopaPrinosaKliVal, inputPeriodAkumulacijeKliVal);

    let ir = rate(inputStopaPrinosaKliVal);
    let nper = inputPeriodAkumulacijeKliVal * 12;
    let fvValue = FV(ir, nper, 0, inputTrenutnoStanjeKliVal, 1) * -1;
    return inputStopaPrinosaKliVal ? accumulatedSum : fvValue;
}

function accumulateMonSum({ inputIznosUplateMesKliVal, inputUlaznaNaknadaKliVal, inputPeriodAkumulacijeKliVal, inputStopaPrinosaKliVal }) {
    let monthlyIncome = inputIznosUplateMesKliVal;
    let ulaznaNaknada = inputUlaznaNaknadaKliVal;
    let accumulatedAmount = getAccumulatedAmount(monthlyIncome, ulaznaNaknada);
    let monthlyIncomeRate = globalValues.monthlyIncomeRate = getMonthlyIncomeRate(inputStopaPrinosaKliVal);
    let numOfPayments = globalValues.numOfPayments = getNumOfPayments(inputPeriodAkumulacijeKliVal);
    let accumulatedSum = getAccumulatedSum(accumulatedAmount, monthlyIncomeRate, numOfPayments);

    let ir = rate(inputStopaPrinosaKliVal);
    let nper = inputPeriodAkumulacijeKliVal * 12;
    let naknadaProcenat = percenageToNumber(ulaznaNaknada);
    let pmt = monthlyIncome * (1 - naknadaProcenat);
    let fvValue = FV(ir, nper, pmt, 0, 1) * -1;

    return inputStopaPrinosaKliVal ? accumulatedSum : fvValue;
}

// ------------------ PLUS/MINUS ------------------
function callPlusMinus(objPlusMinusArg, objInputsArg, objRangesArg) {
    for (let i in objPlusMinusArg) {
        objPlusMinusArg[i].addEventListener("click", () => {
            let btn = `${i}`;
            let idField = objPlusMinusArg[i].dataset.field;
            onPlMiClick(btn, idField, objInputsArg, objRangesArg);
            getFromInput(objInputsArg);
            calculate();
            write();
        });
    }
}

function onPlMiClick(btn, idField, objInputsArg, objRangesArg) {
    let btnType = btn.slice(0, -1);
    let inputId = idField.replace("range", "input");
    let inputField = objInputsArg[inputId];
    let rangeField = objRangesArg[idField];
    let fieldRange = parseFloat(rangeField.step);
    let fieldMax = parseFloat(rangeField.max);
    let currentVal = parseFloat(rangeField.value);

    if (btnType === "buttonPlusKor") {
        plusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal);
    } else {
        minusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal);
    }
}

function plusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal) {
    if (currentVal < fieldMax) {
        if (inputField.id === "inputStopaPrinosaKli") {
            let nextValue = parseFloat(currentVal) + parseFloat(fieldRange);
            addInputProcent(inputField, nextValue.toFixed(2), "inputStopaPrinosaKli");
            rangeField.value = nextValue;
        } else {
            let nextValue = parseInt(currentVal) + parseInt(fieldRange);
            addInputValue(inputField, nextValue, "inputStopaPrinosaKli");
            rangeField.value = nextValue;
        }
    }
}

function minusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal) {
    if (currentVal && currentVal > 0) {
        if (inputField.id === "inputStopaPrinosaKli") {
            let nextValue = parseFloat(currentVal) - parseFloat(fieldRange);
            addInputProcent(inputField, nextValue.toFixed(2), "inputStopaPrinosaKli");
            rangeField.value = nextValue;
        } else {
            let nextValue = parseInt(currentVal) - parseInt(fieldRange);
            addInputValue(inputField, nextValue, "inputStopaPrinosaKli");
            rangeField.value = nextValue;
        }
    } else {
        let defaultVal = parseFloat(inputField.getAttribute('data-value')) || 0;
        inputField.dataset.value = defaultVal;
        addInputValue(inputField, defaultVal, inputField.id);
        rangeField.value = defaultVal;
        // odmah update bubble output
        const output = document.querySelector(`output[name="${rangeField.id}"]`);
        if (output) output.textContent = (inputField.id === 'inputStopaPrinosaKli') ? defaultVal.toFixed(2)+'%' : separator(defaultVal.toFixed(2));
    }
}

// --------------------- CHANG INPUT FIELDS ---------------------
function changInputFields(objInputsArg) {
    const { inputTrenutnoStanjeKli, inputIznosUplateMesKli, inputGodinaPocetkaUplateKli, inputGodinaPovlacenjeKli, inputStopaPrinosaKli, inputPeriodIsplateGodinamaKli } = objInputsArg;

    const inputsArray = [inputTrenutnoStanjeKli, inputIznosUplateMesKli, inputGodinaPocetkaUplateKli, inputGodinaPovlacenjeKli, inputStopaPrinosaKli, inputPeriodIsplateGodinamaKli];

    function syncRangeAndBubble(inputEl, numericValue) {
        const rangeId = inputEl.id.replace(/^input/, 'range');
        const range = document.getElementById(rangeId);
        if (range) {
            range.value = numericValue;
            range.dataset.value = numericValue;
            range.dispatchEvent(new Event('input'));
        }

        const output = document.querySelector(`output[name="${rangeId}"]`);
        if (!output) return;

        if (inputEl.id === 'inputStopaPrinosaKli') {
            output.textContent = Number(numericValue).toFixed(2) + '%';
        } else {
            let outStr = Math.round(numericValue) === Number(numericValue)
                ? separator(Number(numericValue).toFixed(0))
                : separator(Number(numericValue).toFixed(2));
            output.textContent = outStr;
        }
    }

    inputsArray.forEach(element => {
        if (!element) return;
        const isPercent = element.id === "inputStopaPrinosaKli";

        element.addEventListener("focus", (e) => {
            if (isPercent) {
                element.value = element.dataset.value ? Number(element.dataset.value).toFixed(2) : '';
            } else {
                element.value = element.dataset.value ? element.dataset.value.replace(/\./g,'') : '';
            }
        });

        element.addEventListener("keyup", (e) => {
            let raw = e.target.value.replace('%', '').trim();
            let numeric = parseFloat(raw.replace(',', '.'));

            if (isNaN(numeric)) {
                // PATCH: ako je prazno polje, odmah prikaži default
                numeric = parseFloat(element.getAttribute('data-value')) || 0;
                element.value = isPercent ? numeric.toFixed(2) : separator(numeric.toFixed(2));
                syncRangeAndBubble(element, numeric);
            }

            element.dataset.value = numeric;
        });

        element.addEventListener("blur", (e) => {
            let raw = e.target.value.replace('%', '').trim();
            let numeric = parseFloat(raw.replace(',', '.'));
            if (isNaN(numeric)) numeric = parseFloat(element.getAttribute('data-value')) || 0;

            if (isPercent) {
                if (numeric > 10) numeric = 10;
                if (numeric < 0) numeric = 0;
                addInputProcent(element, numeric.toFixed(2), element.id);
            } else {
                addInputValue(element, numeric, element.id);
            }

            syncRangeAndBubble(element, numeric);
            getFromInput(objInputsArg);
            calculate();
            write();
        });
    });
}

// --------------------- PIE CHART ---------------------
document.addEventListener("DOMContentLoaded", renderanjePieUplataPostojeciKlijent, false);

function renderanjePieUplataPostojeciKlijent() {
    globalValues.renderanjePrvo = parseFloat(inputTrenutnoStanjeKli.dataset.value);
    globalValues.renderanjeDrugo = parseFloat(inputUkupnoUplacenoKli.dataset.value);
    globalValues.renderanjeTrece = parseFloat(inputZaradjenoKli.dataset.value);

    var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var lang = document.documentElement.lang;
    var label1, label2, label3;

    if ("en-GB" === lang) {
        label1 = "Current Status";
        label2 = "Deposited Amount";
        label3 = "Earned";
    } else {
        label1 = "Trenutno stanje";
        label2 = "Uplaćena suma";
        label3 = "Zarađeno";
    }

    var chart = new CanvasJS.Chart("chartContainerUplataPostojeci", {
        animationEnabled: true,
        legend: {
            horizontalAlign: "center",
            verticalAlign: "bottom",
            fontSize: (w < 768) ? "16" : "18",
            fontColor: "#231F20",
            markerMargin: 10,
            markerType: "square",
        },
        data: [{
            type: "pie",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "#fff",
            indexLabelFontSize: "11",
            startAngle: 270,
            showInLegend: "true",
            legendText: "{label}",
            legendPosition: "top",
            yValueFormatString: "#,###.##",
            indexLabel: "{y}",
            dataPoints: [
                { y: globalValues.renderanjePrvo, label: label1, color: '#de6470' },
                { y: globalValues.renderanjeDrugo, label: label2, color: '#f7d0d4' },
                { y: globalValues.renderanjeTrece, label: label3, color: '#dd2e3e' },
            ]
        }]
    });
    chart.render();
}
