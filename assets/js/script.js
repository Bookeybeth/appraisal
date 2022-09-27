document.querySelectorAll('.my-slider').forEach(elem => {
    elem.addEventListener('input', function(){
        elem.nextElementSibling.innerText = elem.value;
    });
});

document.querySelectorAll('.my-slider').forEach(elem => {
    elem.addEventListener('change', function(){
        let msg;
        if (elem.value == 1) {
            msg = 'poor';
        } else if (elem.value == 2) {
            msg = 'bad';
        } else if (elem.value == 3) {
            msg = 'average';
        } else if (elem.value == 4) {
            msg = 'good';
        } else if (elem.value == 5) {
            msg = 'excellent';
        } else if (elem.value == 0){
            msg = 'No comment'
        }
        document.querySelector(elem.dataset.comment).innerText = msg;
    });
})