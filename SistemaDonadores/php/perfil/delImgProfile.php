<?php  
include('../conexion.php');

$id=$_POST['id_donador'];
$newValImg=NULL;

$queryUpdateImg=$pdo->prepare('UPDATE donadores SET img_perfil=:img WHERE id=:id');
$queryUpdateImg->bindParam(':id',$id);
$queryUpdateImg->bindParam(':img',$newValImg);

if($queryUpdateImg->execute()){
	echo "Éxito";
}

session_start();

$_SESSION['img_perfil']=$newValImg;?>

<script type="text/javascript">alert("Fotografía de perfil eliminada.");window.location.href ="Perfil.php"</script>
