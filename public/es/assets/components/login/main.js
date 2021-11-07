/*SignIn Parametros */
var emailIn = '';
var passwordIn = '';
var btnIn = '';
/*SignUp Parametros */
var emailUp = '';
var passwordUp = '';
var passwordcheckUp = '';
var btnUp = '';

function habilitarIn() {
    var btnIn = document.getElementById('submitIn');
    if (verifyEmailIn() && verifyPasswordIn()) {
        btnIn.disabled = false;
        btnIn.classList.remove('disabled');
        hoveralert("success", "Parametros Correctos");
    } else {
        btnIn.disabled = true;
        btnIn.classList.add('disabled');
    }
}

function verifyEmailIn() {
    var emailIn = document.getElementById('emailIn').value;
    if (emailIn != '') {
        return true;
    } else {
        hoveralert("error", "Correo Vacío");
        return false;
    }
}

function verifyPasswordIn() {
    var passwordIn = document.getElementById('passwordIn').value;
    if (passwordIn != '') {
        return true;
    } else {
        hoveralert("error", "Contraseña Vacía");
        return false;
    }
}

function habilitarUp() {
    var btnUp = document.getElementById('submitUp');
    if (verifyEmailUp() && verifyPasswordUp()) {
        btnUp.disabled = false;
        btnUp.classList.remove('disabled');
        hoveralert("success", "Parametros Correctos");
    } else {
        btnUp.disabled = true;
        btnUp.classList.add('disabled');
    }
}

function verifyEmailUp() {
    var emailUp = document.getElementById('emailUp').value;
    var params = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailUp != '') {
        if (params.test(emailUp) == true) {
            return true;
        } else {
            hoveralert("error", "El correo no es correcto");
            return false;
        }
    } else {
        hoveralert("error", "El correo esta vacío");
        return false;
    }
}


function verifyPasswordUp() {
    var passwordUp = document.getElementById('passwordUp').value;
    var passwordcheckUp = document.getElementById('passwordcheckUp').value;
    if (passwordUp.length > 7) {
        if (passwordcheckUp == passwordUp) {
            if (/[\d]/.test(passwordUp)) {
                if (/[A-Z]/.test(passwordUp)) {
                    if (/[a-z]/.test(passwordUp)) {
                        if (/[\W]/.test(passwordUp)) {
                            hoveralert("success", "Parametros Correctos");
                            return true;
                        } else {
                            hoveralert("error", "La contraseña debe tener un caracter especial");
                            return false;
                        }
                    } else {
                        hoveralert("error", "La contraseña debe tener una minúscula");
                        return false;
                    }
                } else {
                    hoveralert("error", "La contraseña debe tener una mayúscula");
                    return false;
                }
            } else {
                hoveralert("error", "La contraseña debe tener un numero");
                return false;
            }
        } else {
            hoveralert("error", "Las contraseñas no coinciden");
            return false;
        }
    } else {
        hoveralert("error", "La contraseñas debe tener 8 caracteres minimo");
        return false;
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