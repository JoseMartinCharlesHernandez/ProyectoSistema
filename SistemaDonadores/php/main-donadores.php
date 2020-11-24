<?php 
include('conexion.php');

session_start();
if($_SESSION['active_donador']==true){

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
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <link rel="stylesheet" type="text/css" href="../css/main-content.css">
  <link rel="stylesheet" type="text/css" href="../css/queriesMain.css">
   <link rel="stylesheet" type="text/css" href="../css/queriesNav.css">
</head>
<body>
 
 <?php include 'nav.php'; ?>

<!--/////////////////////////////////contenedor principal/////////////////////////////////////-->
<div class="main-container">


<h2 class="h1Titulo"><b>Historial de donaciones</b></h2>

<?php include 'tabla-historial.php'; ?>

</div>



<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->


</body>
</html>

<?php 
}else if($_SESSION['active_donador']==false){
  header('location:../index.php');
} 
?>