function habilitarIn() {
    var emailIn = document.getElementById('emailIn').value;
    var passwordIn = document.getElementById('passwordIn').value;
    var btnIn = document.getElementById('submitIn');
    if (emailIn != '') {
        btnIn.disabled = false;
        btnIn.classList.remove('disabled');
        if (passwordIn != '') {
            btnIn.disabled = false;
            btnIn.classList.remove('disabled');
            hoveralert("success", "Parametros Correctos");
        } else {
            btnIn.disabled = true;
            btnIn.classList.add('disabled');
            hoveralert("error", "Contraseña Vacia");
        }
    } else {
        btnIn.disabled = true;
        btnIn.classList.add('disabled');
        hoveralert("error", "Correo Vacio");
    }
}

function habilitarUp() {
    var emailUp = document.getElementById('emailUp').value;
    var passwordUp = document.getElementById('passwordUp').value;
    var passwordcheckUp = document.getElementById('passwordcheckUp').value;
    var btnUp = document.getElementById('submitUp');
    /*Verificacion de Email */
    var params = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailUp != '' && params.test(emailUp) == true) {
        btnUp.disabled = false;
        btnUp.classList.remove('disabled');
        if (passwordcheckUp == passwordUp) {
            btnUp.disabled = false;
            btnUp.classList.remove('disabled');
            if (/[\d]/.test(passwordUp)) {
                btnUp.disabled = false;
                btnUp.classList.remove('disabled');
                if (/[A-Z]/.test(passwordUp)) {
                    btnUp.disabled = false;
                    btnUp.classList.remove('disabled');
                    if (/[a-z]/.test(passwordUp)) {
                        btnUp.disabled = false;
                        btnUp.classList.remove('disabled');
                        if (/[\W]/.test(passwordUp)) {
                            btnUp.disabled = false;
                            btnUp.classList.remove('disabled');
                            hoveralert("success", "Parametros Correctos");
                        } else {
                            hoveralert("error", "La contraseña debe tener un caracter especial");
                            btnUp.disabled = true;
                            btnUp.classList.add('disabled');
                        }
                    } else {
                        hoveralert("error", "La contraseña debe tener una minúscula");
                        btnUp.disabled = true;
                        btnUp.classList.add('disabled');
                    }
                } else {
                    hoveralert("error", "La contraseña debe tener una mayúscula");
                    btnUp.disabled = true;
                    btnUp.classList.add('disabled');
                }
            } else {
                hoveralert("error", "La contraseña debe tener un numero");
                btnUp.disabled = true;
                btnUp.classList.add('disabled');
            }
        } else {
            hoveralert("error", "Las contraseñas no coinciden");
            btnUp.disabled = true;
            btnUp.classList.add('disabled');
        }
    } else {
        hoveralert("error", "El correo no es correcto");
        btnUp.disabled = true;
        btnUp.classList.add('disabled');
    }
}

function hoveralert(icon, title) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    })

    Toast.fire({
        icon: icon,
        title: title
    })

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