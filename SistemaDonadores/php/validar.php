<?php  
include 'conexion.php';

session_start();

$email=$_POST['correo'];
$pass=$_POST['pass'];

$query=$pdo->prepare("SELECT * FROM donadores where correo=:correo AND contra=:contra AND aceptado=1");
        $query->bindParam(':correo',$email);
        $query->bindParam(':contra',$pass);
        $query->execute();

$results=$query->fetchAll(PDO::FETCH_ASSOC);

if($results){
	foreach ($results as $res) {
		$_SESSION['id']=$res['id'];
		$_SESSION['Name']=$res['nombre'];
		$_SESSION['a_paterno']=$res['a_paterno'];
		$_SESSION['a_materno']=$res['a_materno'];
		$_SESSION['id_sangre']=$res['id_sangre'];
		$_SESSION['id_estado_civil']=$res['id_estado_civil'];
		$_SESSION['telefono']=$res['telefono'];
		$_SESSION['correo']=$res['correo'];
		$_SESSION['cuenta_facebook']=$res['cuenta_facebook'];
		$_SESSION['link_facebook']=$res['link_facebook'];
		$_SESSION['id_ocupacion']=$res['id_ocupacion'];
		$_SESSION['id_grado_estudios']=$res['id_grado_estudios'];
		$_SESSION['img_perfil']=$res['img_perfil'];
		$_SESSION['active_donador']=true;
		header('location:main-donadores.php');
	}
}else{?>

	<script type="text/javascript">alert("No existe un usuario con este correo o aún no ha sido aceptado");window.location.href ="../index.php"</script>

<?php
}

?>