function increase(rowId){
    let input = document.getElementById('quantityCounter-' + rowId);
    let currentValue = parseInt(input.value);
    var maxValue = parseInt(input.max);
    if(currentValue < maxValue){
        input.value = currentValue + 1;
        updateCounter(rowId, currentValue + 1);
    }else {
        alert('Quantity exceeds limit');
    }
}

function decrease(rowId){
    let input = document.getElementById('quantityCounter-' + rowId);
    if(input){
        let currentValue = parseInt(input.value);
        if (currentValue > 1){
            input.value = currentValue - 1;
            updateCounter(rowId, currentValue - 1);
        }

    }else {
        alert('Updata Counter Fail');
    }
}


function increase1(){
    let input = document.getElementById('numberCounter');
    let currentValue = parseInt(input.value);
    var maxValue = parseInt(input.max);
    if(currentValue < maxValue){
        input.value = currentValue + 1;
    }else {
        alert('Quantity exceeds limit');
    }
}

function decrease1(){
    let input = document.getElementById('numberCounter');
    if(input){
        let currentValue = parseInt(input.value);
        if (currentValue > 1){
            input.value = currentValue - 1;
        }

    }else {
        alert('Updata Counter Fail');
    }
}
