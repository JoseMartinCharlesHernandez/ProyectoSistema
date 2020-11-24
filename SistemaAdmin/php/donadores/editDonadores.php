<?php 
include('../conexion.php');
session_start();
if(isset($_SESSION['Name'])){
$id_donador=$_POST['id_donador'];
     //consulta para traer el catalogo de los tipos de sangre
        $query=$pdo->prepare("SELECT * FROM donadores WHERE id=:p");
        $query->bindParam(':p',$id_donador);
        $query->execute();
        $info_donador=$query->fetchAll(PDO::FETCH_ASSOC);

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
  <link rel="stylesheet" type="text/css" href="../../css/form-personal.css">
</head>
<body>
<div class="Sidebar"> </div>

<div class="sidenav">
	<div class="sideContent">
		<!--<div class="hoverA"><a href="../main-admin.php">Inicio</a></div>-->
		<div class="hoverA"><a href="donadores.php">Donadores</a></div>
		<div class="hoverA"><a href="../personal/personal.php">Personal del banco de sangre</a></div>
		<div class="hoverA"><a href="../donaciones/historial-donaciones.php">Historial de donaciones</a></div>
		<div class="hoverA"><a href="../pendientes/pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
		<div class="hoverA"><a href="../mensajeria/mensajeria.php">Mensajería</a></div>
		<div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>

<div class="main-container-forms">
	<h1 style="margin-top: -2%;" class="h1Titulo"><b>Editar donador</b></h1>
      <form action="updateDonadores.php" method="POST">
	<div class="cont_form">
		<?php  foreach ($info_donador as $datos) { 
				$info=$datos['id'];
			?>

			<div class="content-form-name">
				<label id="lbl_tipo">Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" id="nombre_edit">
			</div>
			
			<div class="content-form-apellidos">
				<label id="lbl_tipo">Apellido paterno:</label>
				<input type="text" name="a_paterno" value="<?php echo $datos['a_paterno']; ?>" id="a_paterno_edit">
				<label id="lbl_tipo">Apellido materno:</label>
				<input type="text" name="a_materno" value="<?php echo $datos['a_materno']; ?>" id="a_materno_edit">
			</div>


			<div class="content-form-correo">
				<label id="lbl_tipo">Correo:</label>
				<input type="email" name="correo" value="<?php echo $datos['correo']; ?>" id="correo_edit">
			</div>


			<div class="content-form-contra">
				<label id="lbl_tipo">Contraseña:</label>
				<input type="password" name="pass" value="<?php echo $datos['contra']; ?>" id="contra_edit">
			</div>


			<div class="content-form-telefono">
				<label id="lbl_tipo">Teléfono:</label>
				<input type="text" name="telefono" value="<?php echo $datos['telefono']; ?>" id="telefono_edit">
			</div>
		<?php } ?>
	</div>

	<button onclick="enviarDatos('<?php echo $info; ?>')" class="btn btn-primary" type="button"  data-toggle="modal" data-target="#modalAceptar">Aceptar</button>
	<button class="btn btn-light" type="button" data-toggle="modal" data-target="#modalCancelar">Cancelar</button>
</form>
</div>



</body>
</html>


<!-- MODAL DE Aceptar -->
<div class="modal fade" id="modalAceptar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡ALERTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de guardar cambios?
      </div>
      <div class="modal-footer">
      <form action="updateDonadores.php" method="POST">
      		  <input type="hidden" name="id_donador" id="id_donador">
	      	  <input type="hidden" name="nombre" id="nombreh">
	      	  <input type="hidden" name="a_paterno" id="a_paternoh">
	      	  <input type="hidden" name="a_materno" id="a_maternoh">
	      	  <input type="hidden" name="correo" id="correoh">
	      	  <input type="hidden" name="pass" id="passh" >
	      	  <input type="hidden" name="telefono" id="telefonoh">
          <button type="submit" class="btn btn-primary">Aceptar</button>
      	</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  function enviarDatos(datos){
  	var nombre = document.getElementById("nombre_edit").value;
  	var a_paterno = document.getElementById("a_paterno_edit").value;
  	var a_materno = document.getElementById("a_materno_edit").value;
  	var correo = document.getElementById("correo_edit").value;
  	var pass = document.getElementById("contra_edit").value;
  	var telefono = document.getElementById("telefono_edit").value;

   //----------------------------------------------
   	$("#id_donador").val(datos);
    $("#nombreh").val(nombre);
    $("#a_paternoh").val(a_paterno);
    $("#a_maternoh").val(a_materno);
    $("#correoh").val(correo);
    $("#passh").val(pass);
    $("#telefonoh").val(telefono);
  }
</script>




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
        ¿Estás seguro de cancelar la edición de este registro?
      </div>
      <div class="modal-footer">
          <button onclick="location.href='donadores.php'"; type="button" class="btn btn-primary">Aceptar</button>
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
