<?php  
include 'conexion.php';

session_start();

$email=$_POST['correo'];
$pass=$_POST['pass'];

$query=$pdo->prepare("SELECT * FROM useradmin where correo=:correo AND contra=:contra");
        $query->bindParam(':correo',$email);
        $query->bindParam(':contra',$pass);
        $query->execute();

$results=$query->fetchAll(PDO::FETCH_ASSOC);

if($results){
	foreach ($results as $res) {
		$_SESSION['Name']=$res['nombre'];
		$_SESSION['a_paterno']=$res['a_paterno'];
		$_SESSION['a_materno']=$res['a_materno'];
		$_SESSION['active_admin']=true;
		header('location:donadores/donadores.php');
	}
}else{
	echo "No hay registro";
}

?>