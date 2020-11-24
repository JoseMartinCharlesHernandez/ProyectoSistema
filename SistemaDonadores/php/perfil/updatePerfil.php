<?php
include('../conexion.php');

session_start();

$id=$_POST['id_user'];
$nombre=$_POST['nombre'];
$a_paterno=$_POST['A_paterno'];
$a_materno=$_POST['A_materno'];
$estado_civil=$_POST['estado_civil'];
$tipo_sangre=$_POST['tipo_sangre'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$pass=$_POST['pass'];
$cuenta_FB=$_POST['cuenta_FB'];
$link_FB=$_POST['link_FB'];
$ocupacion=$_POST['ocupacion'];
$grado_estudios=$_POST['grado_estudios'];

echo $nombre;
echo $a_paterno;
echo $a_materno;
echo $estado_civil;
echo $tipo_sangre;
echo $telefono;
echo $correo;
echo $pass;
echo $cuenta_FB;
echo $link_FB;
echo $ocupacion;
echo $grado_estudios;




$actualizar=$pdo->prepare("UPDATE donadores SET nombre=:n, a_paterno=:ap,a_materno=:am,id_sangre=(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tp),id_estado_civil=(SELECT id FROM estado_civil WHERE estado_civil=:ec),
	telefono=:tel, correo=:c, contra=:p,cuenta_facebook=:cf,link_facebook=:lf,id_ocupacion=(SELECT id FROM ocupaciones WHERE nombre_ocupacion=:oc),id_grado_estudios=(SELECT id FROM grado_estudios WHERE nombre_grado=:ge) WHERE id=:id_user");
    $actualizar->bindParam(':id_user',$id);
    $actualizar->bindParam(':n',$nombre);
    $actualizar->bindParam(':ap',$a_paterno);
    $actualizar->bindParam(':am',$a_materno);
    $actualizar->bindParam(':tp',$tipo_sangre);
    $actualizar->bindParam(':ec',$estado_civil);
    $actualizar->bindParam(':tel',$telefono);
    $actualizar->bindParam(':c',$correo);
    $actualizar->bindParam(':p',$pass);
    $actualizar->bindParam(':cf',$cuenta_FB);
    $actualizar->bindParam(':lf',$link_FB);    
    $actualizar->bindParam(':oc',$ocupacion);
    $actualizar->bindParam(':ge',$grado_estudios);
    $actualizar->execute();


    	
		$_SESSION['Name']=$nombre;
		$_SESSION['a_paterno']=$a_paterno;
		$_SESSION['a_materno']=$a_materno;
		$_SESSION['id_sangre']=$tipo_sangre;
		$_SESSION['id_estado_civil']=$estado_civil;
		$_SESSION['telefono']=$telefono;
		$_SESSION['correo']=$correo;
		$_SESSION['cuenta_facebook']=$cuenta_FB;
		$_SESSION['id_ocupacion']=$ocupacion;
		$_SESSION['id_grado_estudios']=$grado_estudios;

    header("location:Perfil.php");
?>