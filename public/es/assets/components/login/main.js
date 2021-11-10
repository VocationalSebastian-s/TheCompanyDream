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
    let Valemail = verifyEmailIn();
    let Valpassword = verifyPasswordIn();
    if (Valemail == true && Valpassword == true) {
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
        iconalert("emailIn", "success");
        return true;
    } else {
        hoveralert("error", "Correo Vacío");
        iconalert("emailIn", "error");
        return false;
    }
}

function verifyPasswordIn() {
    var passwordIn = document.getElementById('passwordIn').value;
    if (passwordIn != '') {
        iconalert("passwordIn", "success");
        return true;
    } else {
        hoveralert("error", "Contraseña Vacía");
        iconalert("passwordIn", "error");
        return false;
    }
}

function habilitarUp() {
    var btnUp = document.getElementById('submitUp');
    let Valemail = verifyEmailUp();
    let Valpassword = verifyPasswordUp();
    let Valname = verifyNameUp();
    if (Valemail == true && Valpassword == true && Valname == true) {
        btnUp.disabled = false;
        btnUp.classList.remove('disabled');
        hoveralert("success", "Parametros Correctos");
    } else {
        btnUp.disabled = true;
        btnUp.classList.add('disabled');
    }
}

function verifyNameUp() {
    var nameUp = document.getElementById('nameUp').value;
    if (nameUp != "") {
        nameUp = nameUp.split(" ");
        if (nameUp.length == 1) {
            hoveralert("error", "No hay apellidos");
            iconalert("nameUp", "warning");
            return true;
        } else if (nameUp.length == 2) {
            hoveralert("error", "No hay segundo apellido");
            iconalert("nameUp", "warning");
            return true;
        } else if (nameUp.length == 3) {
            iconalert("nameUp", "success");
            return true;
        } else if (nameUp.length == 4) {
            iconalert("nameUp", "success");
            return true;
        } else if (nameUp.length > 4) {
            hoveralert("error", "Nombre muy extenso");
            iconalert("nameUp", "error");
            return false;
        }
    } else {
        hoveralert("error", "Nombre Vacío");
        iconalert("nameUp", "error");
        return false;
    }
}

function verifyEmailUp() {
    var emailUp = document.getElementById('emailUp').value;
    var params = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailUp != '') {
        if (params.test(emailUp) == true) {
            iconalert("emailUp", "success");
            return true;
        } else {
            hoveralert("error", "El correo no es correcto");
            iconalert("emailUp", "error");
            return false;
        }
    } else {
        hoveralert("error", "El correo esta vacío");
        iconalert("emailUp", "error");
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
                            iconalert("passwordUp", "success");
                            iconalert("passwordcheckUp", "success");
                            return true;
                        } else {
                            hoveralert("error", "La contraseña debe tener mínimo un caracter especial");
                            iconalert("passwordUp", "error");
                            iconalert("passwordcheckUp", "error");
                            return false;
                        }
                    } else {
                        hoveralert("error", "La contraseña debe tener mínimo una minúscula");
                        iconalert("passwordUp", "error");
                        iconalert("passwordcheckUp", "error");
                        return false;
                    }
                } else {
                    hoveralert("error", "La contraseña debe tener mínimo una mayúscula");
                    iconalert("passwordUp", "error");
                    iconalert("passwordcheckUp", "error");
                    return false;
                }
            } else {
                hoveralert("error", "La contraseña debe tener mínimo un numero");
                iconalert("passwordUp", "error");
                iconalert("passwordcheckUp", "error");
                return false;
            }
        } else {
            hoveralert("error", "Las contraseñas no coinciden");
            iconalert("passwordUp", "error");
            iconalert("passwordcheckUp", "error");
            return false;
        }
    } else {
        hoveralert("error", "La contraseñas debe tener mínimo 8 caracteres");
        iconalert("passwordUp", "error");
        iconalert("passwordcheckUp", "error");
        return false;
    }
}

function iconalert(input, alert) {
    input = '.icon.' + input;
    alert = '#' + alert;
    if (alert == '#success') {
        document.querySelector(input + " #error").classList.remove('active');
        document.querySelector(input + " #warning").classList.remove('active');
        document.querySelector(input + " " + alert).classList.add('active');
    } else
    if (alert == '#error') {
        document.querySelector(input + " #success").classList.remove('active');
        document.querySelector(input + " #warning").classList.remove('active');
        document.querySelector(input + " " + alert).classList.add('active');
    } else if (alert == '#warning') {
        document.querySelector(input + " #success").classList.remove('active');
        document.querySelector(input + " #error").classList.remove('active');
        document.querySelector(input + " " + alert).classList.add('active');
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
