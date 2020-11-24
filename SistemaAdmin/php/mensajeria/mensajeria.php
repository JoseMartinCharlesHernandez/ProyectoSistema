<?php 
include('../conexion.php');
session_start();
if(isset($_SESSION['Name'])){
/*
$destinatario="volkanogaming.98@gmail.com";
$nombre="Pablo";
$asunto="mensaje de prueba";
$mensaje="hola como estamos chaval";
$email="taillowtuber98@gmail.com";

$header="ENVIANDO MENSAJE DE PRUEBA";
$carta= "De: ".$email."\n";
$carta .="Correo:".$email."\n";
$carta .="Mensaje:".$mensaje."\n";

mail($destinatario, $asunto,$carta, $header);
*/

//query para traer el catalogo de tipos de sangre
  $query_tipos_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
  $query_tipos_sangre->execute();
  $resul_Tsangre=$query_tipos_sangre->fetchAll(PDO::FETCH_ASSOC);

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
  <link rel="stylesheet" type="text/css" href="../../css/form-mensaje.css">
</head>
<body>
<div class="Sidebar"> </div>

<div class="sidenav">
	<div class="sideContent">
		<!--<div class="hoverA"><a href="../main-admin.php">Inicio</a></div>-->
		<div class="hoverA"><a href="../donadores/donadores.php">Donadores</a></div>
		<div class="hoverA"><a href="../personal/personal.php">Personal del Banco de Sangre</a></div>
		<div class="hoverA"><a href="../donaciones/historial-donaciones.php">Historial de donaciones</a></div>
		<div class="hoverA"><a href="../pendientes/pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
		<div class="hoverA"><a href="mensajeria.php">Mensajería</a></div>
		<div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>

<div class="main-container-forms">
	<h1 style="margin-top: -2%;" class="h1Titulo"><b>Mensajería</b></h1>
      <form action="sendMensaje.php" method="POST" enctype="multipart/form-data">
	<div class="cont_form">

			<div class="content-form-mensaje">
				<label>Enviar mensaje a: </label>
				<select name="opcion">
					<option>Selecciona una opción...</option>
					<option>Todos los donadores</option>
					<option>Todos los que aún no han donado</option>
				</select>
			</div>
			

			<div class="content-form-tipoDonacion">

				<label>Tipo de donación: </label><br>
	  			<div class="custom-control custom-radio custom-control-inline">
	  				<input onclick="saludo()" type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="sangre" required>
	  				<label class="custom-control-label" for="customRadioInline1">Sangre</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
	  				<input onclick="esconder()" type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" value="Plaquetas" required>
	  				<label class="custom-control-label" for="customRadioInline2">Plaquetas</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
	  				<input onclick="esconder()" type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input" value="Plasma" required>
	  				<label class="custom-control-label" for="customRadioInline3">Plasma</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
	  				<input onclick="esconder()" type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input" value="Sangre, plaquetas y plasma" required>
	  				<label class="custom-control-label" for="customRadioInline4">Sangre, plaquetas y plasma</label>
				</div>
			</div>

				<div id="select-sangre"  styclass="content-form-mensaje">
					<label>Tipo de sangre: </label><br>
					<select name="sangre">
						<option id="valor_select">Selecciona una opción...</option>
					<?php    foreach ($resul_Tsangre as $sangres) {?>
						<option><?php echo $sangres['tipo_de_sangre']; ?></option>
					<?php  }?>
						<option>Cualquier</option>
					</select>
				</div>
				

				<div class="content-form-fechaInicio">
					<label>Fecha de inicio:</label><br>
					<input type="date" name="fecha_inicio">
				</div>
				<div style="margin-left: 8%;" class="content-form-fechaLimite">
					<label>Fecha límite:</label><br>
					<input type="date" name="fecha_limite">
				</div>
				<br>
			
				<div class="content-form-txtarea">
					<label>Asunto:</label><br>
					<textarea class="txt_area" placeholder="Escribir asunto..." name="asunto"></textarea>
				</div>

				<div class="content-form-archivo">
					<label>Adjuntar archivos:</label><br>
					<input required type="file" name="attachment[]" multiple>
				</div>





	</div>

	<input type="hidden" name="id_donador" value="<?php echo $datos['id']; ?>">
<div class="content_buttons">
	<button class="btn btn-primary" type="submit" id="btn_addSangre">Aceptar</button>
	<button class="btn btn-light" type="button" data-toggle="modal" data-target="#modalCancelar">Cancelar</button>
</div>
</form>
</div>



</body>
</html>




<!-- MODAL DE CANCELAR -->
<div class="modal fade" id="modalCancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡ALERTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estas seguro de cancelar el envio de este mensaje?
      </div>
      <div class="modal-footer">
          <button onclick="location.href='../main-admin.php'"; type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>



<?php 
}else{
	header('location:../../index.php');
} 
?>
