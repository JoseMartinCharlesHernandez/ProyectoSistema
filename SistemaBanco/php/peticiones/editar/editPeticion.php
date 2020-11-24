<?php 
include('../../conexion.php');
$id=$_POST['id_peticion'];


        //consulta para traer el registro que se quiere editar
        $query=$pdo->prepare("SELECT peticiones.id,tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, peticiones.cantidad_transfusiones, peticiones.fecha_inicio, peticiones.fecha_fin, peticiones.finalizada FROM peticiones INNER JOIN tipo_donacion ON tipo_donacion.id=peticiones.id_tipo_donacion INNER JOIN  tipos_sangre ON tipos_sangre.id = peticiones.id_sangre WHERE peticiones.id=:id_peticion");
        $query->bindParam(':id_peticion',$id);
        $query->execute();
        $datos=$query->fetchAll(PDO::FETCH_ASSOC);

        //consulta para traer el catalogo de los tipos de sangre
        $query_lista=$pdo->prepare("SELECT * FROM tipos_sangre");
        $query_lista->execute();
        $lista_sangre=$query_lista->fetchAll(PDO::FETCH_ASSOC);

                //consulta para traer el catalogo de los tipos de sangre
        $query_peticion=$pdo->prepare("SELECT * FROM tipo_donacion");
        $query_peticion->execute();
        $lista_peticion=$query_peticion->fetchAll(PDO::FETCH_ASSOC);
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
  <link rel="stylesheet" type="text/css" href="../../../css/form-peticiones.css">
</head>
<body>
<div class="Sidebar"> </div>

<div class="sidenav">
	<div class="sideContent">
		<div class="hoverA"><a href="../../main-banco.php">Inicio</a></div>
		<div class="hoverA"><a href="../peticiones.php">Peticiones</a></div>
		<div class="hoverA"><a href="../../donaciones/agregar/addDonacion.php">Crear donación</a></div>
		<div class="hoverA"><a href="../../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>

<div class="main-container-forms">
	<h1 class="h1Titulo">Editar <b>Petición</b></h1>

<form action="UpdatePeticionPlaquetas.php" method="POST">
	<div class="cont_form">
			<input type="hidden" name="id_peticion" value="<?php echo $id ?>">

<?php foreach ($datos as $dato) { ?>

		<div class="content-form-select">
			<label id="lbl_tipo">Tipo de peticion:</label><br>
			<select required name="select_peticion" id="select_sangre">
					<option><?php echo $dato['tipo_donacion']; ?></option>

				<?php foreach ($lista_peticion as $peticion) {?>
					 <option><?php echo $peticion['tipo_donacion']; ?></option>
				<?php } ?>

			</select>
		</div>

		<div class="content-form-select">
			<label id="lbl_tipo">Tipo de sangre:</label><br>
			<select required name="select_sangre" id="select_sangre">
					<option><?php echo $dato['tipo_de_sangre']; ?></option>

				<?php foreach ($lista_sangre as $sangre) {?>
					 <option><?php echo $sangre['tipo_de_sangre']; ?></option>
				<?php } ?>
				
			</select>
		</div>

		<div class="content-form-inicio">
			<label id="lbl_inicio">Cantidad de transfuciones:</label><br>
			<input required type="text" name="cant_trans" id="cant_trans" value="<?php echo $dato['cantidad_transfusiones'];?>">
		</div>


		
		<div class="content-form-inicio">
			<label id="lbl_inicio">Fecha de inicio:</label><br>
			<input required type="date" name="fecha_inicio" id="fecha_inicio">
		</div>

		<div class="content-form-fin">
			<label id="lbl_fin">Fecha de fin:</label><br>
			<input required type="date" name="fecha_fin" id="fecha_fin">
		</div>
	</div>

<?php } ?>

	<button class="btn btn-primary" type="submit" id="btn_addSangre">Aceptar</button>
	<button class="btn btn-light" type="button" onclick="location.href='../peticiones.php'";>Cancelar</button>
</form>

</div>



</body>
</html>