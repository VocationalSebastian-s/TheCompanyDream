<?php
    require '../../conexion.php';

    session_start();
    if (isset($_SESSION['id'])) {
        header('Location: ../Main');
    }

    $message = '';
    $class = '';

    if (!empty($_POST['action'])) {
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
                if (password_verify($_POST['password'], $results['password'])) {
                    $_SESSION['id'] = $results['id']; /*Pasar datos a el sistema de seguridad*/
                    header('Location: ../Main/index.php'); /*Redirigir al Menu Principal */
                    $message = 'Se ha iniciado sesión correctamente';
                    $class = 'success';
                } else {
                    $message = 'Error, la contraseña es incorrecta';
                    $class = 'error';
                }
            } else {
                $message = 'Error, no se pudo encontrar este correo';
                $class = 'error';
            }
        } else {
            $message = 'Error, faltan datos para Iniciar sesión';
            $class = 'error';
        }
    }

    function signup($conexion)
    {
        if (!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordcheck'])) {
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
                        $message = 'Error, al verificar existencia de la cuenta';
                        $class = 'error';
                    }
                } else {
                    $message = 'Error, al verificar existencia de la cuenta';
                    $class = 'error';
                }
                if ($repeated == false) {
                    $sql = 'INSERT INTO users (name,lastname,email,password) values (:name,:lastname,:email,:password)';
                    $datos = $conexion->prepare($sql);
                    $datos->bindParam(':name', $_POST['name']);
                    $datos->bindParam(':lastname', $_POST['lastname']);
                    $datos->bindParam(':email', $_POST['email']);
                    $datos->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT)); /*Cifrar contraseña en hash BCRYPT */
                    if ($datos->execute()) {
                        $message = 'La cuenta ha sido creada con exito';
                        $class = 'success';
                        signin($conexion);
                    } else {
                        $message = 'Error, la cuenta no se pudo crear';
                        $class = 'error';
                    }
                } elseif ($repeated == true) {
                    $message = 'Error, el correo ' . $_POST['email'] . ' ya existe';
                    $class = 'error';
                }
            } else {
                $message = 'Error, las contraseñas no coinciden';
                $class = 'error';
            }
        } else {
            $message = 'Error, faltan datos para Registrarse';
            $class = 'error';
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
                Sweetalert2.fire({icon:"<?php echo($message) ?>"});
            </script>
        <?php endif; ?>
        <!---Login-->
        <?php include('../Assets/Body/Login/index.html') ?>
    </body>
</html>