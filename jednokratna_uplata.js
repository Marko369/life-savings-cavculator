import { addInputProcent, addInputValue, createPlMin, getAccumulatedAmount, getConfigValue, getDocument, getFutureAccumulatedSum, getFuturePension, getMonthlyIncomeRate, getNumOfPayments, PMT, rate, restrictValueMax, separator, writePrecent } from './calculations2.js';
import tarifnik from './config.js';

const rangeIDS = ["rangeIznosUplateJed", "rangeGodinaPocetkaUplateJed", "rangeGodinaPovlacenjeJed", "rangeStopaPrinosaJed", "rangePeriodIsplateGodinamaJed"];
const inputIDS = ["inputIznosUplateJed", "inputUlaznaNaknadaJad", "inputGodinaPocetkaUplateJed", "inputGodinaPovlacenjeJed", "inputPeriodAkumulacijeJed", "inputStopaPrinosaJed", "inputUplacenoJed", "inputZaradjenoJed", "inputAkumuliranaSumaJed", "inputPeriodIsplateGodinamaJed", "inputIznosIsplateMesecnoJed", "inputUkupanIznosIsplacenihSredstavaJed", "btnJednokratno"];
const notToWrite = ["inputIznosUplateJed", "inputGodinaPocetkaUplateJed", "inputGodinaPovlacenjeJed", "inputStopaPrinosaJed", "inputPeriodIsplateGodinamaJed", "btnJednokratno"];
const plusMinusIDS = [];

const objRanges = {};
const objInputs = {};
const objPlusMinus = {};
const globalValues = {};

createPlMin(plusMinusIDS, 5, "Jed");

getDocument(inputIDS, objInputs);
getDocument(rangeIDS, objRanges);
getDocument(plusMinusIDS, objPlusMinus);

const { btnJednokratno } = objInputs;

rangeIDS.forEach(element => {
    objRanges[element].addEventListener("input", (e) => {
        const prop = element.replace("range", "input");
        objInputs[prop].dataset.value = e.target.value;
        getFromInput(objInputs);
        calculate();
        write();
    });
});

btnJednokratno.addEventListener("click", () => {
    getFromInput(objInputs);
    calculate();
    write();
    renderanjePieJednokratnaUplata();
});

callPlusMinus(objPlusMinus, objInputs, objRanges);
changInputFields(objInputs);

getFromInput(objInputs);
calculate();
write();

function getFromInput({ inputIznosUplateJed, inputGodinaPocetkaUplateJed, inputGodinaPovlacenjeJed, inputStopaPrinosaJed, inputPeriodIsplateGodinamaJed }) {
    const parseOrDefault = (el) => {
        let val = parseFloat(el.dataset.value);
        if (isNaN(val)) {
            val = parseFloat(el.getAttribute('data-value')) || 0;
            el.dataset.value = val;
        }
        return val;
    };

    globalValues.inputIznosUplateJedVal = parseOrDefault(inputIznosUplateJed);
    globalValues.inputGodinaPocetkaUplateJedVal = parseOrDefault(inputGodinaPocetkaUplateJed);
    globalValues.inputGodinaPovlacenjeJedVal = parseOrDefault(inputGodinaPovlacenjeJed);
    globalValues.inputStopaPrinosaJedVal = parseOrDefault(inputStopaPrinosaJed);
    globalValues.inputPeriodIsplateGodinamaJedVal = parseOrDefault(inputPeriodIsplateGodinamaJed);
}

// ------------------ CALCULATION FUNCTIONS ------------------
function calculate() {
    let periodAkumulacijeJedSumCheck = globalValues.inputGodinaPovlacenjeJedVal - globalValues.inputGodinaPocetkaUplateJedVal;

    globalValues.inputUlaznaNaknadaJadVal = getConfigValue(globalValues.inputIznosUplateJedVal, tarifnik);
    globalValues.inputPeriodAkumulacijeJedVal = periodAkumulacijeJedSumCheck >= 0 ? periodAkumulacijeJedSumCheck : 0;
    globalValues.inputUplacenoJedVal = globalValues.inputIznosUplateJedVal;
    globalValues.inputAkumuliranaSumaJedVal = accumulateSum(globalValues);
    globalValues.inputZaradjenoJedVal = earned(globalValues);
    globalValues.inputIznosIsplateMesecnoJedVal = monthlyPay(globalValues);
    globalValues.inputUkupanIznosIsplacenihSredstavaJedVal = sumPaid(globalValues);
}

function write() {
    inputIDS.forEach(element => {
        if (!notToWrite.includes(element)) {
            const val = parseFloat(globalValues[`${element}Val`]);
            objInputs[element].dataset.value = val;
            const precentArr = ["inputUlaznaNaknadaJad"];
            let shouldAddPrecent = writePrecent(objInputs[element].id, precentArr);
            objInputs[element].value = shouldAddPrecent ? `${separator(val.toFixed(2))}%` : separator(val.toFixed(2));
        }
    });
}

// ------------------ HELPER CALC FUNCTIONS ------------------
function sumPaid({ inputIznosIsplateMesecnoJedVal, inputPeriodIsplateGodinamaJedVal }) {
    return inputIznosIsplateMesecnoJedVal * inputPeriodIsplateGodinamaJedVal * 12;
}

