<?php

if(!empty($_POST['email']) && !empty($_POST['monthlysalary']) && !empty($_POST['timeworked']) && !empty($_POST['pension']) && !empty($_POST['timeextra']) && !empty($_POST['timenight']) && !empty($_POST['timefestive'])){
    $sql = 'INSERT INTO nominas (email,monthlysalary,timeworked,pension,timeextra,timenight,timefestive) values (:email,:monthlysalary,:timeworked,:pension,:timeextra,:timenight,:timefestive)';
    $datos = $conexion->prepare($sql);
    /*Pasar Parametros al sql */
    $datos->bindParam(':email', $_POST['email']);
    $datos->bindParam(':monthlysalary',$_POST['monthlysalary']);
    $datos->bindParam(':timeworked', $_POST['timeworked']);
    $datos->bindParam(':pension', $_POST['pension']);
    $datos->bindParam(':timeextra', $_POST['timeextra']);
    $datos->bindParam(':timenight', $_POST['timenight']);
    $datos->bindParam(':timefestive', $_POST['timefestive']);
    $datos->execute();
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
        <link rel="stylesheet" href="../assets/utils/header/style.css">
        <link rel="stylesheet" href="../assets/components/calculator/style.css">
    </head>
    <body>
        <!---Header-->
        <?php include('../assets/utils/header/index.html') ?>
        <?php include('../assets/components/calculator/index.html') ?>
    </body>
</html>