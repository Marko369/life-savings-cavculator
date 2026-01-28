export default {
    tarifnik: [
        { min: 0, max: 100000, percent: 2.7 },
        { min: 100001, max: 200000, percent: 2.0 },
        { min: 200001, max: 300000, percent: 1.5 },
        { min: 300001, max: 500000, percent: 1.0 },
        { min: 500001, max: 1000001, percent: 0.5 },
        { min: 1000001, max: null, percent: 0 },
    ]
}