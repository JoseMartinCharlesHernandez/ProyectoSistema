<?php 
include('../conexion.php');
$id=$_POST['id_donador'];

  		$actualizar=$pdo->prepare("DELETE FROM donadores WHERE id=:id_donador");
  		$actualizar->bindParam(':id_donador',$id);
      $actualizar->execute();

header('location:pendientes.php');




?>