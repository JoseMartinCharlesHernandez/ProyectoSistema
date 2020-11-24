<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<link rel="stylesheet" type="text/css" href="../css/nav.css">
<link rel="stylesheet" type="text/css" href="../css/contenidos.css">
<link rel="stylesheet" type="text/css" href="../css/footer.css">
<link rel="stylesheet" type="text/css" href="../css/menu-vertical.css">
<link rel="stylesheet" type="text/css" href="../css/queries_contenido.css">
<link rel="stylesheet" type="text/css" href="../css/queries_nav.css">
<link rel="stylesheet" type="text/css" href="../css/queries_footer.css">
<script src="js/nav.js"></script>

</head>
<body>
		<a href="../index.php"><img id="logo-tam" src="../img/logo.png" width="180px" height="180px"></a>
		<h2 class="titulo"><b>CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA TAMAULIPAS</b></h2>




<!--/////////////////////////////////////////////////navbar(MENU)//////////////////////////////////////////////////////////-->

	<div class="topnav" id="myTopnav">
		<div class="cont-nav">
			 <div class="dropdown">
			    <button class="dropbtn">Quienes somos 
			      <i class="fa fa-caret-down"></i>
			    </button>
			    <div class="dropdown-content">
			      <a href="Presentacion.php" id="VistaPresentacion">Presentación</a>
			      <a href="QueHacemos.php" id="VistaQueHacemos">Qué hacemos</a>
			      <a href="Operacion.php" id="VistaOperacion">Operación</a>
			    </div>
			  </div> 

			 <div class="dropdown">
			    <button class="dropbtn">Marco Jurídico
			      <i class="fa fa-caret-down"></i>
			    </button>
			    <div class="dropdown-content">
			      <a href="RegulacionJuridica.php" id="VistaRegulacionJuridica">Regulación jurídica</a>
			      <a href="MisionVision.php" id="VistaVision">Misión y Visión</a>
			      <a href="Valores.php" id="VistaValores">Valores</a>
			    </div>
			  </div> 


			  <a href="CalidadObjetivos.php" id="VistaCalidadObjetivos">Política de Calidad</a>

			  <a href="ImportanciaDonacion.php" id="VistaImportanciaDonacion">Importancia de la Donación</a>
			  <a href="Requisitos.php" id="VistaRequisitosDonador">Requisitos para ser Donador</a>
			  <a href="Donador.php" id="VistaDonador">Quiero ser Donador</a>
			  <a href="Mitos.php" id="VistaMitos">Mitos</a>
			  <a href="Contacto.php" id="VistaContacto">Contacto</a>
			  <a href="Acceder.php" id="VistaAcceder">Acceder</a>
			  
	</div>
</div>



<!--//////////////////////////////////////////////menu responsive/////////////////////////////////////////////////////-->
<button class="w3-button w3-xlarge"  id="btn_menu_responsivo" onclick="show_resp()">☰</button>

<div class="myresponsive_menu" id="myresponsive_menu">
	<div class="responsive_content">
			<button class="dropbtn" onclick="show_sub_resp()">Quienes somos 
			  	<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="sub_content">
			    <a href="Presentacion.php" id="VistaPresentacion">Presentación</a>
			    <a href="QueHacemos.php" id="VistaQueHacemos">Qué hacemos</a>
			    <a href="Operacion.php" id="VistaOperacion">Operación</a>
			</div>

			<button class="dropbtn" onclick="show_sub_resp2()">Marco Jurídico
			      <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="sub_content2">
			      <a href="RegulacionJuridica.php" id="VistaRegulacionJuridica">Regulación jurídica</a>
			      <a href="MisionVision.php" id="VistaVision">Misión y Visión</a>
			      <a href="Valores.php" id="VistaValores">Valores</a>
			</div>

	<button class="dropbtn"  onclick="location.href='CalidadObjetivos.php'" id="VistaCalidadObjetivos">Política de Calidad</button>
	<button class="dropbtn"  onclick="location.href='ImportanciaDonacion.php'" id="VistaImportanciaDonacion">Importancia de la Donación</button>
	<button class="dropbtn"  onclick="location.href='Requisitos.php'" id="VistaRequisitosDonador">Requisitos para ser Donador</button>
	<button class="dropbtn"  onclick="location.href='Donador.php'" id="VistaDonador">Quiero ser Donador</button>
	<button class="dropbtn"  onclick="location.href='Mitos.php'" id="VistaMitos">Mitos</button>
	<button class="dropbtn"  onclick="location.href='Contacto.php'" id="VistaContacto">Contacto</button>
	<button class="dropbtn"  onclick="location.href='Acceder.php'" id="VistaAcceder">Acceder</button>

	</div>
</div>

<script type="text/javascript">
	var i=0;
	function show_resp(){
		if(i==0){
			document.getElementById("myresponsive_menu").style.display = "block";
			i=1;
		}else if(i==1){
			document.getElementById("myresponsive_menu").style.display = "none";
			i=0;
		}
	}

	function show_sub_resp(){
		if(i==0){
			document.getElementById("sub_content").style.display = "block";
			i=1;
		}else if(i==1){
			document.getElementById("sub_content").style.display = "none";
			i=0;
		}
	}

		function show_sub_resp2(){
		if(i==0){
			document.getElementById("sub_content2").style.display = "block";
			i=1;
		}else if(i==1){
			document.getElementById("sub_content2").style.display = "none";
			i=0;
		}
	}


</script>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->








<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="../img/logo-tam-blanco.png" width="29" height="32">
            <p><a href="https://www.tamaulipas.gob.mx/salud/" target="_blank">Secretaria <br>de salud</a></p>
        </li>
        <li>
            <img src="../img/logo-tam-blanco.png" width="29" height="32">
            <p><a href="https://www.tamaulipas.gob.mx/" target="_blank">Gobierno<br>de Tamaulipas</a></p>
        </li>
        <li>
            <img src="../img/logo-tam-blanco.png" width="29" height="32">
            <p><a href="https://plus.google.com/codexworld" target="_blank">Follow Us on<br>Google+</a></p>
        </li>
    </ul>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->









<div class="content-style" id="contenedor"> 
			

<div>
	<img id="bar-style" src="../img/barra.png">
	<h3>CONTACTO</h3>	
</div>

<br>
<div>
	<img id="bar2-style" src="../img/barra.png">
	<h2>Centro Estatal de la Transfusión Sanguínea de Tamaulipas Banco Estatal de Sangre</h2>	
</div>
<br>
<label>Calle Calamaco Esquina con Loma Agreste s/n</label><br> <label>Fraccionamiento Lomas de Calamaco</label><br>
<label>C.P. 87018, Ciudad Victoria, Tamaulipas.</label>
<label>correos electrónicos </label>
<label>bancosdesangre.tamps@gmail.com y cets.tam@gmail.com</label>
<label>teléfono 834 313 4460.</label><br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7303.638139916338!2d-99.17005667033663!3d23.753830570662426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6bb1f521c2631975!2sCentro%20Estatal%20de%20Transfusi%C3%B3n%20Sangu%C3%ADnea!5e0!3m2!1ses-419!2smx!4v1595869400226!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
			
			<br><br>

			<?php include('Footer.php'); ?>

	</body>
</html>


