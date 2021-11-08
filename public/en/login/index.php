<?php
    require '../../conexion.php';

    $message = '';
    $class = '';
    $active=True;

    session_start();
    if (isset($_SESSION['id'])) {
        $message = 'Ya has inciado sesión';
        $class = 'success';
        $active=False;
    }



    if (!empty($_POST['action']) && $active==True) {
        if ($_POST['action'] == 'signin') {
            signin($conex);
        } elseif ($_POST['action'] == 'signup') {
            signup($conex);
        }
    }

    function signin($conexion)
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $sql = 'SELECT * FROM users WHERE email=:email';
            $datos = $conexion->prepare($sql);
            $datos->bindParam(':email', $_POST['email']);
            if ($datos->execute()) {
                $results = $datos->fetch(PDO::FETCH_ASSOC); /*Datos almacenado en Array*/
                if($_POST['email']==$results['email']) {
                    if (password_verify($_POST['password'], $results['password'])) {
                        $_SESSION['id'] = $results['id']; /*Pasar datos a el sistema de seguridad*/
                        $GLOBALS['message'] = 'Se ha iniciado sesión correctamente';
                        $GLOBALS['class'] = 'success';
                    } else {
                        $GLOBALS['message'] = 'Error, la contraseña es incorrecta';
                        $GLOBALS['class'] = 'error';
                    }
                }else{
                    $GLOBALS['message'] = 'Error, el correo no existe';
                    $GLOBALS['class'] = 'error';
                }
            } else {
                $GLOBALS['message'] = 'Error, no se pudo encontrar este correo';
                $GLOBALS['class'] = 'error';
            }
        } else {
            $GLOBALS['message'] = 'Error, faltan datos para Iniciar sesión';
            $GLOBALS['class'] = 'error';
        }
    }

    function signup($conexion)
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordcheck'])) {
            if ($_POST['password'] == $_POST['passwordcheck']) {
                $sql = 'SELECT email FROM users WHERE email = :email';
                $datos = $conexion->prepare($sql);
                $datos->bindParam(':email', $_POST['email']);

                if ($datos->execute()) {
                    try {
                        $results = $datos->fetch(PDO::FETCH_ASSOC);
                        if ($results['email'] == $_POST['email']) {
                            $repeated = true;
                        } else {
                            $repeated = false;
                        }
                    } catch (Exception) {
                        $GLOBALS['message'] = 'Error, al verificar existencia de la cuenta';
                        $GLOBALS['class'] = 'error';
                    }
                } else {
                    $GLOBALS['message'] = 'Error, al verificar existencia de la cuenta';
                    $GLOBALS['class'] = 'error';
                }
                if ($repeated == false) {
                    $sql = 'INSERT INTO users (name,lastname,email,password) values (:name,:lastname,:email,:password)';
                    $datos = $conexion->prepare($sql);
                    $datos->bindParam(':name', $_POST['name']);
                    $datos->bindParam(':lastname', $_POST['name']);
                    $datos->bindParam(':email', $_POST['email']);
                    $datos->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT)); /*Cifrar contraseña en hash BCRYPT */
                    if ($datos->execute()) {
                        $message = 'La cuenta ha sido creada con éxito';
                        $GLOBALS['class'] = 'success';
                        signin($conexion);
                    } else {
                        $GLOBALS['message'] = 'Error, la cuenta no se pudo crear';
                        $GLOBALS['class'] = 'error';
                    }
                } elseif ($repeated == true) {
                    $GLOBALS['message'] = 'Error, el correo ' . $_POST['email'] . ' ya existe';
                    $GLOBALS['class'] = 'error';
                }
            } else {
                $GLOBALS['message'] = 'Error, las contraseñas no coinciden';
                $GLOBALS['class'] = 'error';
            }
        } else {
            $GLOBALS['message'] = 'Error, faltan datos para registrarse';
            $GLOBALS['class'] = 'error';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!---Default-->
        <?php include('../../Assets/Default/index.html') ?>
        <!---Stylesheet-->
        <link rel="stylesheet" href="../../Assets/Default/style.css">
        <link rel="stylesheet" href="../Assets/Body/Login/style.css">
        <style type="text/css">

        </style>
    </head>

    <body>
        <?php if (!empty($message)): ?>
            <script type="text/javascript">
                Sweetalert2.fire({
                    icon:"<?php echo($class) ?>", 
                    title:"<?php echo($class)?>", 
                    text:"<?php echo($message)?>",
                    timer:"3000",
                    timerProgressBar:"True",
                    allowOutsideClick:"True",
                    allowEscapeKey:"True",
                    confirmButtonText:"Aceptar",
                    confirmButtonColor:"#1A5276"
                });
            </script>
                <?php if ($class=="success"): ?>
                    <script type="text/javascript">
                        setTimeout(alertFunc, 4000);
                        function alertFunc() {
                            location.replace("../Main");
                        }
                    </script>
                <?php endif; ?>
        <?php endif; ?>
        <!---Login-->
        <?php include('../Assets/Body/Login/index.html') ?>
        <script type="text/javascript">
            <?php include('../Assets/Body/Login/main.js') ?>
        </script>
    </body>
</html>
