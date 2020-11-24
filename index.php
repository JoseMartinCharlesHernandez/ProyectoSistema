<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<link rel="stylesheet" type="text/css" href="css/nav.css">
<link rel="stylesheet" type="text/css" href="css/contenidos.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/menu-vertical.css">
<link rel="stylesheet" type="text/css" href="css/queries_contenido.css">
<link rel="stylesheet" type="text/css" href="css/queries_nav.css">
<link rel="stylesheet" type="text/css" href="css/queries_footer.css">
</head>
<body>

		<a href="index.php"><img id="logo-tam" src="img/logo.png" width="180px" height="180px" ></a>
		<img id="logo-tam" src="img/secreta.jpg" src="img/secreta.jpg" width="450px" height="120px" style="margin-left: 66%; position: absolute; margin-top: 1.5%;"></a>
		<h2 class="titulo" style="margin-left: -2.3%; position: absolute; margin-top: 7%;"><b>CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA TAMAULIPAS</b></h2>
<!--/////////////////////////////////////////////////navbar(MENU)//////////////////////////////////////////////////////////-->

	<div class="topnav" id="myTopnav">
		<div class="cont-nav">
			 <div class="dropdown">
			 
			    <button class="dropbtn">Quienes somos 
			      <i class="fa fa-caret-down"></i>
			    </button>
			    <div class="dropdown-content">
			      <a href="php/Presentacion.php" id="VistaPresentacion">Presentación</a>
			      <a href="php/QueHacemos.php" id="VistaQueHacemos">Qué hacemos</a>
			      <a href="php/Operacion.php" id="VistaOperacion">Operación</a>
			    </div>
			  </div> 

			 <div class="dropdown">
			    <button class="dropbtn">Marco jurídico
			      <i class="fa fa-caret-down"></i>
			    </button>
			    <div class="dropdown-content">
			      <a href="php/RegulacionJuridica.php" id="VistaRegulacionJuridica">Regulación jurídica</a>
			      <a href="php/MisionVision.php" id="VistaVision">Misión y Visión</a>
			      <a href="php/Valores.php" id="VistaValores">Valores</a>
			    </div>
			  </div> 


			  <a href="php/CalidadObjetivos.php" id="VistaCalidadObjetivos">Política de Calidad</a>

			  <a href="php/ImportanciaDonacion.php" id="VistaImportanciaDonacion">Importancia de la Donación</a>
			  <a href="php/Requisitos.php" id="VistaRequisitosDonador">Requisitos para ser Donador</a>
			  <a href="php/Donador.php" id="VistaDonador">Quiero ser Donador</a>
			  <a href="php/Mitos.php" id="VistaMitos">Mitos</a>
			  <a href="php/Contacto.php" id="VistaContacto">Contacto</a>
			  <a href="php/Acceder.php" id="VistaAcceder">Acceder</a>

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
			    <a href="php/Presentacion.php" id="VistaPresentacion">Presentación</a>
			    <a href="php/QueHacemos.php" id="VistaQueHacemos">Qué hacemos</a>
			    <a href="php/Operacion.php" id="VistaOperacion">Operación</a>
			</div>

			<button class="dropbtn" onclick="show_sub_resp2()">Marco Jurídico
			      <i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="sub_content2">
			      <a href="php/RegulacionJuridica.php" id="VistaRegulacionJuridica">Regulación jurídica</a>
			      <a href="php/MisionVision.php" id="VistaVision">Misión y Visión</a>
			      <a href="php/Valores.php" id="VistaValores">Valores</a>
			</div>

	<button class="dropbtn"  onclick="location.href='php/CalidadObjetivos.php'" id="VistaCalidadObjetivos">Política de Calidad</button>
	<button class="dropbtn"  onclick="location.href='php/ImportanciaDonacion.php'" id="VistaImportanciaDonacion">Importancia de la Donación</button>
	<button class="dropbtn"  onclick="location.href='php/Requisitos.php'" id="VistaRequisitosDonador">Requisitos para ser Donador</button>
	<button class="dropbtn"  onclick="location.href='php/Donador.php'" id="VistaDonador">Quiero ser Donador</button>
	<button class="dropbtn"  onclick="location.href='php/Mitos.php'" id="VistaMitos">Mitos</button>
	<button class="dropbtn"  onclick="location.href='php/Contacto.php'" id="VistaContacto">Contacto</button>
	<button class="dropbtn"  onclick="location.href='php/Acceder.php'" id="VistaAcceder">Acceder</button>

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
		
		<?php include('php/slider.php'); ?>

