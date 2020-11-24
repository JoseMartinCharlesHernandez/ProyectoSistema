<?php  
include('../conexion.php');

$id=$_POST['id_personal'];

$consulta=$pdo->prepare("DELETE FROM personal where id=:id");
        $consulta->bindParam(':id',$id);
        $consulta->execute();
        header('location:personal.php');

?>