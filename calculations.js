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

// get percent of a number
export const getPercenage = (num, percent) => {
    return (num / 100) * percent;
};

// get monthly income rate
export const getMonthlyIncomeRate = (percent) => {
    let num = 1 + getPercenage(1, percent);
    let exponent = 1 / 12;
    return ((Math.pow(num, exponent) - 1) * 100).toFixed(2);
}

// get accumulated amount
export const getAccumulatedAmount = (multiplier, percent) => {
    return (multiplier * (1 - getPercenage(1, percent)));
}

// get accumulated sum
export const getAccumulatedSum = (a, b, c) => {
    // C = a
    // b = i
    // c = n
    let percent = b / 100;
    let step1 = (1 + getPercenage(1, b));
    let step2 = Math.pow(step1, c).toFixed(4);
    let step3 = step2 - 1;
    let step4 = getPercenage(step3, b);
    let step5 = (step3 / percent).toFixed(2);
    let final = (step5 * step1).toFixed(4);

    return final;
}
