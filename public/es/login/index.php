<?php
    require '../../../server/connection/conexion.php';
    
    /*Sweet Alert -> Parametros */
    $title='';
    $text = '';
    $html='';
    $icon = '';
    $img='';
    $active=true;

    session_start();
    if (isset($_SESSION['id'])) {
        $GLOBALS['icon'] = 'success';
        $GLOBALS['title'] = 'Éxito';
        $GLOBALS['text'] = 'Ya has inciado sesión';
        $active=false;
    }



    if (!empty($_POST['action']) && $active==true) {
        if ($_POST['action'] == 'signin') {
            signin($conex);
        } elseif ($_POST['action'] == 'signup') {
            signup($conex);
        }
    }
    // Verificacion de correo con funcion '/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i' //
    function verifyemail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)!=false){
            return true;
        }
    }

    function verifypassword($password){
        if((strlen($password))>7){
            if((preg_match_all("/[\d]/", $password))>0){
                if((preg_match_all("/[A-Z]/", $password))>0){
                    if((preg_match_all("/[a-z]/", $password))>0){
                        if((preg_match_all("/[\W]/", $password))>0){
                            return true;
                        }else{
                            $GLOBALS['icon'] = 'error';
                            $GLOBALS['title'] = 'Error';
                            $GLOBALS['text'] = 'La contraseña debe tener al menos un caracter especial';
                            return false;
                        }
                    }else{
                        $GLOBALS['icon'] = 'error';
                        $GLOBALS['title'] = 'Error';
                        $GLOBALS['text'] = 'La contraseña debe tener al menos una minuscula';
                        return false;
                    }
                }else{
                    $GLOBALS['icon'] = 'error';
                    $GLOBALS['title'] = 'Error';
                    $GLOBALS['text'] = 'La contraseña debe tener al menos una mayuscula';
                    return false;
                }
            }else{
                $GLOBALS['icon'] = 'error';
                $GLOBALS['title'] = 'Error';
                $GLOBALS['text'] = 'La contraseña debe tener al menos un numero';
                return false;
            }
        }else{
            $GLOBALS['icon'] = 'error';
            $GLOBALS['title'] = 'Error';
            $GLOBALS['text'] = 'La contraseña debe ser minimo de 8 caracteres';
            return false;
        }
    }

    function signin($conexion)
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $sql = 'SELECT * FROM usuarios WHERE email=:email';
            $datos = $conexion->prepare($sql);
            $datos->bindParam(':email', $_POST['email']);
            if ($datos->execute()) {
                $usuarios = $datos->fetch(PDO::FETCH_ASSOC); /*Datos almacenado en Array*/
                if (is_array($usuarios)) {
                    if ($_POST['email']==$usuarios['email']) {
                        if (password_verify($_POST['password'], $usuarios['password'])) {
                            $_SESSION['id'] = $usuarios['id']; /*Pasar datos a el sistema de seguridad*/
                            $GLOBALS['icon'] = 'success';
                            $GLOBALS['title'] = 'Éxito';
                            $GLOBALS['text'] = 'Se ha iniciado sesión correctamente';
                        } else {
                            $GLOBALS['icon'] = 'error';
                            $GLOBALS['title'] = 'Error';
                            $GLOBALS['text'] = 'La contraseña es incorrecta';
                        }
                    } else {
                        $GLOBALS['icon'] = 'error';
                        $GLOBALS['title'] = 'Error';
                        $GLOBALS['text'] = 'El correo no coíncide con una cuenta';
                    }
                }else {
                    $GLOBALS['icon'] = 'error';
                    $GLOBALS['title'] = 'Error';
                    $GLOBALS['text'] = 'El correo no existe';
                }
            }else{
                $GLOBALS['icon'] = 'error';
                $GLOBALS['title'] = 'Error';
                $GLOBALS['text'] = 'No se pudo verificar si el correo existe';
            }
        }else{
            $GLOBALS['icon'] = 'error';
            $GLOBALS['title'] = 'Error';
            $GLOBALS['text'] = 'Faltan datos para Iniciar sesión';
        }
    }

    function signup($conexion)
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordcheck'])) {
            if (verifyemail($_POST['email'])==1) {
                if ($_POST['password'] == $_POST['passwordcheck']) {
                    if (verifypassword($_POST['password'])==1) {
                        if (!empty($_POST['terms'])) {
                            $sql = 'SELECT email FROM users WHERE email = :email';
                            $datos = $conexion->prepare($sql);
                            $datos->bindParam(':email', $_POST['email']);
                            if ($datos->execute()) {
                                try {
                                    $usuarios = $datos->fetch(PDO::FETCH_ASSOC);
                                    if (is_array($usuarios)) {
                                        if ($usuarios['email'] == $_POST['email']) {
                                            $repeated = true;
                                        } else {
                                            $repeated = false;
                                        }
                                    }else{
                                        $repeated=false;
                                    }
                                } catch (Exception) {
                                    $GLOBALS['icon'] = 'error';
                                    $GLOBALS['title'] = 'Error';
                                    $GLOBALS['text'] = 'No se pudo verificar la existencia de la cuenta';
                                }
                            }else{
                                $GLOBALS['icon'] = 'error';
                                $GLOBALS['title'] = 'Error';
                                $GLOBALS['text'] = 'No se pudo verificar la existencia de la cuenta';
                            }
                            if ($repeated == false) {
                                $sql = 'INSERT INTO usuarios (name,lastname,email,password) values (:name,:lastname,:email,:password)';
                                $datos = $conexion->prepare($sql);
                                $datos->bindParam(':name', $_POST['name']);
                                $datos->bindParam(':lastname', $_POST['name']);
                                $datos->bindParam(':email', $_POST['email']);
                                $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
                                $datos->bindParam(':password', $password); /*Cifrar contraseña en hash BCRYPT */
                                if ($datos->execute()) {
                                    $GLOBALS['icon'] = 'success';
                                    $GLOBALS['title'] = 'Éxito';
                                    $GLOBALS['text'] = 'La cuenta ha sido creada con exito';
                                    signin($conexion);
                                }else{
                                    $GLOBALS['icon'] = 'error';
                                    $GLOBALS['title'] = 'Error';
                                    $GLOBALS['text'] = 'La cuenta no se pudo crear';
                                }
                            } elseif ($repeated == true) {
                                $GLOBALS['icon'] = 'error';
                                $GLOBALS['title'] = 'Error';
                                $GLOBALS['text'] = 'El correo ' . $_POST['email'] . ' ya existe';
                            }
                        }else{
                            $GLOBALS['icon'] = 'error';
                            $GLOBALS['title'] = 'Error';
                            $GLOBALS['html'] = "<p class='terms'>Debes Aceptar los <a href='#'>terminos y condiciones</a> de la politica de proteccion de datos. Recibiras confirmacion del registro por correo electronico</p>";
                        }
                    }
                }else{
                    $GLOBALS['icon'] = 'error';
                    $GLOBALS['title'] = 'Error';
                    $GLOBALS['text'] = 'Las contraseñas no coinciden';
                }
            }else{
                $GLOBALS['title'] = 'Error';
                $GLOBALS['text'] = 'El correo no cumple con los parametros necesarios';
                $GLOBALS['img'] = '../assets/components/login/src/images/estructuraemail.jpg';
            }
        }else{
            $GLOBALS['icon'] = 'error';
            $GLOBALS['title'] = 'Error';
            $GLOBALS['text'] = 'Faltan datos para Registrarse';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!---Meta Etiquetas-->
        <?php include('../../assets/utils/index.html') ?>
        <!---Stylesheet-->
        <style type="text/css">
            <?php include('../../assets/fonts/style.css') ?>
            <?php include('../../assets/utils/style.css') ?>
        </style>
        <link rel="stylesheet" href="../assets/components/login/style.css">
    </head>

    <body>
        <?php if (!empty($icon) || !empty($title) || !empty($text)): ?>
            <script type="text/javascript">
                Sweetalert2.fire({
                    icon:"<?php echo($icon) ?>", 
                    title:"<?php echo($title)?>", 
                    text:"<?php echo($text)?>",
                    html:"<?php echo($html)?>",
                    imageUrl:"<?php echo($img)?>",
                    timer:"5000",
                    timerProgressBar:"True",
                    allowOutsideClick:"True",
                    allowEscapeKey:"True",
                    confirmButtonText:"Aceptar",
                    confirmButtonColor:"#1A5276",
                });
            </script>
                <?php if ($icon=="success"): ?>
                    <script type="text/javascript">
                        setTimeout(alertFunc, 6000);
                        function alertFunc() {
                            location.replace("../main");
                        }
                    </script>
                <?php endif; ?>
        <?php endif; ?>
        <!---Login-->
        <?php include('../assets/components/login/index.html') ?>
        <script type="text/javascript">
            <?php include('../assets/components/login/main.js') ?>
        </script>
    </body>
</html>