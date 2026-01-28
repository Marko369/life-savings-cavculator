import { 
    addInputProcent, addInputValue, createPlMin, FV, 
    getAccumulatedAmount, getAccumulatedSum, getConfigValue, 
    getDocument, getFuturePension, getMonthlyIncomeRate, 
    getNumOfPayments, percenageToNumber, PMT, rate, 
    separator, writePrecent 
} from './calculations2.js';
import tarifnik from './config.js';

const rangeIDS = [
    "rangeIznosUplateClanaMes", "rangeIznosUplatePoslodavcaMes", 
    "rangeGodinaPocetkaUplateMes", "rangeGodinaPovlacenjeMes", 
    "rangeStopaPrinosaMes", "rangePeriodIsplateGodinamaMes"
];
const inputIDS = [
    "inputIznosUplateClanaMes", "inputIznosUplatePoslodavcaMes", 
    "inputUlaznaNaknadaClanaMes", "inputUlaznaNaknadaPoslodavcaMes", 
    "inputGodinaPocetkaUplateMes", "inputGodinaPovlacenjeMes", 
    "inputPeriodAkumulacijeMes", "inputStopaPrinosaMes", 
    "inputUkupnoUplacenoClanaMes", "inputUkupnoUplacenoPoslodavcaMes", 
    "inputZaradjenoMes", "inputAkumuliranaSumaClanaMes", 
    "inputAkumuliranaSumaPoslodavcaMes", "inputAkumuliranaSumaMes", 
    "inputPeriodIsplateGodinamaMes", "inputIznosIsplateMesecnoMes", 
    "inputUkupanIznosIsplacenihSredstavaMes", "btnMesecno"
];
const notToWrite = [
    "inputIznosUplateClanaMes", "inputIznosUplatePoslodavcaMes", 
    "inputGodinaPovlacenjeMes", "inputGodinaPocetkaUplateMes", 
    "inputStopaPrinosaMes", "inputPeriodIsplateGodinamaMes", 
    "btnMesecno"
];

const plusMinusIDS = [];
const objRanges = {};
const objInputs = {};
const objPlusMinus = {};
const globalValues = {};

createPlMin(plusMinusIDS, 6, "Mes");
getDocument(inputIDS, objInputs);
getDocument(rangeIDS, objRanges);
getDocument(plusMinusIDS, objPlusMinus);

const { btnMesecno } = objInputs;

// Range event listener
rangeIDS.forEach(element => {
    objRanges[element].addEventListener("input", (e) => {
        const prop = element.replace("range", "input");
        objInputs[prop].dataset.value = e.target.value;
        getFromInput(objInputs);
        calculate();
        write();
    });
});

// Button calculate
btnMesecno.addEventListener("click", () => {
    getFromInput(objInputs);
    calculate();
    write();
    renderanjePieMesecne();
});

callPlusMinus(objPlusMinus, objInputs, objRanges);
changInputFields(objInputs);

getFromInput(objInputs);
calculate();
write();

function getFromInput({ inputIznosUplateClanaMes, inputIznosUplatePoslodavcaMes, inputGodinaPovlacenjeMes, inputGodinaPocetkaUplateMes, inputStopaPrinosaMes, inputPeriodIsplateGodinamaMes }) {
    const parseOrDefault = (el) => {
        let val = parseFloat(el.dataset.value);
        if (isNaN(val)) {
            val = parseFloat(el.getAttribute('data-value')) || 0;
            el.dataset.value = val;
        }
        return val;
    };
    globalValues.inputIznosUplateClanaMesVal = parseOrDefault(inputIznosUplateClanaMes);
    globalValues.inputIznosUplatePoslodavcaMesVal = parseOrDefault(inputIznosUplatePoslodavcaMes);
    globalValues.inputGodinaPovlacenjeMesVal = parseOrDefault(inputGodinaPovlacenjeMes);
    globalValues.inputGodinaPocetkaUplateMesVal = parseOrDefault(inputGodinaPocetkaUplateMes);
    globalValues.inputStopaPrinosaMesVal = parseOrDefault(inputStopaPrinosaMes);
    globalValues.inputPeriodIsplateGodinamaMesVal = parseOrDefault(inputPeriodIsplateGodinamaMes);
}

