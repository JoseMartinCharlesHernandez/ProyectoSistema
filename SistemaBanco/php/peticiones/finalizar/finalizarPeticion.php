<?php 
include('../../conexion.php');
$id_dato=$_POST['id_peticion'];

$finaliza=1;

$actualizar=$pdo->prepare("UPDATE peticiones SET finalizada=:finaliza WHERE id=:id_peticion");
        $actualizar->bindParam(':finaliza',$finaliza);
        $actualizar->bindParam(':id_peticion',$id_dato);
        $actualizar->execute();
        header('location:../peticiones.php')
?>