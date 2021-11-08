<?php
  session_start();

  if (isset($_SESSION['id'])) {
    try{
      $record = $conex->prepare('SELECT * FROM usuarios WHERE id = :id');
      $record->bindParam(':id', $_SESSION['id']);
      $record->execute();
      $result = $record->fetch(PDO::FETCH_ASSOC);

      $user = null;

      if (count($result) > 0) {
        $user = $result;
      }
    }catch (PDOException $e){
      die('No se ha podido comprobar la sesion iniciada: ' . $e->getMessage());
    }
  }
?>