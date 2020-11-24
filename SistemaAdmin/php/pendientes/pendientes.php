<?php 
include('../conexion.php');

session_start();
if(isset($_SESSION['Name'])){

//-----------------------------query para mostrar el numero de registros de donadores pendientes

    $query=$pdo->prepare("SELECT COUNT(*) FROM donadores WHERE aceptado=0");
    $query->execute();
    $cantidad_pentdientes=$query->fetchColumn();
	$num= $cantidad_pentdientes;
	if($cantidad_pentdientes==0){
		$num="";
	} 
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
  
</head>
<body>
<div class="Sidebar">
<label class="lbl_admin">
	<?php echo $_SESSION['Name']; 
	echo " ".$_SESSION['a_paterno']; echo " ".$_SESSION['a_materno'];?>
		
</label>
</div>

<div class="sidenav">
	<div class="sideContent">
		<!--<div class="hoverA"><a href="../main-admin.php">Inicio</a></div>-->
		<div class="hoverA"><a href="../donadores/donadores.php">Donadores</a></div>
		<div class="hoverA"><a href="../personal/personal.php">Personal del banco de sangre</a></div>
		<div class="hoverA"><a href="../donaciones/historial-donaciones.php">Historial de donaciones</a></div>
		<div class="hoverA"><a href="pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
		<div class="hoverA"><a href="../mensajeria/mensajeria.php">Mensajería</a></div>
		<div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>

<div class="main-container">
	<h1 class="h1Titulo"><b>Solicitudes de registro de donadores</b></h1>
<button type="button" class="btn btn-primary" onclick="location.href='../../../SistemaDonadores/php/registroFormulario.php'";>Agregar donadores</button>
  <!--////////////////////////////////////////TABLA DONDE SE MUESTRAN LAS PETICIONES CREADAS/////////////////////////////////////////////////-->
  <?php
        $query_tabla_donadores=$pdo->prepare("SELECT * FROM donadores WHERE aceptado=0");
        $query_tabla_donadores->execute();
        $lista_donadores=$query_tabla_donadores->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php include('tabla-pendientes.php'); ?>

</div>



<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





</body>
</html>


<?php 
}else{
	header('location:../index.php');
} 
?>