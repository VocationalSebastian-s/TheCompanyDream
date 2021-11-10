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
        hoveralert("success", "Correct Parameters");
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
        hoveralert("error", "Empty mail");
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
        hoveralert("error", "Empty password");
        iconalert("passwordIn", "error");
        return false;
    }
}

function habilitarUp() {
    var btnUp = document.getElementById('submitUp');
    if (verifyEmailUp() && verifyPasswordUp() && verifyNameUp()) {
        btnUp.disabled = false;
        btnUp.classList.remove('disabled');
        hoveralert("success", "Correct Parameters");
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
            hoveralert("error", "There's no last names");
            iconalert("nameUp", "warning");
            return true;
        } else if (nameUp.length == 2) {
            hoveralert("error", "There's no second last name");
            iconalert("nameUp", "warning");
            return true;
        } else if (nameUp.length == 3) {
            iconalert("nameUp", "success");
            return true;
        } else if (nameUp.length == 4) {
            iconalert("nameUp", "success");
            return true;
        } else if (nameUp.length > 4) {
            hoveralert("error", "Very long name");
            iconalert("nameUp", "error");
            return false;
        }
    } else {
        hoveralert("error", "Empty name");
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
            hoveralert("error", "The email is not correct");
            iconalert("emailUp", "error");
            return false;
        }
    } else {
        hoveralert("error", "Mail is empty");
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
                            hoveralert("success", "Correct Parameters");
                            iconalert("passwordUp", "success");
                            iconalert("passwordcheckUp", "success");
                            return true;
                        } else {
                            hoveralert("error", "The password must have at least one special character");
                            iconalert("passwordUp", "error");
                            iconalert("passwordcheckUp", "error");
                            return false;
                        }
                    } else {
                        hoveralert("error", "The password must have at least one lower case letter");
                        iconalert("passwordUp", "error");
                        iconalert("passwordcheckUp", "error");
                        return false;
                    }
                } else {
                    hoveralert("error", "The password must have at least one capital letter");
                    iconalert("passwordUp", "error");
                    iconalert("passwordcheckUp", "error");
                    return false;
                }
            } else {
                hoveralert("error", "The password must have at least one number");
                iconalert("passwordUp", "error");
                iconalert("passwordcheckUp", "error");
                return false;
            }
        } else {
            hoveralert("error", "Passwords do not match");
            iconalert("passwordUp", "error");
            iconalert("passwordcheckUp", "error");
            return false;
        }
    } else {
        hoveralert("error", "Passwords must be at least 8 characters long");
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