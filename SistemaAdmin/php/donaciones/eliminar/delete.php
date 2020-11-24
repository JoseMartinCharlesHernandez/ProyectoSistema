<?php  
include('../../conexion.php');

$id=$_POST['id_donacion'];
$nulo=NULL;


$actualizar=$pdo->prepare("UPDATE donadores SET ultima_donacion=:nulo 
WHERE id=(SELECT id_donador FROM donaciones WHERE id=:id )");
$actualizar->bindParam(':nulo',$nulo);
$actualizar->bindParam(':id',$id);
$actualizar->execute();



$consulta=$pdo->prepare("DELETE FROM donaciones where id=:id");
        $consulta->bindParam(':id',$id);
        $consulta->execute();
        header('location:../historial-donaciones.php');

?>