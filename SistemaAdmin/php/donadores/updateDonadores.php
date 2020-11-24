<?php 
include('../conexion.php');

$id=$_POST['id_donador'];
$name=$_POST['nombre'];
$a_paterno=$_POST['a_paterno'];
$a_materno=$_POST['a_materno'];
$correo=$_POST['correo'];
$pass=$_POST['pass'];
$telefono=$_POST['telefono'];



$actualizar=$pdo->prepare("UPDATE donadores SET nombre=:n,a_paterno=:ap, a_materno=:am,correo=:c,contra=:p,telefono=:t WHERE id=:id_donador");
$actualizar->bindParam(':id_donador',$id);
$actualizar->bindParam(':n',$name);
$actualizar->bindParam(':ap',$a_paterno);
$actualizar->bindParam(':am',$a_materno);
$actualizar->bindParam(':c',$correo);
$actualizar->bindParam(':p',$pass);
$actualizar->bindParam(':t',$telefono);
$actualizar->execute();

header('location:donadores.php');




?>