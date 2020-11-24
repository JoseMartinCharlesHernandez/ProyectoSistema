<?php 
include('../../conexion.php');

$tipo_donacion=$_POST['select_donacion'];
$tipo_de_sangre=$_POST['sangre'];

$nombre=$_POST['nombre'];
$a_paterno=$_POST['a_paterno'];
$a_materno=$_POST['a_materno'];

$fecha_donacion=$_POST['fecha_donacion'];
$hora_donacion=$_POST['hora_donacion'];


$consulta=$pdo->prepare("SELECT * FROM donadores where nombre=:nombre AND a_paterno=:ap");
        $consulta->bindParam(':nombre',$nombre);
        $consulta->bindParam(':ap',$a_paterno);
        $consulta->execute();

$results=$consulta->fetchAll(PDO::FETCH_ASSOC);

if ($results) {

		$insertar=$pdo->prepare("INSERT INTO donaciones(id_tipo_donacion,id_sangre,id_donador,fecha_donacion,hora_donacion) VALUES 
			((SELECT id FROM tipo_donacion WHERE tipo_donacion=:td),
			(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:t),
			(SELECT id FROM donadores WHERE nombre=:n AND a_paterno=:ap AND a_materno=:am),:f,:h)");
		$insertar->bindParam(':td',$tipo_donacion);
	  	$insertar->bindParam(':t',$tipo_de_sangre);
	  	$insertar->bindParam(':n',$nombre);
	  	$insertar->bindParam(':ap',$a_paterno);
	  	$insertar->bindParam(':am',$a_materno);
	  	$insertar->bindParam(':f',$fecha_donacion);
	  	$insertar->bindParam(':h',$hora_donacion);
	  	$insertar->execute();

	  	foreach ($results as $r) {
	  		$id_donador=$r['id'];
	  	}

	  	$actualizar=$pdo->prepare("UPDATE donadores SET ultima_donacion=:fecha WHERE id=:id");
	  	$actualizar->bindParam(':fecha',$fecha_donacion);
	  	$actualizar->bindParam(':id',$id_donador);
		$actualizar->execute();

	  	header('location:../../main-banco.php');

}else{
	echo "no hay............";
}

?>