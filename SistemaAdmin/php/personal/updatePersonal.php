<?php 
        include('../conexion.php');
        $id=$_POST['id_personal'];
        $name=$_POST['nombre'];
        $a_paterno=$_POST['a_paterno'];
        $a_materno=$_POST['a_materno'];
        $correo=$_POST['correo'];
        $pass=$_POST['pass'];
        $telefono=$_POST['telefono'];



  	$actualizar=$pdo->prepare("UPDATE personal SET nombre=:n,a_paterno=:ap, a_materno=:am, correo=:c,contra=:p,telefono=:t WHERE id=:id_personal");
  	$actualizar->bindParam(':id_personal',$id);
        $actualizar->bindParam(':n',$name);
        $actualizar->bindParam(':ap',$a_paterno);
        $actualizar->bindParam(':am',$a_materno);
        $actualizar->bindParam(':c',$correo);
        $actualizar->bindParam(':p',$pass);
        $actualizar->bindParam(':t',$telefono);
        $actualizar->execute();

        header('location:personal.php');


?>