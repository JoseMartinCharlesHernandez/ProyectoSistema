<?php 
include('../conexion.php');

session_start();
if($_SESSION['active_donador']==true){
  include('showPerfil.php');
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
  <link rel="stylesheet" type="text/css" href="../../css/perfil.css">
  <link rel="stylesheet" type="text/css" href="../../css/queriesPerfil.css">
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
    <div class="hoverA"><a href="../main-donadores.php">Historial de donaciones</a></div>
    <div class="hoverA"><a href="Perfil.php">Perfil</a></div>
   <!-- <div class="hoverA"><a href="../peticionesSangre/peticiones-sangre.php">Peticiones de Sangre</a></div>
    <div class="hoverA"><a href="../peticionesPlaquetas/peticiones-plaquetas.php">Peticiones de Plaquetas</a></div>
    <div class="hoverA"><a href="../peticionesPlasma/peticiones-plasma.php">Peticiones de Plasma</a></div>-->
    <div class="hoverA"><a href="../cerrarSesion.php">Cerrar sesión</a></div>
  </div>
</div>


<div class="sidenav_resp" id="sidenav_resp">
  <div class="sideContent_resp">
    <button class="dropbtn"  onclick="location.href='../main-donadores.php'" id="VistaCalidadObjetivos">Inicio</button>
    <button class="dropbtn"  onclick="location.href='Perfil.php'" id="VistaCalidadObjetivos">Perfil</button>
    <button class="dropbtn"  onclick="location.href='../peticionesSangre/peticiones-sangre.php'" id="VistaCalidadObjetivos">Peticiones de Sangre</button>
    <button class="dropbtn"  onclick="location.href='../peticionesPlaquetas/peticiones-plaquetas.php'" id="VistaCalidadObjetivos">Peticiones de Plaquetas</button>
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


<img style="margin-left: 22.5%; position: absolute; margin-top: 3%;" src="../../img/donacion.jpg" width="70%" height="230">

<!--/////////////////////////////////contenedor principal/////////////////////////////////////-->
<div class="main-container3">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h2 class="h1Titulo1"><b>Información del usuario</b></h2> 

<div class="cont_resp1">
  

  <label><b>Nombre:</b></label><label id="lbl_name"><?php echo $_SESSION['Name']; echo " ".$_SESSION['a_materno']; echo " ".$_SESSION['a_paterno'];?></label>
  <label><b>Tipo de sangre:</b></label><label id="lbl_sangre"><?php echo $_SESSION['id_sangre'];?></label><br>
  <label><b>Estado civil:</b></label><label id="lbl_estadoCivil"><?php echo $_SESSION['id_estado_civil'];?></label><br>
  <label><b>Teléfono:</b></label><label id="lbl_telefono"><?php echo $_SESSION['telefono'];?></label><br>

</div>


<div class="cont_resp2">
  <label><b>Correo electrónico:</b></label><label id="lbl_correo"><?php echo $_SESSION['correo'];?></label><br>
  <label><b>Cuenta de facebook:</b></label><label id="lbl_cuentaFb"><?php echo $_SESSION['cuenta_facebook'];?></label><br>
  <label><b>Ocupación:</b></label><label id="lbl_ocupacion"><?php echo $_SESSION['id_ocupacion'];?></label><br>
  <label><b>Grado de estudios:</b></label><label id="lbl_gradoEstudios"><?php echo $_SESSION['id_grado_estudios'];?></label><br>
</div>
























<?php foreach ($res as $r) {?>
  
<div class="cont1">
  
  <label><b>Nombre:</b></label><label id="lbl_name"><?php echo $r['nombre']." ".$r['a_paterno']." ".$r['a_materno'];?></label><br>
  <label><b>Tipo de sangre:</b></label><label id="lbl_sangre"><?php echo $r['tipo_de_sangre'];?></label><br>
  <label><b>Estado civil:</b></label></b><label id="lbl_estadoCivil"><?php echo $r['estado_civil'];?></label><br>
  <label><b>Teléfono:</b></label><label id="lbl_telefono"><?php echo $r['telefono'];?></label><br>
</div>

<div class="cont2">
  <label><b>Correo:</b></label><label id="lbl_correo"><?php echo $r['correo'];?></label><br>
  <label><b>Cuenta de facebook:</b> </label><u><a href="<?php echo $r['link_facebook']; ?>"><label id="lbl_cuentaFb"></i></u><?php echo $r['cuenta_facebook'];?></label></a><br>
  <label><b>Ocupación:</b> </label><label id="lbl_ocupacion"><?php echo $r['nombre_ocupacion'];?></label><br>
  <label><b>Grado de estudios:</b> </label><label id="lbl_gradoEstudios"><?php echo $r['nombre_grado'];?></label><br>
</div>


<?php } ?>
<br>





<form method="POST" action="editPerfil.php">
  <input type="hidden" name="id_user" value="<?php echo $_SESSION['id'];?>">
  <button id="update_info" type="submit" class="btn btn-primary">Actualizar información</button>
</form>


















<!--///////////////////////////////////////apartado para la foto de perfil///////////////////////////////////////////////-->

<div class="cont-form-picture">
  <form method="POST" action="">
      <?php
        if($_SESSION['img_perfil']==NULL || $_SESSION['img_perfil']=="" || $_SESSION['img_perfil']==" "){
      ?>
    <div class="picture-default">
      <img style="margin-left: -.8%; position: absolute; margin-top: 1.5%;" src="../../img/user.png" width="260" height="260">
    </div>
        <?php }else{ ?>
      <div class="picture-profile">
        <!--<?php echo'<img src="data:image/png;base64, '.base64_encode($_SESSION['img_perfil']).'">' ?>-->
        <img class="img_perfil" src="data:image/png;base64,<?php echo base64_encode($_SESSION['img_perfil']);?>">
      </div>
        <?php } ?>
    <br><br>
    <button id="btn_foto" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImg">Subir foto de perfil</button>
    
    <button id="btn_foto_del"  type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelImg">Eliminar foto de perfil</button>
  </form>
</div>



<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 <hr color="black" size=9>




<!-- Modal para elegir una foto de perfil-->
<div class="modal fade" id="modalImg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Foto de Perfil:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="uploadImg.php" enctype="multipart/form-data">
      <div class="modal-body">
          Elige una imagen:<br><br>
          <input accept="image/gif,image/jpeg,image/jpg,image/png" required style="
            font-family: 'Roboto', sans-serif;
            outline: 0;
            background: #eeeeee;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;" 
            type="FILE" name="imgperfil">
            <input type="hidden" name="id_donador" value="<?php echo $_SESSION['id'];?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>





<!-- Modal para elegir una foto de perfil-->
<div class="modal fade" id="modalDelImg" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">¡ALERTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="delImgProfile.php">
      <div class="modal-body">
        ¿Estás seguro de eliminar tu foto de perfil?
            <input type="hidden" name="id_donador" value="<?php echo $_SESSION['id'];?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
      </div>
    </div>
  </div>
</div>





</div>




<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->



</body>
</html>

<?php 
}else if($_SESSION['active_donador']==false){
  header('location:../../index.php');
} 
?>