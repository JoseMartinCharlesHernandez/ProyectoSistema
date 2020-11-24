<?php  
include('../conexion.php');

$id=$_SESSION['id'];

$consultas=$pdo->prepare("SELECT donadores.nombre,donadores.a_paterno,donadores.a_materno, tipos_sangre.tipo_de_sangre, estado_civil.estado_civil,ocupaciones.nombre_ocupacion,grado_estudios.nombre_grado, donadores.telefono, donadores.correo,donadores.cuenta_facebook,donadores.link_facebook FROM donadores INNER JOIN tipos_sangre ON tipos_sangre.id=donadores.id_sangre INNER JOIN estado_civil ON estado_civil.id = donadores.id_estado_civil INNER JOIN ocupaciones ON ocupaciones.id = donadores.id_ocupacion INNER JOIN grado_estudios ON grado_estudios.id = donadores.id_grado_estudios WHERE donadores.id=:id");
$consultas->bindParam(":id",$id);
$consultas->execute();
$res=$consultas->fetchAll(PDO::FETCH_ASSOC);




?>