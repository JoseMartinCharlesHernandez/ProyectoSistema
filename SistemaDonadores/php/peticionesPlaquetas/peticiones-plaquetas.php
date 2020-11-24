<?php 
include('../conexion.php');

session_start();
if($_SESSION['active_donador']==true){

//-isset que evalua si la variable esta recibiendo datos, si no la inicializa con un valor vacio
  $filtro=(isset($_POST['filtro_sangre']))?$_POST['filtro_sangre']:"";

  if ($filtro=="") {
//----------------si la variable filtro esta vacia se realiza esta consulta-----------------------
    $query_peticiones=$pdo->prepare("SELECT peticiones.id,tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, peticiones.cantidad_transfusiones, peticiones.fecha_inicio, peticiones.fecha_fin, peticiones.finalizada FROM peticiones INNER JOIN tipo_donacion ON tipo_donacion.id=peticiones.id_tipo_donacion INNER JOIN  tipos_sangre ON tipos_sangre.id = peticiones.id_sangre WHERE peticiones.finalizada=0 AND peticiones.id_tipo_donacion=2");
    $query_peticiones->execute();
    $resul_peticiones=$query_peticiones->fetchAll(PDO::FETCH_ASSOC);

  }elseif ($filtro!="") {
//---------------si la variable filtro no esta vacia se realiza esta consulta--------------------
    $query_peticiones=$pdo->prepare("SELECT peticiones.id,tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, peticiones.cantidad_transfusiones, peticiones.fecha_inicio, peticiones.fecha_fin, peticiones.finalizada FROM peticiones INNER JOIN tipo_donacion ON tipo_donacion.id=peticiones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = peticiones.id_sangre WHERE tipos_sangre.tipo_de_sangre = :sangre AND finalizada=0 AND peticiones.id_tipo_donacion=2");
    $query_peticiones->bindParam(":sangre",$filtro);
    $query_peticiones->execute();
    $resul_peticiones=$query_peticiones->fetchAll(PDO::FETCH_ASSOC);
  }
//---------------------------consulta que trae los tipos de sangre------------------------------
    $query_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
    $query_sangre->execute();
    $resul_sangre=$query_sangre->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--/////////////////////////////////elementos de bootstrap/////////////////////////////////////-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title></title>

<!--/////////////////////////////////elementos locales/////////////////////////////////////-->
  <link rel="stylesheet" type="text/css" href="../../css/nav.css">
  <link rel="stylesheet" type="text/css" href="../../css/main-content.css">
    <link rel="stylesheet" type="text/css" href="../../css/queriesPlaquetas.css">
   <link rel="stylesheet" type="text/css" href="../../css/queriesNav.css">
</head>
<body>
  <!--/////////////////////////////////side bar/////////////////////////////////////-->
<div class="Sidebar">
<label class="lbl_admin">
    <?php echo $_SESSION['Name']; 
    echo " ".$_SESSION['a_paterno']; echo " ".$_SESSION['a_materno'];?>
      
  </label>
</div>



<div class="Sidebar_resp">
<label class="lbl_admin">
    <?php echo $_SESSION['Name']; 
    echo " ".$_SESSION['a_paterno']; echo " ".$_SESSION['a_materno'];?></label><td/>
  <button class="w3-button w3-xlarge"  id="btn_menu_responsivo" onclick="show_resp()">☰</button>
</div>


<!--/////////////////////////////////menu lateral/////////////////////////////////////-->
<div class="sidenav">
  <div class="sideContent">
    <div class="hoverA"><a href="../main-donadores.php">Inicio</a></div>
    <div class="hoverA"><a href="../perfil/Perfil.php">Perfil</a></div>
    <div class="hoverA"><a href="../peticionesSangre/peticiones-sangre.php">Peticiones de Sangre</a></div>
    <div class="hoverA"><a href="peticiones-plaquetas.php">Peticiones de Plaquetas</a></div>
    <div class="hoverA"><a href="../peticionesPlasma/peticiones-plasma.php">Peticiones de Plasma</a></div>
    <div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
  </div>
</div>





<div class="sidenav_resp" id="sidenav_resp">
  <div class="sideContent_resp">

    <button class="dropbtn"  onclick="location.href='../main-donadores.php'" id="VistaCalidadObjetivos">Inicio</button>
    <button class="dropbtn"  onclick="location.href='../perfil/Perfil.php'" id="VistaCalidadObjetivos">Perfil</button>
    <button class="dropbtn"  onclick="location.href='../peticionesSangre/peticiones-sangre.php'" id="VistaCalidadObjetivos">Peticiones de Sangre</button>
   <button class="dropbtn"  onclick="location.href='peticiones-plaquetas.php'" id="VistaCalidadObjetivos">Peticiones de Plaquetas</button>
   <button class="dropbtn"  onclick="location.href='../peticionesPlasma/peticiones-plasma.php'" id="VistaCalidadObjetivos">Peticiones de Plasma</button>
    <button class="dropbtn"  onclick="location.href='../cerrarSesion.php'" id="VistaCalidadObjetivos">Cerrar sesión</button>
  </div>
</div>



<script type="text/javascript">
  var i=0;
  function show_resp(){
    if(i==0){
      document.getElementById("sidenav_resp").style.display = "block";
      i=1;
    }else if(i==1){
      document.getElementById("sidenav_resp").style.display = "none";
      i=0;
    }
  }



</script>

<!--///////su css se encuentra en main-content///////////-->
<div class="content-search-resp">
  <form action="" method="POST">
    <select required id="buscador"  name="filtro_sangre">
      <option>Filtrar por tipo de sangre:</option>
       <?php foreach ($resul_sangre as $s) {?>
        <option><?php echo $s['tipo_de_sangre']; ?></option>
        <?php }?>
    </select>
    <button type="submit" class="btn btn-primary" id="btn_filtrar">Filtrar</button>
  </form>
</div>





<!--/////////////////////////////////contenedor principal/////////////////////////////////////-->
<div class="main-container2">
<h2 class="h2Titulo">PETICIONES DE PLAQUETAS</h2><br>
<!--/////////////////////////////////contenedor del buscador/////////////////////////////////////-->
<!--///////su css se encuentra en main-content///////////-->
<div class="content-search">
  <form action="" method="POST">
    <select required id="buscador"  name="filtro_sangre">
      <option>Filtrar por tipo de sangre:</option>
       <?php foreach ($resul_sangre as $s) {?>
        <option><?php echo $s['tipo_de_sangre']; ?></option>
        <?php }?>
    </select>
    <button type="submit" class="btn btn-primary">Filtrar</button>
  </form>
</div>

<br>
<!--///////////////////////contenedor de las cards donde se muestran las peticiones////////////////////////-->
<div style="margin-left: 4%;">
  <?php foreach ($resul_peticiones as $r) {?>
  <div style="display: inline-block;">
    <div  class="card border-danger mb-3" style="max-width: 18rem;">
      <div class="card-header">Tipo de sangre:<?php echo " ".$r['tipo_de_sangre']; ?></div>
      <div class="card-body text-danger">
        <h5 class="card-title">Cantidad de transfuciones de sangre requeridas:<?php echo " ".$r['cantidad_transfusiones']; ?></h5>
        <p class="card-text">Fecha limite:<?php echo " ".$r['fecha_fin']; ?></p>
      </div>
    </div>
  </div>
    <!--espacio en blanco-->&nbsp;&nbsp;&nbsp;&nbsp;
  <?php }?>
</div>
</div>



<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->





</body>
</html>

<?php 
}else if($_SESSION['active_donador']==false){
  header('location:../index.php');
} 
?>