<!DOCTYPE html>
<html>

<head>
    <!---Meta Etiquetas-->
    <meta charset="utf-8">
    <title>The Company Dream</title>
    <script src="https://kit.fontawesome.com/5780471e07.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="author" content="Techn'os">
    <meta name="description" content="The company dream payroll">
    <meta name="keywords" content="Payroll, Company Dream, The Company Dream">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://thecompanydream.herokuapp.com/assets/utils/src/images/favicon.png">

    <!---Stylesheet-->
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .initiation {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(src/images/fondo.jpg) center fixed;
            background-size: 100%;
            transition: 0.5s;
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -ms-transition: 0.5s;
            -o-transition: 0.5s;
        }

        .initiation .container {
            position: relative;
            width: 800px;
            height: 500px;
            margin: 20px;
            z-index: 1;
        }

        .initiation .container .boxMain {
            position: absolute;
            top: 40px;
            width: 100%;
            height: 420px;
            display: flex;
            justify-content: center;
            box-shadow: 0 5px 45px rgba(0, 0, 0, 0.15);
            background-color: rgba(0, 0, 0, 0.8);
        }

        .initiation .container .boxMain .box {
            position: relative;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .initiation .container .boxMain .box h2 {
            color: #fff;
            font-size: 1.2em;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .initiation .container .boxMain .box #btn {
            position: relative;
            display: inline-flex;
            padding: 12px 30px;
            background: #363636;
            color: #fff;
            cursor: pointer;
            overflow: hidden;
        }

        .initiation .container .boxMain .box #btn span {
            position: relative;
            z-index: 1;
        }

        .initiation .container .boxMain .box #btn::before {
            content: '';
            position: absolute;
            top: var(--y)+0.5;
            left: var(--x);
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            width: 0;
            height: 0;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            background: #A8E0E6;
            transition: width 1s, height 1s;
            -webkit-transition: width 1s, height 1s;
            -moz-transition: width 1s, height 1s;
            -ms-transition: width 1s, height 1s;
            -o-transition: width 1s, height 1s;
        }

        .initiation .container .boxMain .box #btn:hover:before {
            width: 300px;
            height: 300px;
        }

        .initiation .container .boxMain .box #btn:hover {
            color: #000;
            transition: 1s;
            -webkit-transition: 1s;
            -moz-transition: 1s;
            -ms-transition: 1s;
            -o-transition: 1s;
        }

        .initiation .container .formBx {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            background: #a8e0e6;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 5px 45px rgba(0, 0, 0, 0.25);
            transition: 0.5s ease-in-out;
            -webkit-transition: 0.5s ease-in-out;
            -moz-transition: 0.5s ease-in-out;
            -ms-transition: 0.5s ease-in-out;
            -o-transition: 0.5s ease-in-out;
            overflow: hidden;
        }

        .initiation .container .formBx.left {
            left: 0;
        }

        .initiation .container .formBx.right {
            left: 50%;
        }

        .initiation .container .formBx .form {
            position: absolute;
            left: 0;
            width: 100%;
            padding: 50px;
            transition: 0.5s;
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -ms-transition: 0.5s;
            -o-transition: 0.5s;
        }

        .initiation .container .formBx.left .signinForm {
            left: 0%;
            transition-delay: 0.25s;
        }

        .initiation .container .formBx.right .signinForm {
            left: -100%;
        }

        .initiation .container .formBx.left .signupForm {
            left: 100%;
        }

        .initiation .container .formBx.rigth .signupForm {
            left: -100%;
            transition-delay: 0.25s;
        }

        .initiation .container .formBx .form form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .initiation .container .formBx .form form h3 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .initiation .container .formBx .form form input {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            outline: none;
            font-size: 16px;
            border: 2px solid #666;
            font-family: sans-serif;
            transition: 0.5s ease all;
            -webkit-transition: 0.5s ease all;
            -moz-transition: 0.5s ease all;
            -ms-transition: 0.5s ease all;
            -o-transition: 0.5s ease all;
        }

        .initiation .container .formBx .form form input:focus {
            border: 2px solid #fff;
        }

        .initiation .container .formBx .form form input::placeholder {
            font-family: sans-serif, "Font Awesome 5 Free";
            font-weight: 700;
        }

        .initiation .container .formBx .form form select {
            font-family: sans-serif, "Font Awesome 5 Free";
            font-weight: 700;
        }

        .initiation .container .formBx .form form select option {
            font-family: sans-serif, "Font Awesome 5 Free";
            font-weight: 510;
        }

        .initiation .container .formBx .form form select {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            outline: none;
            font-size: 16px;
            border: 2px solid #666;
            color: #000;
            transition: 0.5s ease all;
            -webkit-transition: 0.5s ease all;
            -moz-transition: 0.5s ease all;
            -ms-transition: 0.5s ease all;
            -o-transition: 0.5s ease all;
        }

        .initiation .container .formBx .form form select:focus {
            border: 2px solid #fff;
        }

        .initiation .container .formBx .form form select option {
            color: #000;
        }

        .initiation .container .formBx .form form select:required:invalid {
            color: #666;
        }

        .initiation .container .formBx .form form option[value=""][disabled] {
            display: none;
        }

        .initiation .container .formBx .form form input[id="submitUp"],
        .initiation .container .formBx .form form input[id="submitIn"] {
            max-width: 100px;
            border-color: #363636;
            background: #1A5276;
            color: #fff;
            cursor: pointer;
            box-shadow: 0 0 1px 0 #363636 inset;
            transition: 0.8s ease-in-out;
            -webkit-transition: 0.8s ease-in-out;
            -moz-transition: 0.8s ease-in-out;
            -ms-transition: 0.8s ease-in-out;
            -o-transition: 0.8s ease-in-out;
        }

        .initiation .container .formBx .form form input[class="disabled"],
        .initiation .container .formBx .form form input[class="disabled"] {
            background: #363636;
            color: #fff;
            cursor: default;
        }

        .initiation .container .formBx .form form .terms {
            white-space: nowrap;
            margin: auto;
        }

        .initiation .container .formBx .form form .terms input {
            width: 30px;
        }

        .initiation .container .formBx .form form .terms a {
            text-decoration: none;
            color: #1A5276;
        }

        .terms a {
            text-decoration: none;
            color: #1A5276;
        }

        .initiation .container .formBx .form form .forgot {
            color: #333;
            transition: 0.5s;
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -ms-transition: 0.5s;
            -o-transition: 0.5s;
        }

        .initiation .container .formBx .form form .forgot:hover {
            color: #467A84;
        }

        .initiation .container .formBx .form form .icon {
            position: relative;
        }

        .initiation .container .formBx .form form .icon i {
            visibility: hidden;
            position: absolute;
            background: #fff;
            padding-left: 1px;
            padding-right: 1px;
            top: 11px;
            right: 10px;
            transform: scale(0);
            transition: 0.4s linear;
            -webkit-transition: 0.4s linear;
            -moz-transition: 0.4s linear;
            -ms-transition: 0.4s linear;
            -o-transition: 0.4s linear;
        }

        .initiation .container .formBx .form form .icon .fas.fa-check-circle {
            color: #39A333;
        }

        .initiation .container .formBx .form form .icon .fas.fa-exclamation-circle {
            color: #E74C3C;
        }

        .initiation .container .formBx .form form .icon .fas.fa-exclamation-triangle {
            color: #F2C200;
        }

        .initiation .container .formBx .form form .icon .fas.fa-check-circle.active,
        .initiation .container .formBx .form form .icon .fas.fa-exclamation-circle.active,
        .initiation .container .formBx .form form .icon .fas.fa-exclamation-triangle.active {
            transform: scale(1.3);
            visibility: visible;
        }

        @media (max-width: 1240px) {
            .initiation {
                background-size: auto;
            }
        }

        @media (max-width: 991px) {
            .initiation .container {
                max-width: 400px;
                height: 650px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .initiation .container .boxMain {
                top: 0;
                height: 100%;
            }

            .initiation .container .formBx {
                width: 100%;
                height: 500px;
                top: 0;
                box-shadow: none;
            }

            .initiation .container .boxMain .box {
                position: absolute;
                width: 100%;
                height: 150px;
                bottom: 0;
            }

            .initiation .container .boxMain .box.signin {
                top: 0;
            }

            .initiation .container .formBx.left {
                top: 0;
                left: 0;
            }

            .initiation .container .formBx.right {
                top: 150px;
                left: 0;
            }
        }
    </style>
    <link rel="stylesheet" href="../assets/components/login/style.css">
</head>

<body>
    <!---Login-->
    <div class="initiation">
        <div class="container">
            <div class="boxMain">
                <div class="box signin">
                    <h2>¿Ya tienes una cuenta?</h2>
                    <a onclick="left()" id="btn" class="signinBtn"><span>Iniciar sesión</span></a>
                </div>
                <div class="box signup">
                    <h2>¿Aún no tienes una cuenta?</h2>
                    <a onclick="right()" id="btn" class="signupBtn"><span>Inscribirse</span></a>
                </div>
            </div>
            <div class="formBx left">
                <div class="form signinForm">
                    <form action="index.php" method="post">
                        <h3>Iniciar sesión</h3>
                        <input id="actionIn" type="hidden" name="action" value="signin" required>
                        <div class="icon emailIn">
                            <input id="emailIn" onblur="verifyEmailIn()" type="email" name="email" placeholder=' Correo' maxlength="120" value="<?php if (!empty($_POST['email'])) {
                                                                                                                                                        echo ($_POST['email']);
                                                                                                                                                    } ?>" required>
                            <i id="success" class="fas fa-check-circle"></i><i id="error" class="fas fa-exclamation-circle"></i><i id="warning" class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="icon passwordIn">
                            <input id="passwordIn" onblur="verifyPasswordIn()" type="password" name="password" placeholder=" Contraseña" maxlength="20" required>
                            <i id="success" class="fas fa-check-circle"></i><i id="error" class="fas fa-exclamation-circle"></i><i id="warning" class="fas fa-exclamation-triangle"></i>
                        </div>
                        <a onmouseenter="habilitarIn()">
                            <input id="submitIn" class="disabled" type="submit" value="Ingresar" disabled>
                        </a>
                        <a href="#" class="forgot">¿Olvidaste tu contraseña?</a>
                    </form>
                </div>
                <div class="form signupForm">
                    <form action="index.php" method="post">
                        <h3>Inscribirse</h3>
                        <input id="actionUp" type="hidden" name="action" value="signup" required>
                        <div class="icon nameUp">
                            <input id="nameUp" type="text" onblur="verifyNameUp()" name="name" placeholder=" Nombre Y Apellido(s)" maxlength="50" value="<?php if (!empty($_POST['name'])) {
                                                                                                                                                                echo ($_POST['name']);
                                                                                                                                                            } ?>" required>
                            <i id="success" class="fas fa-check-circle"></i><i id="error" class="fas fa-exclamation-circle"></i><i id="warning" class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="icon emailUp">
                            <input id="emailUp" onblur="verifyEmailUp()" type="email" name="email" placeholder=" Correo" maxlength="120" value="<?php if (!empty($_POST['email'])) {
                                                                                                                                                        echo ($_POST['email']);
                                                                                                                                                    } ?>" required>
                            <i id="success" class="fas fa-check-circle"></i><i id="error" class="fas fa-exclamation-circle"></i><i id="warning" class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="icon passwordUp">
                            <input id="passwordUp" type="password" name="password" placeholder=" Contraseña" maxlength="20" required>
                            <i id="success" class="fas fa-check-circle"></i><i id="error" class="fas fa-exclamation-circle"></i><i id="warning" class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="icon passwordcheckUp">
                            <input id="passwordcheckUp" onblur="verifyPasswordUp()" type="password" name="passwordcheck" placeholder=" Verificar Contraseña" maxlength="20" required>
                            <i id="success" class="fas fa-check-circle"></i><i id="error" class="fas fa-exclamation-circle"></i><i id="warning" class="fas fa-exclamation-triangle"></i>
                        </div>
                        <select id="typeUp" name="type" required>
                            <option value=""> Seleccione su cargo</option>
                            <option value="0"> Empleado</option>
                            <option value="1"> Jefe</option>
                        </select>
                        <p class="terms"><input type="checkbox" name="terms" value="yes" required>Acepto los <a target="blank" href=" ../assets/docs/Terms_and_Conditions.pdf ">terminos y condiciones</a></p>
                        <a onmouseenter="habilitarUp()">
                            <input id="submitUp" class="disabled" type="submit" value="Registrar" disabled>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
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
    </script>
</body>

</html>