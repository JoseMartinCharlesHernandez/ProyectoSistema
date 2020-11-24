<?php 
include('../../conexion.php');

session_start();
if($_SESSION['active_admin']==true){
//-----------------------------query para mostrar el numero de registros de donadores pendientes
    $query=$pdo->prepare("SELECT COUNT(*) FROM donadores WHERE aceptado=0");
    $query->execute();
    $cantidad_pentdientes=$query->fetchColumn();
	$num= $cantidad_pentdientes;
	if($cantidad_pentdientes==0){
		$num="";
	}

	$id=$_POST['id_donacion'];

  $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donaciones.id=:id");
  $query_tabla_donaciones->bindParam(":id",$id);
  $query_tabla_donaciones->execute();
  $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);



    /*----------------------------consulta para traer los tipos de donacion--------------------------------*/
    $query_donacion=$pdo->prepare("SELECT * FROM tipo_donacion");
    $query_donacion->execute();
    $tip_donacion=$query_donacion->fetchAll(PDO::FETCH_ASSOC); 

    /*----------------------------consulta para traer los tipos de donacion--------------------------------*/
    $query_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
    $query_sangre->execute();
    $tipo_sangre=$query_sangre->fetchAll(PDO::FETCH_ASSOC); 




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
		<!--<div class="hoverA"><a href="../../main-admin.php">Inicio</a></div>-->
		<div class="hoverA"><a href="../../donadores/donadores.php">Donadores</a></div>
		<div class="hoverA"><a href="../../personal/personal.php">Personal del banco de sangre</a></div>
		<div class="hoverA"><a href="../../donaciones/historial-donaciones.php">Historial de donaciones</a></div>
		<div class="hoverA"><a href="../../pendientes/pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
		<div class="hoverA"><a href="../../mensajeria/mensajeria.php">Mensajería</a></div>
		<div class="hoverA"><a href="../../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>



<div class="main-container">
	<h1 class="h1Titulo"><b>Editar donación</b></h1><br>

	<div class="cont_form">
      <form action="update.php" method="POST">
		<?php  foreach ($lista_donaciones as $datos) { ?>
			<input required type="hidden" name="id_donacion" id="id_donacion" value="<?php echo $datos['id'] ?>">

            <label>Nombre del donador:</label><br>
              <input type="hidden" name="nombre" id="input_nombre" value="<?php echo $datos['nombre'] ?>">
              <input type="hidden" name="a_paterno" id="input_a_paterno" value="<?php echo $datos['a_paterno'] ?>">
              <input type="hidden" name="a_materno" id="input_a_materno" value="<?php echo $datos['a_materno'] ?>">

              <input disabled type="text" name="nombre" id="input_nombre" value="<?php echo $datos['nombre'] ?>">
              <input disabled type="text" name="a_paterno" id="input_a_paterno" value="<?php echo $datos['a_paterno'] ?>">
              <input disabled type="text" name="a_materno" id="input_a_materno" value="<?php echo $datos['a_materno'] ?>">
            <br>

            <label>Tipo de sangre del donador:</label><br>
              <input type="hidden" name="select_sangre" id="select_sangre" value="<?php echo $datos['tipo_de_sangre'] ?>">
              <input disabled type="text" name="select_sangre" id="select_sangre" value="<?php echo $datos['tipo_de_sangre'] ?>">

            <br>

            <label>Tipo de donación:</label><br>
            <select required name="select_donacion" id="select_donacion">
                <option><?php echo $datos['tipo_donacion'] ?></option>
                <?php foreach ($tip_donacion as $d) {?>
                  <option><?php echo $d['tipo_donacion']; ?></option>
                <?php } ?>
            </select>
            <br>

            <label id="lbl_inicio">Fecha de de la donación:</label><br>
            <input required type="date" name="fecha_donacion" id="fecha_donacion" value="<?php echo $datos['fecha_donacion'] ?>">
            <br>

            <label id="lbl_fin">Hora de la donación:</label><br>
            <input required type="time" name="hora_donacion" id="hora_donacion" value="<?php echo $datos['hora_donacion'] ?>">


		<?php } ?>
	</div>
	<button class="btn btn-primary" type="submit" id="btn_updateDonacion">Aceptar</button>
    </form>

	<button class="btn btn-light" type="button" data-toggle="modal" data-target="#exampleModal">Cancelar</button>

</div>





</body>
</html>



<!-- MODAL DE CANCELAR -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button onclick="location.href='../historial-donaciones.php'"; type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php 
}
?>
