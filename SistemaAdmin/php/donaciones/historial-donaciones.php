<?php 
include('../conexion.php');

session_start();
if($_SESSION['active_admin']==true){
  //--------------------------------------------------------------------------------
  //query para traer el catalogo de tipos de sangre
  $query_tipos_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
  $query_tipos_sangre->execute();
  $resul_Tsangre=$query_tipos_sangre->fetchAll(PDO::FETCH_ASSOC);

    /*------------------------consulta del tipo de donacion---------------------------------*/
    $query_donacion=$pdo->prepare("SELECT * FROM tipo_donacion");
    $query_donacion->execute();
    $tip_donacion=$query_donacion->fetchAll(PDO::FETCH_ASSOC); 
//-----------------------------query para mostrar el numero de registros de donadores pendientes

    $query=$pdo->prepare("SELECT COUNT(*) FROM donadores WHERE aceptado=0");
    $query->execute();
    $cantidad_pentdientes=$query->fetchColumn();
	  $num= $cantidad_pentdientes;
	  if($cantidad_pentdientes==0){
	 	 $num="";
	  } 

    $filtro=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
   $filtro2=(isset($_POST['busquedaDon']))?$_POST['busquedaDon']:"";
   $filtro3=(isset($_POST['busquedaSangre']))?$_POST['busquedaSangre']:"";
   $filtro4=(isset($_POST['busquedaFechaInicio']))?$_POST['busquedaFechaInicio']:"";
   $filtro5=(isset($_POST['busquedaFechaFin']))?$_POST['busquedaFechaFin']:"";
    $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador ORDER BY donaciones.id");
    $query_tabla_donaciones->execute();
    $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
    $arrayfiltro=$lista_donaciones;
 
    for ($i=0;$i<count($arrayfiltro);$i++)
    {
      if($filtro!="")
      { 
        $valido=false;
        $separados = explode(" ", $arrayfiltro[$i]["nombre"]);
        for ($j=0; $j < count($separados); $j++) 
          if(strtolower($separados[$j])==strtolower($filtro))
            $valido=true;
          if(!$valido)
            unset($lista_donaciones[$i]);
        }
        
        if($filtro2!="Tipos de Donaciones..."AND$filtro2!="")  
         if($filtro2!=$arrayfiltro[$i]["tipo_donacion"])
            unset($lista_donaciones[$i]); 
            
        if($filtro3!="Tipo de Sangre..."AND$filtro3!="")  
          if($filtro3!=$arrayfiltro[$i]["tipo_de_sangre"])
           unset($lista_donaciones[$i]); 
            
        if($filtro4!=""AND$filtro5!="")
        {
          $format_fecha = new DateTime($arrayfiltro[$i]['fecha_donacion']);
          $fecha = $format_fecha->format('yy-m-d');
          if($fecha<$filtro4 || $fecha>$filtro5 )
            unset($lista_donaciones[$i]); 
        }
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
    <div class="hoverA"><a href="historial-donaciones.php">Historial de donaciones</a></div>
    <div class="hoverA"><a href="../pendientes/pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
    <div class="hoverA"><a href="../mensajeria/mensajeria.php">Mensajeria</a></div>
    <div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
  </div>
</div>

<div class="main-container">
<h1 class="h1Titulo"><b>Donaciones</b></h1>
<button onclick="location.href='agregar/addDonacion.php'"; type="button" class="btn btn-primary" style="display: inline-block;">Crear donación</button>
<button data-toggle="modal" data-target="#reporteModal" type="button" class="btn btn-primary"  style="display: inline-block;">Generar reporte</button><br><br>

  <!--///////su css se encuentra en main-content///////////-->
    <div class="content-search">
      <form id="form_busc1" action="" method="POST">
        <input type="text" name="busqueda" id="buscador" placeholder="Buscar por nombre">

    <select id="buscador2" name="busquedaDon">
              <option>Tipos de donaciones...</option>
      <?php    foreach ($tip_donacion as $don) {?>
                <option><?php echo $don['tipo_donacion']; ?></option>
      <?php  }?>
             </select>

         <select id="buscador3" name="busquedaSangre">
          <option>Tipo de sangre...</option>
  <?php    foreach ($resul_Tsangre as $sangres) {?>
            <option><?php echo $sangres['tipo_de_sangre']; ?></option>
  <?php  }?>
         </select>
          <input name="busquedaFechaInicio" id="buscador4" type="date">
          <input name="busquedaFechaFin" id="buscador5" type="date">
          <button id="btn_filtro_historial" type="submit" class="btn btn-primary" style="margin-left: 23.7%; position: absolute; margin-top: -6.9%;">Filtrar</button>
      </form>

    </div>
<br><br>
  <?php  include('tabla-donaciones.php');?>




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
        ¿Estas seguro de finalizar este registro?
      </div>
      <div class="modal-footer">
      <form style="display:inline-block;" method="POST" action="eliminar/delete.php">
          <input type="hidden" name="id_donacion" id="id_donacion">
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

    $("#id_donacion").val(datos);
  }
</script>












<!-- Modal del boton de reporte-->
<div class="modal fade" id="reporteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TIPO DE REPORTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="pdf/reporteSangre.php">
          <h5>Tipo de donaciones:</h5>
           <select required name="donacion" id="select_donacionpdf">
              <option value="">Tipo de donación...</option>
           <?php foreach ($tip_donacion as $d) {?>
              <option><?php echo $d['tipo_donacion']; ?></option>
           <?php } ?>
           <option>Todos</option>
           </select><br>

          <h5>Tipo de sangre:</h5>
           <select name="sangre" id="select_donacionpdf">
              <option>Tipo de sangre...</option>
           <?php foreach ($resul_Tsangre as $d) {?>
              <option><?php echo $d['tipo_de_sangre']; ?></option>
           <?php } ?>
              <!--<option>Todos</option>-->
           </select><br>

            <h5>Fecha de inicio:</h5>
            <input id="input_fechaIniciopdf" name="fechaInicio" type="date"><br>
            
            <h5>Fecha de fin:</h5>
            <input id="input_fechaFinpdf" name="fechaFin" type="date">
            <br>
              <button type="submit" class="btn btn-primary">Aceptar</button>
              <button  type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
       </form>
      </div>
    </div>
  </div>
</div>






<!-- MODALES DE LOS FORMS PARA LA GENERACION DE REPORTES -->
<?php include('modales.php'); ?>































<?php 
}else{
	header('location:../index.php');
} 
?>