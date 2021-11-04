window.onload = function() {
    habilitar();
}

function habilitar() {
    var actionIn = document.getElementById('actionIn');
    var emailIn = document.getElementById('emailIn');
    var passwordIn = document.getElementById('passwordIn');
    var submitIn = document.getElementById('submitIn');

    if (actionIn.value == "" || emailIn.value == "" || passwordIn.value == "") {
        sumbitIn.disabled = true;
    } else {
        sumbitIn.disabled = false;
    }

    var actionUp = document.getElementById('actionUp');
    var nameUp = document.getElementById('nameUp');
    var emailUp = document.getElementById('emailUp');
    var passwordUp = document.getElementById('passwordUp');
    var passwordcheckUp = document.getElementById('passwordcheckUp');
    var typeUp = document.getElementById('typeUp');
    var submitUp = document.getElementById('submitUp');

    if (actionUp.value == "" || nameUp.value == "" || emailUp.value == "" || passwordUp.value == "" || passwordcheckUp.value == "" || typeUp.value == "" || passwordUp.value != passwordcheckUp.value) {
        sumbitUp.disabled = true;
        alert("trueUp");
    } else {
        sumbitUp.disabled = false;
        alert("trueUp");
    }
}

const formBx = document.querySelector('.formBx');

function right() {
    formBx.classList.remove('left');
    formBx.classList.add('right');
}

function left() {
    formBx.classList.remove('right');
    formBx.classList.add('left');
}

const btn = document.querySelector('#btn');
btn.onmousemove = function(e) {
    const left = e.pageX - btn.offsetleft;
    const top = e.pageY - btn.offsetTop;

    btn.style.setProperty('--x', left + 'px');
    btn.style.setProperty('--y', top + 'px');
}