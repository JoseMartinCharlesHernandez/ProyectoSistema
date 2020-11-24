<?php
session_start(); 
if (isset($_SESSION['Name'])) {
 header('location:php/main-admin.php');
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<a href="index.php"><img id="logo" src="../img/logo.png" width="250px" height="250px"></a>
<a href="index.php"><img id="logo-tam" src="../img/logo-tam.png" width="200px" height="200px"></a>

<h1 class="h1Titulo"><b>CENTRO ESTATAL DE TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS</b></h1>
<div class="login-page">
  <div class="form">
    
    <form method="POST" action="php/validar.php" class="login-form">
      <input type="text" placeholder="Correo electrónico" name="correo" required/>
      <input type="password" placeholder="Contraseña" name="pass" required/>
      <input id="btn_login" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" type="submit" value="INICIAR SESIÓN">
      
    </form>
  </div>
</div>



</body>
</html>

<?php
}
?>