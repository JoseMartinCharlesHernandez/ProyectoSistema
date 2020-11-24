<?php  
include('conexion.php');
//query para traer el catalogo del estado civil
  $query_estado_civil=$pdo->prepare("SELECT * FROM estado_civil");
  $query_estado_civil->execute();
  $resul_Ecivil=$query_estado_civil->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------
  //query para traer el catalogo de tipos de sangre
  $query_tipos_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
  $query_tipos_sangre->execute();
  $resul_Tsangre=$query_tipos_sangre->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------
  //query para traer el catalogo de ciudades
  $query_ciudades=$pdo->prepare("SELECT * FROM ciudad");
  $query_ciudades->execute();
  $resul_cd=$query_ciudades->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------

  //query para traer el catalogo de grado de estudios
  $query_estudios=$pdo->prepare("SELECT * FROM grado_estudios");
  $query_estudios->execute();
  $resul_estudios=$query_estudios->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------

//query para traer el catalogo de ocupaciones
  $query_ocupaciones=$pdo->prepare("SELECT * FROM ocupaciones");
  $query_ocupaciones->execute();
  $resul_ocup=$query_ocupaciones->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------

//query para traer el catalogo de ocupaciones
  $query_genero=$pdo->prepare("SELECT * FROM genero");
  $query_genero->execute();
  $resul_gen=$query_genero->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------





?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <title></title>
  
  <link rel="stylesheet" type="text/css" href="../css/registro.css">
  <link rel="stylesheet" type="text/css" href="../css/queriesRegistro.css">
  <script type="text/javascript" src="../js/ocultar.js"></script>
</head>
<body>

<a href="index.php"><img id="logo" src="../../img/logo.png" width="190px" height="190px"></a>
<a href="index.php"><img id="logo-tam" src="../../img/logo-tam.png" width="190px" height="190px"></a>

<h1 class="h1Titulo"><b>CENTRO ESTATAL DE TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS</b></h1>

<h2 class="h2Titulo"><b>REGISTRO DE DONADORES</b></h2>

<div class="register-page">
  <div class="form">
    
    <form method="POST" action="registro/validar_registro.php" class="login-form">
      <input type="text" placeholder="CURP" name="curp" required />
      <input type="text" placeholder="Nombre" name="nombre" required />
      <input type="text" placeholder="Apellido paterno" name="A_paterno" required/>
      <input type="text" placeholder="Apellido materno" name="A_materno" required/>

      <label>Fecha de nacimiento</label>
      <input type="date"  name="Fecha_nacimiento" required/>
      <label> </label>
      <br>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
      <select  name="sexo" required>
        <option value="">Sexo...</option>
  <?php    foreach ($resul_gen as $g) {?>
        <option><?php echo $g['genero']; ?></option>
  <?php  }?>
      </select>



<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
      <select  name="estado_civil" required>
        <option value="">Estado civil...</option>
  <?php    foreach ($resul_Ecivil as $Ecivil) {?>
        <option><?php echo $Ecivil['estado_civil']; ?></option>
  <?php  }?>
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->


       <select name="tipo_sangre" required>
        <option value="">Tipo de sangre...</option>
<?php    foreach ($resul_Tsangre as $sangres) {?>
        <option><?php echo $sangres['tipo_de_sangre']; ?></option>
<?php  }?>        
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

        <label>Dirección</label>
        <input type="text" placeholder="Calle" name="calle" required/>
        <input type="text" placeholder="Número" name="num_dir" required/>
        <input type="text" placeholder="Colonia o fraccionamiento" name="col_fac" required/>
        <input type="text" placeholder="Código postal" name="cp" required/>
        <label> </label>
        <br>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
        <select name="ciudad" required>
          <option value="">Ciudad...</option>
<?php    foreach ($resul_cd as $cd) {?>
          <option><?php echo $cd['nombre']; ?></option>
<?php  }?> 
        </select>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

      <input type="text" placeholder="Teléfono" name="telefono" required/>
      <input type="Email" placeholder="Correo electrónico" name="correo" required/>
      <input type="password" placeholder="Contraseña" name="pass"required/>
      <input type="text" placeholder="Cuenta de facebook" name="cuenta_FB" required/>
      <input type="text" placeholder="Link de tu facebook" name="link_FB" required/>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->      

        <select  name="ocupacion" required>
          <option value="">Ocupación...</option>
<?php    foreach ($resul_ocup as $o) {?>
          <option><?php echo $o['nombre_ocupacion']; ?></option>
<?php  }?> 
        </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

        <select  name="grado_estudios" required>
          <option value="">Grado máximo de estudios...</option>
<?php    foreach ($resul_estudios as $estudios) {?>
          <option><?php echo $estudios['nombre_grado']; ?></option>
<?php  }?> 
        </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
        <label>¿Ha donado anteriormente?</label>
        <br>
        <input id="btn_si" class="btn btn-light" style="width: 14%;height: 40px; text-align: center;" type="button" onclick="mostrar()" value="SI">
         <!--espacio en blanco-->&nbsp;&nbsp;
        <input id="btn_no" class="btn btn-light" style="width: 14%;height: 40px; text-align: center;" type="button" onclick="habilitar()" value="NO">
        
        <label id="lbl_ultima_donacion">Ingresa la fecha de tu última donación</label>
        <input id="ultima_donacion" type="date" name="ultima_donacion">
      
      <input disabled class="btn btn-primary btn-lg active" role="button" aria-pressed="true" type="submit" name="btn_register" value="REGISTRAR" id="btn_submit">
      
    </form>
     <p style="color: black;" class="message">¿Ya estás registrado? <a style="font-weight:700; font-size: 16px; color: #00c853;" href="../index.php">Inicia sesión aquí</a></p>
  </div>
</div>



</body>
</html>

