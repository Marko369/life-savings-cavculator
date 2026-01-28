/*
* gets percent from tarifnik
*/
export const getConfigValue = (input, { tarifnik }) => {
    let val = -1;
    tarifnik.map(el => {
        if (
            input >= el.min && input <= el.max ||
            input >= el.min && !el.max) val = el.percent;
    })
    return val;
}

/*
* calculations partials 
*
* getMonthlyIncomeRate  =  'mesečna stopa prinosa'
* getAccumulatedAmount  =  'iznos koji se akumulira	' 
*
* getAccumulatedSum  = 'buduća vrednost (akumulirana suma)'
*
*/

export const getDocument = (arr, obj) => {
    arr.forEach(element => {
        obj[element] = document.getElementById(element);
    });
}

export const createPlMin = (arr, num, sufix) => {
    for (let i = 1; i <= num; i++) {
        arr.push(`buttonPlus${sufix}${i}`);
        arr.push(`buttonMinus${sufix}${i}`);
    }

}

// sums an array of numbers
export const addValues = (arr) => {
    let val = 0;
    arr.forEach(el => val = val + el);
    return val;
}

// multiply an array of numbers
export const multiplyNumbers = (arr) => {
    let val = 0;
    arr.forEach(el => val = val * el);
    return val;
}

export const percenageToNumber = percent => percent / 100;

// get accumulated amount
export const getAccumulatedAmount = (multiplier, percent) => multiplier * (1 - percenageToNumber(percent));

// get monthly income rate
export const getMonthlyIncomeRate = yearPercent => {
    let num = 1 + percenageToNumber(yearPercent);
    let exponent = 1 / 12;
    let val = Math.pow(num, exponent);
    return val - 1;
}

export const getNumOfPayments = num => num * 12;

export const getAccumulatedSum = (c, i, n) => {
    let sum = 1 + i;
    let pow = Math.pow(sum, n);
    let mid = (pow - 1) / i;
    let val = c * mid * sum;
    return parseFloat(val);
};

export const getFuturePension = (fv, i, n) => {
    let sum = 1 + i;
    let pow = Math.pow(sum, n * -1);
    let mid = 1 - pow;
    let val = fv * i / mid;
    return parseFloat(val);
};

export const PMT = (ir, np, pv, fv = 0, type = 0) => {
    let pmt, pvif;
    if (ir === 0)
        return -(pv + fv) / np;

    pvif = Math.pow(1 + ir, np);
    pmt = - ir * pv * (pvif + fv) / (pvif - 1);

    if (type === 1)
        pmt /= (1 + ir);

    return pmt;
};

export const FV = (rate, nper, pmt, pv = 0, type = 0) => {
    let fv;
    let pow = Math.pow(1 + rate, nper);

    if (rate) {
        fv = (pmt * (1 + rate * type) * (1 - pow) / rate) - pv * pow;
    } else {
        fv = -1 * (pv + pmt * nper);
    }
    return fv;
};

export const rate = (num) => {
    let val = percenageToNumber(num);
    let fPart = 1 + val;
    let secPart = 1 / 12;
    let pow = Math.pow(fPart, secPart);
    return pow - 1;
};

export const getFutureAccumulatedSum = (c, i, n) => {
    let _i = percenageToNumber(i);
    let sum = 1 + _i;
    let pow = Math.pow(sum, n);
    let val = c * pow;
    return parseFloat(val);
};