<div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="img/logo-tam-blanco.png" width="29" height="32">
            <p><a href="https://www.tamaulipas.gob.mx/salud/" target="_blank">Secretaria <br>de salud</a></p>
        </li>
        <li>
            <img src="img/logo-tam-blanco.png" width="29" height="32">
            <p><a href="https://www.tamaulipas.gob.mx/" target="_blank">Gobierno<br>de Tamaulipas</a></p>
        </li>
        <li>
            <img src="img/logo-tam-blanco.png" width="29" height="32">
            <p><a href="https://plus.google.com/codexworld" target="_blank">Siguenos<br>Google+</a></p>
        </li>
    </ul>
</div>




		<div class="about-us">
			<img id="bar-style" src="img/barra.png">
			<h3>CONÓCENOS</h3>

			<p>El Centro Estatal de la Transfusión Sanguínea de Tamaulipas (CETS) fue creado en
			consecuencia de la transferencia de funciones que la Secretaria de Salud a nivel federal
			realizó a los estados...</p><br>
			<div class="container-redes">
				
			</div>
			<button onclick="location.href='php/Presentacion.php'"; id="btn_more_about" class="btn_more">Leer más...</button>
			
		</div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		
		<div class="second-content">
			<img src="img/telefono.png" id="logo_telefono" width="400" height="250" >
			<label class="lbl_resp1"> </label><label class="style-contact" style="margin-left: 9.4; position: absolute; margin-top: 4.1%;">(834) 313 4460</label>

			<img src="img/email.png" id="logo_correo" width="460" height="250" style="margin-left: 32%; position: absolute; margin-top: -3%;">
			<label class="lbl_resp2"></label><label class="style-contact2" style="margin-left: 40%; position: absolute; margin-top: 3.5%;">bancosdesangre.tamps@gmail.com</label>


			<label class="lbl_contact" style="margin-left: 72%; position: absolute; margin-top: 1%;">CONTÁCTANOS</label>

			<button onclick="location.href='php/Contacto.php'"; id="btn_more_about" class="btn_contact" style="margin-left: 72%; position: absolute; margin-top: 3.6%;">Ver más...</button>


		</div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		
		<div class="third-content">
			<div class="contenido3">
				<img src="img/imagen-corazon.jpg" id="logo_corazon" width="560" height="320">
				<label class="lbl_donacion">¡CON TU DONACIÓN PUEDES SALVAR VIDAS!</label>

				<button onclick="location.href='php/Donador.php'"; id="btn_more_about" class="btn_donar">Quiero ser donador...</button>
		
			</div>
		</div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
		
		<div class="fourth-content">
			<label> </label><br>
			<div class="contenido4">
				<iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7303.638139916338!2d-99.17005667033663!3d23.753830570662426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6bb1f521c2631975!2sCentro%20Estatal%20de%20Transfusi%C3%B3n%20Sangu%C3%ADnea!5e0!3m2!1ses-419!2smx!4v1595869400226!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			
				<img id="bar-style2" src="img/barra.png">
			
				<label class="lbl_ubicacion">UBICACIÓN</label>


				<div class="info_ubicacion">
					<label><b>Direccion:</b> </label><br>
					<label>Fraccionamiento Lomas de Calamaco</label><br>
					<label>C.P. 87018, Ciudad Victoria, Tamaulipas.</label><br><br>
					<label><b>correos electrónicos:</b> </label><br>
					<label>bancosdesangre.tamps@gmail.com y cets.tam@gmail.com</label><br><br>
					<label><b>teléfono:</b> </label><br>
					<label>(834) 313 4460</label>
				</div>

				<button onclick="location.href='php/Contacto.php'"; id="btn_more_about" class="btn_contact2">ver más...</button>
			</div>
		</div>

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->



		<div class="content-style" id="content"> 
			<!-- se carga el contenido de las paginas con jquery para no recargar el sitio -->
		</div>



		<br><br>

		<?php include('php/footer.php');?>

	</body>
</html>
