<?php  
include('../../conexion.php');

$id=$_POST['id_donacion'];
$nombre=$_POST['nombre'];
$a_paterno=$_POST['a_paterno'];
$a_materno=$_POST['a_materno'];
$tp_sangre=$_POST['select_sangre'];
$tp_donacion=$_POST['select_donacion'];
$fecha_donacion=$_POST['fecha_donacion'];
$hora_donacion=$_POST['hora_donacion'];


/*
echo $id;
echo $nombre;
echo $a_paterno;
echo $a_materno;
echo $tp_sangre;
echo $tp_donacion;
echo $fecha_donacion;
echo $hora_donacion;
*/

if ($nombre=="" || $nombre==" " || $nombre==NULL) {?>
    <script>alert("Ingresa un nombre");window.location.href ="../historial-donaciones.php"</script>
<?php
}else if($a_paterno=="" || $a_paterno==" " || $a_paterno==NULL){?>
    <script>alert("Ingresa un apellido paterno");window.location.href ="../historial-donaciones.php"</script>
<?php
}else if($a_materno=="" || $a_materno==" " || $a_materno==NULL){?>
    <script>alert("Ingresa un apellido materno");window.location.href ="../historial-donaciones.php"</script>
<?php

}else if($tp_sangre=="" || $tp_sangre==" " || $tp_sangre==NULL){?>
    <script>alert("Ingresa un tipo de sangre válido");window.location.href ="../historial-donaciones.php"</script>
<?php
}else if($tp_donacion=="" || $tp_donacion==" " || $tp_donacion==NULL){?>
    <script>alert("Ingresa un tipo de donación");window.location.href ="../historial-donaciones.php"</script>
<?php
}else if($fecha_donacion==NULL || $fecha_donacion=='0000-00-00' || $fecha_donacion==''){?>
    <script>alert("Ingresa una fecha válida");window.location.href ="../historial-donaciones.php"</script>
<?php
}else if($hora_donacion=="" || $hora_donacion==" " || $hora_donacion==NULL){?>
    <script>alert("Ingresa una hora válida");window.location.href ="../historial-donaciones.php"</script>
<?php
}


  $actualizar=$pdo->prepare("UPDATE donaciones SET id_tipo_donacion=(SELECT id FROM tipo_donacion WHERE tipo_donacion=:tp_donacion),
  id_sangre=(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tp_sangre),
  id_donador=(SELECT id FROM donadores WHERE nombre=:nombre AND a_paterno=:a_paterno AND a_materno=:a_materno),
  fecha_donacion=:fecha_donacion,hora_donacion=:hora_donacion WHERE id=:id_donacion");
  $actualizar->bindParam(':id_donacion',$id);
  $actualizar->bindParam(':tp_donacion',$tp_donacion);
  $actualizar->bindParam(':tp_sangre',$tp_sangre);
  $actualizar->bindParam(':nombre',$nombre);
  $actualizar->bindParam(':a_paterno',$a_paterno);
  $actualizar->bindParam(':a_materno',$a_materno);
  $actualizar->bindParam(':fecha_donacion',$fecha_donacion);
  $actualizar->bindParam(':hora_donacion',$hora_donacion);
  if($actualizar->execute()){
  ?>
  <script>alert("GUARDADO EXITOSO");window.location.href ="../historial-donaciones.php"</script>
<?php
	header('location:../historial-donaciones.php');
}else{?>
  <script>alert("ERROR AL ACTUALIZAR LOS DATOS");window.location.href ="../historial-donaciones.php"</script>
<?php
}
?>