export const separator = (num) => {
    let parts = num.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

export const addInputValue = (element, value, inputId) => {
    let str = value.toString();
    let valSt = parseInt(str.replace(/\D/g, ''), 10);

    element.value = element.id === inputId ? `${separator(valSt)}%` : separator(valSt);
    element.dataset.value = valSt;
}

export const addInputProcent = (element, value, inputId) => {
    let str = value.toString();
    let valSt = parseInt(str.replace(/\D/g, ''), 10);

    element.value = `${str}%`;
    element.dataset.value = str;
}

export const addInputValuePrecent = (element, value, inputId) => {
    return
    let str = value.toString().replace(".", ",");
    element.value = `${str}%`;
    element.dataset.value = parseFloat(value);
}

export const numberDown = (keyCode) => {
    const numberArr = [];
    for (let i = 48; i < 106; i++) {
        if (i < 58 || i > 95) {
            numberArr.push(i);
        }
    }

    let numberBool = numberArr.some(number => number === keyCode);
    return numberBool;
};
export const writePrecent = (id, arr) => {
    let write = arr.some(element => element === id);
    return write;
};

export const restrictValueMax = (element, value, eventInput, oldData, isPrecent) => {

    let str = value.replace(".", "");
    let strValue = str.replace(",", "");
    let returnValue = strValue;
    let minAllow = true;
    let maxAllow = true;
    let dataSet = oldData;

    if (parseFloat(strValue.replace(".", "")) < parseFloat(element.min)) {
        minAllow = true;
        // returnValue = dataSet;
    }
    if (parseFloat(strValue.replace(".", "")) > parseFloat(element.max)) {
        maxAllow = false;
        returnValue = dataSet;
    }
    let commaAllow = true;

    return { returnValue, minAllow, maxAllow, commaAllow };
}

export const restrictValueProcent = (value, oldValue, element) => {

    let withoutPr = value.toString().replace("%", "");

    let commaCounter = 0;
    let commaAllow = true;
    let minAllow = true;
    let maxAllow = true;
    let strVal = withoutPr.replace(",", ".");
    let prVal = parseFloat(strVal)
    if (strVal.indexOf(".") === 1) {

        if (strVal.length === 3) {

            prVal = parseFloat(strVal).toFixed(1);
        } else if (strVal.length > 3) {
            prVal = parseFloat(strVal).toFixed(2);
        }
    } else if (strVal.indexOf(".") === 2) {
        if (strVal.length === 4) {
            prVal = parseFloat(strVal).toFixed(1);
        } else if (strVal.length > 4) {
            prVal = parseFloat(strVal).toFixed(2);
        }
    }



    let returnValue = prVal;
    let dataSet = oldValue;

    for (let i = 0; i < value.length; i++) {
        if (value[i] === ".") commaCounter++;
    }
    if (commaCounter > 1) {
        commaAllow = false;
        returnValue = dataSet;
    }
    if (parseFloat(returnValue) < parseFloat(element.min)) {
        minAllow = false;
        returnValue = dataSet;
    }
    if (parseFloat(returnValue) > parseFloat(element.max)) {
        maxAllow = false;
        returnValue = dataSet;
    }

    return { returnValue, minAllow, maxAllow, commaAllow };
}

export const restrictValue = (element, value, eventInput) => {
    return value
    // let returnValue = value;
    // let minAllow = true;
    // let maxAllow = true;
    // let dataSet = oldData;
    // if(parseFloat(value) < parseFloat(element.min)){
    //     minAllow = false;
    //     returnValue = element.min;
    // }
    // if(parseFloat(value) > parseFloat(element.max)){
    //     eventInput.preventDefault();
    //     returnValue = element.max;
    // }
    // return {returnValue, minAllow, maxAllow};
}



let monthlyIncome = 5000;
let ulaznaNaknada = 2.7;
let accumulatedAmount = getAccumulatedAmount(monthlyIncome, ulaznaNaknada);


let yearIncomeRate = 4;
let monthlyIncomeRate = getMonthlyIncomeRate(yearIncomeRate);


let numYearAccumulate = 30;
let numOfPayments = getNumOfPayments(numYearAccumulate);

let accumulatedSum = getAccumulatedSum(accumulatedAmount, monthlyIncomeRate, numOfPayments);


let futurePension = getFuturePension(accumulatedSum, monthlyIncomeRate, numOfPayments);


let oneTimePayment = 250000;
let entryFee = 1.5;
let accumulationNumber = getAccumulatedAmount(oneTimePayment, entryFee);


let futureAccumulatedSum = getFutureAccumulatedSum(accumulationNumber, yearIncomeRate, numYearAccumulate);
