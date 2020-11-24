<?php  
include('../conexion.php');

session_start();
if($_SESSION['active_donador']==true){
$id=$_POST['id_user'];
//query para traer el catalogo del estado civil
  $query=$pdo->prepare("SELECT donadores.nombre,donadores.a_paterno,donadores.a_materno, tipos_sangre.tipo_de_sangre, estado_civil.estado_civil,ocupaciones.nombre_ocupacion,grado_estudios.nombre_grado, donadores.telefono, donadores.correo, donadores.contra, donadores.cuenta_facebook,donadores.link_facebook FROM donadores INNER JOIN tipos_sangre ON tipos_sangre.id=donadores.id_sangre INNER JOIN estado_civil ON estado_civil.id = donadores.id_estado_civil INNER JOIN ocupaciones ON ocupaciones.id = donadores.id_ocupacion INNER JOIN grado_estudios ON grado_estudios.id = donadores.id_grado_estudios WHERE donadores.id=:id_user");
  $query->bindParam(':id_user',$id);
  $query->execute();
  $res=$query->fetchAll(PDO::FETCH_ASSOC);
//query para traer el catalogo de tipos de sangre
  $query_tipos_sangre=$pdo->prepare("SELECT * FROM tipos_sangre");
  $query_tipos_sangre->execute();
  $resul_Tsangre=$query_tipos_sangre->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------

//query para traer el catalogo de grado de estudios
  $query_estudios=$pdo->prepare("SELECT * FROM grado_estudios");
  $query_estudios->execute();
  $resul_estudios=$query_estudios->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------

//query para traer el catalogo del estado civil
  $query_estado_civil=$pdo->prepare("SELECT * FROM estado_civil");
  $query_estado_civil->execute();
  $resul_Ecivil=$query_estado_civil->fetchAll(PDO::FETCH_ASSOC);
//--------------------------------------------------------------------------------
//query para traer el catalogo de ocupaciones
  $query_ocupaciones=$pdo->prepare("SELECT * FROM ocupaciones");
  $query_ocupaciones->execute();
  $resul_ocup=$query_ocupaciones->fetchAll(PDO::FETCH_ASSOC);
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
  <link rel="stylesheet" type="text/css" href="../../css/editPersonal.css">
  <script type="text/javascript" src="../js/ocultar.js"></script>
</head>
<body>

<a href="index.php"><img id="logo" src="../../../img/logo.png" width="190px" height="190px"></a>
<a href="index.php"><img id="logo-tam" src="../../../img/logo-tam.png" width="190px" height="190px"></a>

<h1 class="h1Titulo"><b>CENTRO ESTATAL DE TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS</b></h1>


<h2 class="h2Titulo"><b> Editar información  del perfil</b></h2>
<div class="register-page">
  <div class="form">
    
<form method="POST" action="updatePerfil.php" class="login-form">
  <?php foreach ($res as $r): ?>
  	<input type="hidden" name="id_user" value="<?php echo $id ?>">
	  <input type="text" placeholder="Nombre" name="nombre" required value="<?php echo $r['nombre'] ?>"/>
	  <input type="text" placeholder="Apellido paterno" name="A_paterno" required value="<?php echo $r['a_paterno'] ?>"/>
	  <input type="text" placeholder="Apellido materno" name="A_materno" required value="<?php echo $r['a_materno'] ?>"/>


<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->
      <select required name="estado_civil" >
        <option><?php echo $r['estado_civil']; ?></option>
 <?php    foreach ($resul_Ecivil as $Ecivil) {?>
          <option><?php echo $Ecivil['estado_civil']; ?></option>
  		<?php  }?>
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->


       <select required name="tipo_sangre">
        <option><?php echo $r['tipo_de_sangre']; ?></option>
		<?php    foreach ($resul_Tsangre as $sangres) {?>
         <option><?php echo $sangres['tipo_de_sangre']; ?></option>
		<?php  }?>        
      </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->


      <input type="text" placeholder="Teléfono" name="telefono" value="<?php echo $r['telefono']; ?>" required/>
      <input type="Email" placeholder="Correo electrónico" name="correo" value="<?php echo $r['correo']; ?>" required/>
      <input type="password" placeholder="Contraseña" name="pass" value="<?php echo $r['contra']; ?>" required/>
      <input type="text" placeholder="Cuenta de facebook" name="cuenta_FB" value="<?php echo $r['cuenta_facebook']; ?>" required/>
      <input type="text" placeholder="Link de facebook" name="link_FB" value="<?php echo $r['link_facebook']; ?>" required/>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

        <select required name="ocupacion"  >
          <option><?php echo $r['nombre_ocupacion']; ?></option>
<?php    foreach ($resul_ocup as $o) {?>
          <option><?php echo $o['nombre_ocupacion']; ?></option>
<?php  }?> 
        </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

        <select required name="grado_estudios"  >
          <option><?php echo $r['nombre_grado']; ?></option>
<?php    foreach ($resul_estudios as $estudios) {?>
          <option><?php echo $estudios['nombre_grado']; ?></option>
<?php  }?> 
        </select>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->

<?php endforeach ?>


   <input class="btn btn-primary btn-lg active" role="button" aria-pressed="true" type="submit" name="btn_register" value="ACTUALIZAR" id="btn_submit">
  
   <input style="background-color: #9e9e9e;" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" type="button" value="CANCELAR" id="btn_cancel" data-toggle="modal" data-target="#modalCancelar">
   
   </form>
  </div>
</div>



</body>
</html>





<!-- MODAL DE CANCELAR -->
<div class="modal fade" id="modalCancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡ALERTA!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de cancelar la edición de tus datos?
      </div>
      <div class="modal-footer">
          <button onclick="location.href='Perfil.php'"; type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>







<?php 
}else if($_SESSION['active_donador']==false){
  header('location:../../index.php');
} 
?>