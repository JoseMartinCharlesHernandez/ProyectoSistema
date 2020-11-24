<?php  
include('../conexion.php');

$id=$_POST['id_donador'];

$consulta=$pdo->prepare("DELETE FROM donadores where id=:id");
        $consulta->bindParam(':id',$id);
        $consulta->execute();
        header('location:donadores.php');

?>