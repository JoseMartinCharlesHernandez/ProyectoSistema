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
				<h3>PRESENTACIÓN</h3>	
			</div>
			<p>El Centro Estatal de la Transfusión Sanguínea de Tamaulipas (CETS) fue creado en
			consecuencia de la transferencia de funciones que la Secretaria de Salud a nivel federal
			realizó a los estados, entre ellas la de regular la disposición de sangre humana y sus
			componentes con fines terapéuticos. Inicia sus funciones en Tampico, Tamaulipas, dentro
			del Hospital General “Carlos Canseco” en 1990, dando atención al área conurbada de
			Tampico, Madero y Altamira.</p>

			<p>A partir de 2008 se decreta la construcción de las instalaciones de CETS en una
			coparticipación de la federación y el ejecutivo estatal con el financiamiento del Banco
			Mundial en el marco de la ejecución del Programa de Calidad, Equidad y Desarrollo en
			Salud (PROCEDES). En 2009 se emite el decreto en el que es donado el terreno al
			gobierno de Tamaulipas, a través de la Secretaria de Salud para la construcción de CETS.
			En diciembre del 2010, se inauguran las instalaciones en Ciudad Victoria, para atender a
			la población del estado, con el incremento en la capacidad de atención a la población
			tamaulipeca. El CETS se encuentra ubicado en: Calle Lomas de Calamaco esquina con
			Loma Alegre s/n Frac. Lomas de Calamaco C.P. 87018.</p>

			<p>El CETS cuenta con amplias y funcionales instalaciones en las cuales se atiende a la
			población tamaulipeca, estas están integradas por: Área de extracción de unidades de
			sangre y componentes sanguíneos, Área de recepción de unidades foráneas, Área de
			procesamiento de la unidad y de las muestras (Laboratorio de Hematología, Inmunología y
			Serología infecciosa, Área de conservación de la sangre (refrigeración y congelación),
			Área de distribución de unidades.
			</p>

			<p>El CETS se ha convertido en un referente de los servicios de la medicina transfusional,
			proveyendo soporte a los unidades hospitalarias de segundo nivel y a la población en
			general; siendo principal promotor de la donación voluntaria altruista en el Tamaulipas.
			La naturaleza voluntaria de la donación de la sangre surge de la fuente limitada de
			obtención: las personas sanas. Con ello, se busca reducir el riesgo de trasmisión de
			infecciones por transfusión permitiendo garantizar la disponibilidad y oportunidad en la
			entrega del servicio y es la que constituye su pilar básico.</p>


			<p>El Centro Estatal de la Transfusión Sanguínea, le invita a conocer sus servicios de
			recolección y donación de sangre humana para fines terapéuticos, a través de un
			programa de donación altruista, el Centro Estatal de la Transfusión Sanguínea cumple una
			labor social y humanitaria en la Secretaría de Salud en Tamaulipas para beneficio de la
			ciudadanía.
			</p>
			<br><br>
</div>
			
			<br><br>

			<?php include('Footer.php'); ?>

	</body>
</html>
