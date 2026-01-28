
jQuery(document).ready(function () {

    // $('#btnMesecno').click(function () {
    //
    //         // alert(inputUkupnoUplacenoClanaMes.value);
    //
    //     renderanjePie();
    // });
    const ranges = document.querySelectorAll(".form-inner-part .range");
    const inputs = document.querySelectorAll(".form-inner-part .input");
    const outputs = document.querySelectorAll(".form-inner-part .bubble");

    const inputPrecent = ["inputStopaPrinosaJed", "inputStopaPrinosaMes", "inputStopaPrinosaKli"];

    ranges.forEach(function (range, index) {
        range.addEventListener("input", function (event) {
            let _val = event.target.value
            let valSt = parseInt(_val.replace(/\D/g,''),10);  
            inputs[index].dataset.value = event.target.value ? event.target.value : "0";
            let putPrecent = inputPrecent.some(ids => ids === inputs[index].id);
            let valueShow = putPrecent ? `${_val}%` : separatorStr(valSt);
            inputs[index].value = valSt ? valueShow : "0";
            

            
        });
        inputs[index].addEventListener("keyup", function (event) {            
            let _val = event.target.value
            let valSt = parseInt(_val.replace(/\D/g,''),10);
            let putPrecent = inputPrecent.some(ids => ids === inputs[index].id);
            let valueShow = putPrecent ? `${separatorStr(valSt)}%` : separatorStr(valSt);
            ranges[index].value = valSt ? valSt : "0";
            outputs[index].value = valSt ? valueShow : "0";
            
        });
    });

    


    // $('[data-quantity="plus"]').click(function (e) {
    //     e.preventDefault();
    //     var fieldName = $(this).attr('data-field');
    //     var fieldRange = parseInt($('input[name=' + fieldName + ']').attr('step'));
    //     var fieldMax = parseInt($('input[name=' + fieldName + ']').attr('max'));
    //     var currentVal = parseInt($('input[name=' + fieldName + ']').val());
    //     var currentValOutput = parseInt($('output[name=' + fieldName + ']').val());

    //     if (currentVal < fieldMax) {
    //         $('input[name=' + fieldName + ']').val(currentVal + fieldRange);
    //         $('output[name=' + fieldName + ']').val(currentValOutput + fieldRange);
    //     }
    // });
    // $('[data-quantity="minus"]').click(function (e) {
    //     e.preventDefault();
    //     var fieldName = $(this).attr('data-field');
    //     var fieldRange = parseInt($('input[name=' + fieldName + ']').attr('step'));
    //     var currentVal = parseInt($('input[name=' + fieldName + ']').val());
    //     var currentValOutput = parseInt($('output[name=' + fieldName + ']').val());

    //     if (!isNaN(currentVal) && currentVal > 0) {
    //         $('input[name=' + fieldName + ']').val(currentVal - fieldRange);
    //         $('output[name=' + fieldName + ']').val(currentValOutput - fieldRange);
    //     } else {
    //         $('input[name=' + fieldName + ']').val(0);
    //         $('output[name=' + fieldName + ']').val(0);
    //     }
    // });


    var allRanges = document.querySelectorAll(".form-inner-part.left");

    allRanges.forEach(function (wrap) {
        var range = wrap.querySelector(".form-inner-part.left .range");
        var bubble = wrap.querySelector(".form-inner-part.left .bubble");
        var input = wrap.querySelector(".form-inner-part.left .input");
        var buttonPlus = wrap.querySelector(".form-inner-part.left .button-plus");
        var buttonMinus = wrap.querySelector(".form-inner-part.left .button-minus");
        // var fieldMax = wrap.querySelector(".form-inner-part .input").attr('data-field');
        // var fieldMin = wrap.querySelector(".form-inner-part .input").attr('data-field');

        input.addEventListener("keyup", function () {
            setBubbleInput(input, bubble);

        });
        setBubbleInput(input, bubble);

        range.addEventListener("input", function () {
            setBubbleRange(range, bubble);
        });

        buttonPlus.addEventListener("click", function () {            
            setBubbleRange(range, bubble);
        });

        buttonMinus.addEventListener("click", function () {
            setBubbleRange(range, bubble);
        });
        setBubbleRange(range, bubble);
    });

    function setBubbleRange(range, bubble) {
        
        var val = range.value;
        var min = range.min ? range.min : 0;
        var max = range.max ? range.max : 100;
        var newVal = Number((val - min) * 100 / (max - min));
        let inputId = range.id.replace("range", "input");
        let putPrecent = inputPrecent.some(ids => ids === inputId);
        bubble.innerHTML = putPrecent ? `${separatorStr(val)}%` : separatorStr(val);        
        // Sorta magic numbers based on size of the native UI thumb
        bubble.style.left = "calc(" + newVal + "% + (" + (20 - newVal * 0.4) + "px))";
        
    }

    function changeRange(range){
        range.value = range.value + 0.01;
    }

    function setBubbleInput(input, bubble) {
        var val = input.dataset.value;
        var min = input.min ? input.min : 0;
        var max = input.max ? input.max : 100;
        var newVal = Number((val - min) * 100 / (max - min));
        let putPrecent = inputPrecent.some(ids => ids === input.id);
        
        bubble.innerHTML = putPrecent ? `${separatorStr(val)}%` : separatorStr(val); 
        // Sorta magic numbers based on size of the native UI thumb
        bubble.style.left = "calc(" + newVal + "% + (" + (20 - newVal * 0.4) + "px))";
    }

    function separatorStr(num) {
        if(num){
            let parts = num.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(",");    

        }
    }

    function numberDown (keyCode) {
        const numberArr = [];
        for(let i = 48; i< 106; i++){
            if(i<58 || i> 95){
                numberArr.push(i);
            }
        }
    
        let numberBool = numberArr.some(number => number === keyCode);
        
        return numberBool;
    }

});
