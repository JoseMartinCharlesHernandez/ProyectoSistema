<?php 
include('../../conexion.php');
include('../../config.php');


	  $filtro=(isset($_POST['busqueda']))?$_POST['busqueda']:"";


	  if ($filtro=="" || $filtro==" " || $filtro==NULL) {
	  		$query_tabla_donadores=$pdo->prepare("SELECT donadores.nombre, donadores.a_paterno, donadores.a_materno, tipos_sangre.tipo_de_sangre, donadores.correo, donadores.telefono, donadores.ultima_donacion FROM donadores INNER JOIN tipos_sangre ON tipos_sangre.id=donadores.id_sangre WHERE donadores.aceptado=1");
        	$query_tabla_donadores->execute();
        	$lista_donadores=$query_tabla_donadores->fetchAll(PDO::FETCH_ASSOC);
	  }else if($filtro!="" || $filtro!=" " || $filtro!=NULL){

	  		$query_tabla_donadores=$pdo->prepare("SELECT donadores.nombre, donadores.a_paterno, donadores.a_materno, tipos_sangre.tipo_de_sangre, donadores.correo, donadores.telefono, donadores.ultima_donacion FROM donadores INNER JOIN tipos_sangre ON tipos_sangre.id=donadores.id_sangre WHERE donadores.nombre LIKE ? AND donadores.aceptado=1");
	  		$query_tabla_donadores->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
	  		//$query_tabla_donadores->bindParam(":f",$filtro);
        	$query_tabla_donadores->execute();
        	$lista_donadores=$query_tabla_donadores->fetchAll(PDO::FETCH_ASSOC);
        	if(!$lista_donadores){ ?>



<?php
        	}
	  }


    /*-----------------------------------------------------------------------*/
    $query_donacion=$pdo->prepare("SELECT * FROM tipo_donacion");
    $query_donacion->execute();
    $tip_donacion=$query_donacion->fetchAll(PDO::FETCH_ASSOC); 

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../css/main-content.css">
</head>
<body>
<div class="Sidebar"> </div>

<div class="sidenav">
	<div class="sideContent">
		<div class="hoverA"><a href="../../main-banco.php">Inicio</a></div>
		<div class="hoverA"><a href="../../peticiones/peticiones.php">Peticiones</a></div>
		<div class="hoverA"><a href="addDonacion.php">Crear donación</a></div>
		<div class="hoverA"><a href="../../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>



<div class="main-container">
	<h1 class="h1Titulo"><b>Selecciona un Donador</b></h1><br>

	<!--///////su css se encuentra en main-content///////////-->
		<div class="content-search">
		  <form action="" method="POST">
		  	<input type="text" name="busqueda" id="buscador" placeholder="Buscar por nombre">
		    <button type="submit" class="btn btn-primary">Filtrar</button>
		  </form>
		</div>


	<br>
	  <?php  include('tabla-donadores.php');?>



</div>







</body>
</html>