function monthlyPay({ inputAkumuliranaSumaJedVal, inputStopaPrinosaJedVal, inputPeriodIsplateGodinamaJedVal }) {
    let monthlyIncomeRate = getMonthlyIncomeRate(inputStopaPrinosaJedVal);
    let _numOfPayments = getNumOfPayments(inputPeriodIsplateGodinamaJedVal);
    let futurePension = getFuturePension(inputAkumuliranaSumaJedVal, monthlyIncomeRate, _numOfPayments);

    let ir = rate(inputStopaPrinosaJedVal);
    let nper = inputPeriodIsplateGodinamaJedVal * 12;
    let pv = inputAkumuliranaSumaJedVal * -1;
    let pmt = PMT(ir, nper, pv);

    return inputStopaPrinosaJedVal ? futurePension : pmt;
}

function earned({ inputAkumuliranaSumaJedVal, inputUplacenoJedVal }) {
    return inputAkumuliranaSumaJedVal - inputUplacenoJedVal;
}

function accumulateSum({ inputIznosUplateJedVal, inputUlaznaNaknadaJadVal, inputStopaPrinosaJedVal, inputPeriodAkumulacijeJedVal }) {
    let monthlyIncome = inputIznosUplateJedVal;
    let ulaznaNaknada = inputUlaznaNaknadaJadVal;
    let accumulatedAmount = getAccumulatedAmount(monthlyIncome, ulaznaNaknada);
    return getFutureAccumulatedSum(accumulatedAmount, inputStopaPrinosaJedVal, inputPeriodAkumulacijeJedVal);
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

    if (btnType === "buttonPlusJed") {
        plusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal);
    } else {
        minusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal);
    }
}

function plusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal) {
    if (currentVal < fieldMax) {
        if (inputField.id === "inputStopaPrinosaJed") {
            let nextValue = parseFloat(currentVal) + parseFloat(fieldRange);
            addInputProcent(inputField, nextValue.toFixed(2), "inputStopaPrinosaJed");
            rangeField.value = nextValue;
        } else {
            let nextValue = parseInt(currentVal) + parseInt(fieldRange);
            addInputValue(inputField, nextValue, "inputStopaPrinosaJed");
            rangeField.value = nextValue;
        }
    }
}

function minusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal) {
    if (currentVal && currentVal > 0) {
        if (inputField.id === "inputStopaPrinosaJed") {
            let nextValue = parseFloat(currentVal) - parseFloat(fieldRange);
            addInputProcent(inputField, nextValue.toFixed(2), "inputStopaPrinosaJed");
            rangeField.value = nextValue;
        } else {
            let nextValue = parseInt(currentVal) - parseInt(fieldRange);
            addInputValue(inputField, nextValue, "inputStopaPrinosaJed");
            rangeField.value = nextValue;
        }
    } else {
        let defaultVal = parseFloat(inputField.getAttribute('data-value')) || 0;
        inputField.dataset.value = defaultVal;
        addInputValue(inputField, defaultVal, inputField.id);
        rangeField.value = defaultVal;
        const output = document.querySelector(`output[name="${rangeField.id}"]`);
        if (output) output.textContent = (inputField.id === 'inputStopaPrinosaJed') ? defaultVal.toFixed(2)+'%' : separator(defaultVal.toFixed(2));
    }
}

// --------------------- CHANG INPUT FIELDS ---------------------
function changInputFields(objInputsArg) {
    const { inputIznosUplateJed, inputGodinaPocetkaUplateJed, inputGodinaPovlacenjeJed, inputStopaPrinosaJed, inputPeriodIsplateGodinamaJed } = objInputsArg;
    const inputsArray = [inputIznosUplateJed, inputGodinaPocetkaUplateJed, inputGodinaPovlacenjeJed, inputStopaPrinosaJed, inputPeriodIsplateGodinamaJed];

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

        if (inputEl.id === 'inputStopaPrinosaJed') {
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
        const isPercent = element.id === "inputStopaPrinosaJed";

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
document.addEventListener("DOMContentLoaded", renderanjePieJednokratnaUplata, false);

function renderanjePieJednokratnaUplata() {
    globalValues.renderanjePrvo = parseFloat(inputIznosUplateJed.dataset.value);
    globalValues.renderanjeDrugo = parseFloat(inputZaradjenoJed.dataset.value);

    var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var lang = document.documentElement.lang;
    var label1, label2;

    if ("en-GB" === lang) {
        label1 = "Total Deposited";
        label2 = "Earned";
    } else {
        label1 = "Ukupno uplaćeno";
        label2 = "Zarađeno";
    }

    var chart = new CanvasJS.Chart("chartContainerJednokratna", {
        animationEnabled: true,
        legend: {
            horizontalAlign: "center",
            verticalAlign: "bottom",
            fontSize: (w < 768) ? "16" : "18",
            fontColor: "#231F20",
            markerMargin: 10,
        },
        data: [{
            type: "pie",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "#fff",
            indexLabelFontSize: "11",
            startAngle: 270,
            radius: 150,
            showInLegend: "true",
            legendText: "{label}",
            legendPosition: "top",
            yValueFormatString: "#,###.##",
            indexLabel: "{y}",
            dataPoints: [
                { y: globalValues.renderanjePrvo, label: label1, color: '#de6470' },
                { y: globalValues.renderanjeDrugo, label: label2, color: '#dd2e3e' },
            ]
        }]
    });
    chart.render();
}
