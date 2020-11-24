<?php 
include('conexion.php');

session_start();
if($_SESSION['active_admin']==true){
include('consultas.php');
    $query=$pdo->prepare("SELECT COUNT(*) FROM donadores WHERE aceptado=0");
    $query->execute();
    $cantidad_pentdientes=$query->fetchColumn();
	$num= $cantidad_pentdientes;
	if($cantidad_pentdientes==0){
		$num="";
	} 		

$query_donaciones=$pdo->prepare("SELECT * FROM donaciones");
$query_donaciones->execute();
$resul=$query_donaciones->fetchAll(PDO::FETCH_ASSOC);

    $query_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
    $query_sangre->execute();
    $resul_sangre=$query_sangre->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!--////////////////////////////////////////css y js de chart////////////////////////////////////////////// -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->


	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/main-content.css">

  <link rel="stylesheet" type="text/css" href="../css/graficas.css">
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
		<!--<div class="hoverA"><a href="main-admin.php">Inicio</a></div>-->
		<div class="hoverA"><a href="donadores/donadores.php">Donadores</a></div>
		<div class="hoverA"><a href="personal/personal.php">Personal del banco de sangre</a></div>
		<div class="hoverA"><a href="donaciones/historial-donaciones.php">Historial de donaciones</a></div>
		<div class="hoverA"><a href="pendientes/pendientes.php">Pendientes <b style="color: red;"><?php echo $num?></b></a></div>
		<div class="hoverA"><a href="mensajeria/mensajeria.php">Mensajería</a></div>
		<div class="hoverA"><a href="cerrarSesion.php">Cerrar sesión</a></div>
	</div>
</div>



<div class="main-container">

	<div class="grafic_container1">
		<label>TIPO DE SANGRE MÁS DONADO</label>
<canvas id="myChart" width="400" height="255"></canvas>
<script>
	var ctx = document.getElementById('myChart');
	var myChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	        labels: [
	        	<?php foreach ($resul_sangre as $r) {?>
	        	
	        	'<?php echo $r['tipo_de_sangre'] ?>',

	        	<?php } ?>
	        ],
	        datasets: [{
	            label: '# of Votes',
	            data: [<?php echo $numA ?>, <?php echo $numB ?>, <?php echo $numO ?>, <?php echo $numAB ?>, <?php echo $numAN ?>, <?php echo $numBN ?>,<?php echo $numON ?>,<?php echo $numABN ?>],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255, 99, 132, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero: true
	                }
	            }]
	        }
	    }
	});
</script>


	</div>

	<div class="grafic_container2">
		<label>DONACIONES POR MES</label>
	</div>

</div>



<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





</body>
</html>

<?php 
}else{
	header('location:../index.php');
} 



?>