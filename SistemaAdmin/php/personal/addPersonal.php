<?php  

include('../conexion.php');

$curp=strtoupper($_POST['curp']);
$nombre=$_POST['nombre'];
$a_paterno=$_POST['A_paterno'];
$a_materno=$_POST['A_materno'];
$fecha_nac=$_POST['Fecha_nacimiento'];
$sexo=$_POST['sexo'];
$estado_civil=$_POST['estado_civil'];
$tipo_sangre=$_POST['tipo_sangre'];
$calle=$_POST['calle'];
$num_dir=$_POST['num_dir'];
$col_fac=$_POST['col_fac'];
$cp=$_POST['cp'];
$ciudad=$_POST['ciudad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$pass=$_POST['pass'];
$ocupacion=$_POST['ocupacion'];
$grado_estudios=$_POST['grado_estudios'];
$rfc=$_POST['rfc'];

  $query_verificar_user=$pdo->prepare("SELECT * FROM personal WHERE rfc=:rfc");
  $query_verificar_user->bindParam(':rfc',$rfc);
  $query_verificar_user->execute();
  $resul=$query_verificar_user->fetchAll(PDO::FETCH_ASSOC);

  if ($resul) {
  	echo "EL PERSONAL YA ESTA REGISTRADO EN EL BANCO DE SANGRE";
  }else{
   $insertar=$pdo->prepare("INSERT INTO personal(curp, nombre, a_paterno, a_materno, fecha_nacimiento, id_genero, id_estado_civil, id_sangre, calle, numero, col_frac, cp, id_ciudad, telefono, correo, contra, id_ocupacion, id_grado_estudios, rfc) VALUES (:curp,:nombre,:a_paterno,:a_materno,:fecha_nac,
    (SELECT id FROM genero WHERE genero=:sexo),
    (SELECT id FROM estado_civil WHERE estado_civil=:estado_civil),
    (SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tipo_sangre),
    :calle,:num_dir,:col_fac,:cp,
    (SELECT id FROM ciudad WHERE nombre=:ciudad),:telefono,:correo,:pass,
    (SELECT id FROM ocupaciones WHERE nombre_ocupacion=:ocupacion),
    (SELECT id FROM grado_estudios WHERE nombre_grado=:grado_estudios),:rfc)");
          $insertar->bindParam(':curp',$curp);
          $insertar->bindParam(':nombre',$nombre);
          $insertar->bindParam(':a_paterno',$a_paterno);
          $insertar->bindParam(':a_materno',$a_materno);
          $insertar->bindParam(':fecha_nac',$fecha_nac);
          $insertar->bindParam(':sexo',$sexo);
          $insertar->bindParam(':estado_civil',$estado_civil);
          $insertar->bindParam(':tipo_sangre',$tipo_sangre);
          $insertar->bindParam(':calle',$calle);
          $insertar->bindParam(':num_dir',$num_dir);
          $insertar->bindParam(':col_fac',$col_fac);
          $insertar->bindParam(':cp',$cp);
          $insertar->bindParam(':ciudad',$ciudad);
          $insertar->bindParam(':telefono',$telefono);
          $insertar->bindParam(':correo',$correo);
          $insertar->bindParam(':pass',$pass);
          $insertar->bindParam(':ocupacion',$ocupacion);
          $insertar->bindParam(':grado_estudios',$grado_estudios);
          $insertar->bindParam(':rfc',$rfc);
          if($insertar->execute()){
          header('location:personal.php');

          }else{
            echo "error en la consulta";
          }
          
  }

?>