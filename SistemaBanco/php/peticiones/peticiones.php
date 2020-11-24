<?php 
include('../conexion.php');

session_start();
if($_SESSION['active_hospital']==true){
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../css/main-content.css">
  <link rel="stylesheet" type="text/css" href="../../css/form-peticiones.css">
</head>
<body>
<div class="Sidebar"> </div>

<div class="sidenav">
	<div class="sideContent">
		<div class="hoverA"><a href="../main-banco.php">Inicio</a></div>
		<div class="hoverA"><a href="peticiones.php">Peticiones</a></div>
		<div class="hoverA"><a href="../donaciones/agregar/addDonacion.php">Crear donación</a></div>
		<div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>



<div class="main-container">
<h1 class="h1Titulo"><b>Lista de Peticiones</b></h1>
<button type="button" class="btn btn-primary" onclick="location.href='agregar/addPeticion.php'";>Agregar Petición</button><br><br>
  <!--////////////////////////////////////////TABLA DONDE SE MUESTRAN LAS PETICIONES CREADAS/////////////////////////////////////////////////-->
  <?php
        $query_tabla_peticiones=$pdo->prepare("SELECT peticiones.id,tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, peticiones.cantidad_transfusiones, peticiones.fecha_inicio, peticiones.fecha_fin, peticiones.finalizada FROM peticiones INNER JOIN tipo_donacion ON tipo_donacion.id=peticiones.id_tipo_donacion INNER JOIN  tipos_sangre ON tipos_sangre.id = peticiones.id_sangre");
        $query_tabla_peticiones->execute();
        $lista_peticiones=$query_tabla_peticiones->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php include('tabla-peticiones.php'); ?>

</div>



<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





</body>
</html>

<?php 
}else{
	header('location:../index.php');
} 
?>