// ------------------ CALCULATIONS ------------------
function calculate() {
    let periodAkumulacije = globalValues.inputGodinaPovlacenjeMesVal - globalValues.inputGodinaPocetkaUplateMesVal;
    globalValues.inputPeriodAkumulacijeMesVal = periodAkumulacije >= 0 ? periodAkumulacije : 0;

    globalValues.inputUlaznaNaknadaClanaMesVal = getConfigValue(globalValues.inputIznosUplateClanaMesVal, tarifnik);
    globalValues.inputUlaznaNaknadaPoslodavcaMesVal = getConfigValue(globalValues.inputIznosUplatePoslodavcaMesVal, tarifnik);

    globalValues.inputUkupnoUplacenoClanaMesVal = 12 * globalValues.inputPeriodAkumulacijeMesVal * globalValues.inputIznosUplateClanaMesVal;
    globalValues.inputUkupnoUplacenoPoslodavcaMesVal = 12 * globalValues.inputPeriodAkumulacijeMesVal * globalValues.inputIznosUplatePoslodavcaMesVal;

    globalValues.inputAkumuliranaSumaClanaMesVal = accumulateSum(globalValues, true);
    globalValues.inputAkumuliranaSumaPoslodavcaMesVal = accumulateSum(globalValues, false);
    globalValues.inputAkumuliranaSumaMesVal = (globalValues.inputAkumuliranaSumaClanaMesVal + globalValues.inputAkumuliranaSumaPoslodavcaMesVal).toFixed(2);

    globalValues.inputZaradjenoMesVal = (
        globalValues.inputAkumuliranaSumaMesVal - 
        globalValues.inputUkupnoUplacenoClanaMesVal - 
        globalValues.inputUkupnoUplacenoPoslodavcaMesVal
    ).toFixed(2);

    globalValues.inputIznosIsplateMesecnoMesVal = monthlyPay(globalValues);
    globalValues.inputUkupanIznosIsplacenihSredstavaMesVal = (
        globalValues.inputIznosIsplateMesecnoMesVal * 
        globalValues.inputPeriodIsplateGodinamaMesVal * 12
    ).toFixed(2);
}

function write() {
    inputIDS.forEach(element => {
        if (!notToWrite.includes(element)) {
            const val = parseFloat(globalValues[`${element}Val`]);
            objInputs[element].dataset.value = val;
            const precentArr = ["inputUlaznaNaknadaClanaMes", "inputUlaznaNaknadaPoslodavcaMes"];
            let shouldAddPrecent = writePrecent(objInputs[element].id, precentArr);
            objInputs[element].value = shouldAddPrecent 
                ? `${separator(val.toFixed(2))}%` 
                : separator(val.toFixed(2));
        }
    });
}

// ------------------ HELPER FUNCTIONS ------------------
function accumulateSum({ inputIznosUplateClanaMesVal, inputIznosUplatePoslodavcaMesVal, inputUlaznaNaknadaClanaMesVal, inputUlaznaNaknadaPoslodavcaMesVal, inputStopaPrinosaMesVal, inputPeriodAkumulacijeMesVal }, worker = true) {
    let monthlyIncome = worker ? inputIznosUplateClanaMesVal : inputIznosUplatePoslodavcaMesVal;
    let ulaznaNaknada = worker ? inputUlaznaNaknadaClanaMesVal : inputUlaznaNaknadaPoslodavcaMesVal;
    let accumulatedAmount = getAccumulatedAmount(monthlyIncome, ulaznaNaknada);
    let monthlyIncomeRate = globalValues.monthlyIncomeRate = getMonthlyIncomeRate(inputStopaPrinosaMesVal);
    let numOfPayments = globalValues.numOfPayments = getNumOfPayments(inputPeriodAkumulacijeMesVal);
    let accumulatedSum = getAccumulatedSum(accumulatedAmount, monthlyIncomeRate, numOfPayments);

    let ir = rate(inputStopaPrinosaMesVal);
    let nper = inputPeriodAkumulacijeMesVal * 12;
    let naknadaProcenat = percenageToNumber(ulaznaNaknada);
    let pmt = monthlyIncome * (1 - naknadaProcenat);
    let fvValue = FV(ir, nper, pmt, 0, 1) * -1;

    return inputStopaPrinosaMesVal ? accumulatedSum : fvValue;
}

