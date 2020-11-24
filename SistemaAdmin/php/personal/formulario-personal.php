<?php  
include('../conexion.php');
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../css/registro-personal.css">
</head>
<body>

<h1 class="h1Titulo"><b>REGISTRO DE PERSONAL</b></h1>
<div class="register-page">
  <div class="form">
    
    <form method="POST" action="addPersonal.php" class="login-form">
      <input type="text" placeholder="CURP" name="curp" required />
      <input type="text" placeholder="Nombre" name="nombre" required />
      <input type="text" placeholder="Apellido paterno" name="A_paterno" required/>
      <input type="text" placeholder="Apellido materno" name="A_materno" required/>

      <label>Fecha de nacimiento</label>
      <input required type="date"  name="Fecha_nacimiento">
      <label> </label>
      <br>

      <select required name="sexo" >
        <option value="">Sexo...</option>
  <?php    foreach ($resul_gen as $g) {?>
        <option><?php echo $g['genero']; ?></option>
  <?php  }?>
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
      <select required name="estado_civil" >
        <option value="">Estado civil...</option>
  <?php    foreach ($resul_Ecivil as $Ecivil) {?>
        <option><?php echo $Ecivil['estado_civil']; ?></option>
  <?php  }?>
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

       <select required name="tipo_sangre" >
        <option value="">Tipo de sangre...</option>
<?php    foreach ($resul_Tsangre as $sangres) {?>
        <option><?php echo $sangres['tipo_de_sangre']; ?></option>
<?php  }?>        
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

        <label>Dirección</label>
        <input type="text" placeholder="Calle" name="calle" required/>
        <input type="text" placeholder="Número" name="num_dir" required/>
        <input type="text" placeholder="Colonia o Fraccionamiento" name="col_fac" required/>
        <input type="text" placeholder="Codigo Postal" name="cp" required/>
        <label> </label>
        <br>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
        <select required name="ciudad" >
          <option value="">Ciudad...</option>
<?php    foreach ($resul_cd as $cd) {?>
          <option><?php echo $cd['nombre']; ?></option>
<?php  }?> 
        </select>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

      <input type="text" placeholder="Teléfono" name="telefono" required/>
      <input type="Email" placeholder="Correo electrónico" name="correo" required/>
      <input type="password" placeholder="Contraseña" name="pass"required/>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->      
        <select required name="ocupacion">
          <option value="">Ocupación...</option>
<?php    foreach ($resul_ocup as $o) {?>
          <option><?php echo $o['nombre_ocupacion']; ?></option>
<?php  }?> 
        </select>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

        <select required name="grado_estudios">
          <option value="">Grado máximo de estudios...</option>
<?php    foreach ($resul_estudios as $estudios) {?>
          <option><?php echo $estudios['nombre_grado']; ?></option>
<?php  }?> 
        </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
  
  <input type="text" placeholder="RFC" name="rfc" required/>   

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

             
      <input class="btn btn-primary btn-lg active" role="button" aria-pressed="true" type="submit" name="btn_register" value="REGISTRAR" id="btn_submit">
      
    </form>
     <!--<p class="message">Ya estas registrado? <a href="../index.php">Inicia sesíon aqui</a></p>-->
  </div>
</div>



</body>
</html>


