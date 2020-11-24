<?php 
include('../../conexion.php');
/*
UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value */
$id=$_POST['id_peticion'];
$tipo_donacion=$_POST['select_peticion'];
$sangre=$_POST['select_sangre'];
$cant_trans=$_POST['cant_trans'];
$inicio=$_POST['fecha_inicio'];
$fin=$_POST['fecha_fin'];

/*echo $sangre;
echo $inicio;
echo $fin;
*/

  		$actualizar=$pdo->prepare("UPDATE peticiones SET id_tipo_donacion=(SELECT id FROM tipo_donacion WHERE tipo_donacion=:td),id_sangre=(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tp),cantidad_transfusiones=:cant_trans, fecha_inicio=:fecha_inicio,
  			fecha_fin=:fecha_fin WHERE id=:id_peticion");
        $actualizar->bindParam(':id_peticion',$id);
        $actualizar->bindParam(':td',$tipo_donacion);
        $actualizar->bindParam(':tp',$sangre);
        $actualizar->bindParam(':cant_trans',$cant_trans);
        $actualizar->bindParam(':fecha_inicio',$inicio);
        $actualizar->bindParam(':fecha_fin',$fin);
        $actualizar->execute();

header('location:../peticiones.php');

 ?>