function monthlyPay({ inputAkumuliranaSumaMesVal, inputStopaPrinosaMesVal, inputPeriodIsplateGodinamaMesVal }) {
    const pv = Number(inputAkumuliranaSumaMesVal);                 // ukupna akumulacija
    const nper = Number(inputPeriodIsplateGodinamaMesVal) * 12;    // broj mesečnih isplata

    // zaštita od loših inputa
    if (!pv || !nper) return 0;

    const stopa = Number(inputStopaPrinosaMesVal);

    // ako je stopa 0% (ili prazno), prosta raspodela na mesece
    if (!stopa) {
        return +(pv / nper).toFixed(2);
    }

    // mesečna stopa (tvoja rate() funkcija)
    const ir = rate(stopa);

    // standardni PMT: pv je negativan (odliv iz fonda), rezultat obično bude negativan → vraćamo pozitivan broj
    const pmtVal = PMT(ir, nper, -pv);

    return +Math.abs(pmtVal).toFixed(2);
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

    if (btnType === "buttonPlusMes") {
        plusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal);
    } else {
        minusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal);
    }
}
function plusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal) {
    if (currentVal < fieldMax) {
        if (inputField.id === "inputStopaPrinosaMes") {
            let nextValue = parseFloat(currentVal) + parseFloat(fieldRange);
            addInputProcent(inputField, nextValue.toFixed(2), "inputStopaPrinosaMes");
            rangeField.value = nextValue;
        } else {
            let nextValue = parseInt(currentVal) + parseInt(fieldRange);
            addInputValue(inputField, nextValue, "inputStopaPrinosaMes");
            rangeField.value = nextValue;
        }
    }
}
function minusClicked(inputField, rangeField, fieldRange, fieldMax, currentVal) {
    if (currentVal && currentVal > 0) {
        if (inputField.id === "inputStopaPrinosaMes") {
            let nextValue = parseFloat(currentVal) - parseFloat(fieldRange);
            addInputProcent(inputField, nextValue.toFixed(2), "inputStopaPrinosaMes");
            rangeField.value = nextValue;
        } else {
            let nextValue = parseInt(currentVal) - parseInt(fieldRange);
            addInputValue(inputField, nextValue, "inputStopaPrinosaMes");
            rangeField.value = nextValue;
        }
    } else {
        let defaultVal = parseFloat(inputField.getAttribute('data-value')) || 0;
        inputField.dataset.value = defaultVal;
        addInputValue(inputField, defaultVal, inputField.id);
        rangeField.value = defaultVal;
    }
}

// ------------------ INPUT CHANGE ------------------
function changInputFields(objInputsArg) {
    const { inputGodinaPocetkaUplateMes, inputGodinaPovlacenjeMes, inputStopaPrinosaMes, inputIznosUplateClanaMes, inputIznosUplatePoslodavcaMes, inputPeriodIsplateGodinamaMes } = objInputsArg;
    const inputsArray = [inputGodinaPocetkaUplateMes, inputGodinaPovlacenjeMes, inputStopaPrinosaMes, inputIznosUplateClanaMes, inputIznosUplatePoslodavcaMes, inputPeriodIsplateGodinamaMes];

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
        if (inputEl.id === 'inputStopaPrinosaMes') {
            output.textContent = Number(numericValue).toFixed(2) + '%';
        } else {
            let outStr = Math.round(numericValue) === Number(numericValue) ? separator(Number(numericValue).toFixed(0)) : separator(Number(numericValue).toFixed(2));
            output.textContent = outStr;
        }
    }

    inputsArray.forEach(element => {
        if (!element) return;
        const isPercent = element.id === "inputStopaPrinosaMes";
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

// --------------------- PIE CHART za mesečne uplate ---------------------

// Poziv na učitavanje stranice
document.addEventListener("DOMContentLoaded", renderanjePie, false);

// Dugme za ručno osvežavanje grafika
document.getElementById("btnMesecno").addEventListener("click", renderanjePie);

function renderanjePie() {
    globalValues.renderanjePrvo = parseFloat(inputUkupnoUplacenoClanaMes.dataset.value);
    globalValues.renderanjeDrugo = parseFloat(inputUkupnoUplacenoPoslodavcaMes.dataset.value);
    globalValues.renderanjeTrece = parseFloat(inputZaradjenoMes.dataset.value);

    var w = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;

    var lang = document.documentElement.lang; // Get the language attribute
    var label1, label2, label3;

    if ("en-GB" === lang) {
        label1 = "Total Paid by Member";
        label2 = "Total Paid by Employer";
        label3 = "Earned";
    } else {
        label1 = "Ukupno uplaćeno od strane člana";
        label2 = "Ukupno uplaćeno od strane poslodavca";
        label3 = "Zarađeno";
    }

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        legend: {
            horizontalAlign: "right", // left, center, right
            verticalAlign: "bottom",  // top, center, bottom
            fontSize: (w < 768) ? 16 : 18,
            fontColor: "#231F20",
            markerMargin: 10,
        },
        data: [{
            type: "pie",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "#fff",
            indexLabelFontSize: 11,
            startAngle: 270,
            radius: 150,
            showInLegend: true,
            legendText: "{label}",
            legendPosition: "top",
            yValueFormatString: "#,###.##",
            indexLabel: "{y}",
			name: "marko",
            dataPoints: [    
                { y: globalValues.renderanjePrvo, label: label1, color: '#de6470' },
                { y: globalValues.renderanjeDrugo, label: label2, color: '#f7d0d4' },
                { y: globalValues.renderanjeTrece, label: label3, color: '#dd2e3e' },
            ]
        }]
    });
    chart.render();
}

