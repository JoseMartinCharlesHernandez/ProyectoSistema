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




    $filtro=(isset($_POST['busqueda']))?$_POST['busqueda']:"";


    if ($filtro=="" || $filtro==" " || $filtro==NULL) {
  //////////////////////////////////////TABLA DONDE SE MUESTRAN LAS PETICIONES READAS//////////////////////////////////////////-->
        $query_tabla_donadores=$pdo->prepare("SELECT * FROM donadores WHERE aceptado=1");
        $query_tabla_donadores->execute();
        $lista_donadores=$query_tabla_donadores->fetchAll(PDO::FETCH_ASSOC);
    }else if($filtro!="" || $filtro!=" " || $filtro!=NULL){
        $query_tabla_donadores=$pdo->prepare("SELECT * FROM donadores WHERE nombre LIKE ? AND aceptado=1");
        $query_tabla_donadores->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
        $query_tabla_donadores->execute();
        $lista_donadores=$query_tabla_donadores->fetchAll(PDO::FETCH_ASSOC);
    
        if(!$lista_donadores){ ?>
          <script>alert("No existe un donador con ese nombre");window.location.href ="donadores.php"</script>        
  <?php     }
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
		<div class="hoverA"><a href="donadores.php">Donadores</a></div>
		<div class="hoverA"><a href="../personal/personal.php">Personal del banco de sangre</a></div>
		<div class="hoverA"><a href="../donaciones/historial-donaciones.php">Historial de donaciones</a></div>
		<div class="hoverA"><a href="../pendientes/pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
		<div class="hoverA"><a href="../mensajeria/mensajeria.php">Mensajería</a></div>
		<div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>

<div class="main-container">
	<h1 class="h1Titulo"><b>Donadores</b></h1>
<button type="button" class="btn btn-primary" onclick="location.href='../../../SistemaDonadores/php/registroFormulario.php'";>Agregar donadores</button>
<button onclick="location.href='pdf/reporteDonadores.php'"; type="button" class="btn btn-primary"  style="display: inline-block;">Generar reporte</button><br><br>

  <!--///////su css se encuentra en main-content///////////-->
    <div class="content-search">
      <form action="" method="POST">
        <input required type="text" name="busqueda" id="buscador" placeholder="Buscar por nombre" style="margin-left: 0%; position: absolute; margin-top: -2%;">
        <button type="submit" class="btn btn-primary" style="margin-left: 22%; position: absolute; margin-top: -1.5%;">Filtrar</button>
      </form>
    </div>

  <?php include('tabla-donadores.php'); ?>

</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

</body>
</html>

<!-- Modal -->
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
        ¿Estás seguro de eliminar este registro?
      </div>
      <div class="modal-footer">
      <form style="display:inline-block;" method="POST" action="delete.php">
          <input type="hidden" name="id_donador" id="id_donador">
          <button type="submit" class="btn btn-primary">Aceptar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!--script que le da el valor al input dentro del form desde el boton eliminar en la tabla-donadores-->
<script type="text/javascript">
  function mostrarDatos(datos){

    $("#id_donador").val(datos);
  }
</script>

<?php 
}else{
	header('location:../index.php');
} 
?>
