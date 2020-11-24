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
    echo " ".$_SESSION['a_paterno']; echo " ".$_SESSION['a_materno'];?></label><td>
  <button class="w3-button w3-xlarge"  id="btn_menu_responsivo" onclick="show_resp()">☰</button>
</div>


<!--/////////////////////////////////menu lateral/////////////////////////////////////-->
<div class="sidenav">
  <div class="sideContent">
    <div class="hoverA"><a href="main-donadores.php">Historial de donaciones</a></div>
    <div class="hoverA"><a href="perfil/Perfil.php">Perfil</a></div>
    <!--<div class="hoverA"><a href="peticionesSangre/peticiones-sangre.php">Peticiones de Sangre</a></div>
    <div class="hoverA"><a href="peticionesPlaquetas/peticiones-plaquetas.php">Peticiones de Plaquetas</a></div>
    <div class="hoverA"><a href="peticionesPlasma/peticiones-plasma.php">Peticiones de Plasma</a></div>-->
    <div class="hoverA"><a href="cerrarSesion.php">Cerrar sesión</a></div>
  </div>
</div>



<div class="sidenav_resp" id="sidenav_resp">
  <div class="sideContent_resp">

    <button class="dropbtn"  onclick="location.href='main-donadores.php'" id="VistaCalidadObjetivos">Historial de donaciones</button>
    <button class="dropbtn"  onclick="location.href='perfil/Perfil.php'" id="VistaCalidadObjetivos">Perfil</button>
    <button class="dropbtn"  onclick="location.href='peticionesSangre/peticiones-sangre.php'" id="VistaCalidadObjetivos">Peticiones de Sangre</button>
   <button class="dropbtn"  onclick="location.href='peticionesPlaquetas/peticiones-plaquetas.php'" id="VistaCalidadObjetivos">Peticiones de Plaquetas</button>
   <button class="dropbtn"  onclick="location.href='peticionesPlasma/peticiones-plasma.php'" id="VistaCalidadObjetivos">Peticiones de Plasma</button>
    <button class="dropbtn"  onclick="location.href='cerrarSesion.php'" id="VistaCalidadObjetivos">Cerrar sesión</button>
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