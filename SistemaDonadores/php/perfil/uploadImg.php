<?php  
include('../conexion.php');
session_start();

$cargarImg=($_FILES['imgperfil']['tmp_name']);
$img=fopen($cargarImg, 'rb');

$id_POST=$_POST['id_donador'];


echo $id_POST;



$subir_img=$pdo->prepare("UPDATE donadores SET img_perfil=:img WHERE id=:id_donador");
$subir_img->bindParam(':img',$img, PDO::PARAM_LOB);
$subir_img->bindParam(':id_donador',$id_POST);
$subir_img->execute();



//------------------------------------------------------------------------------------------------------------------------------------
$donador=$pdo->prepare("SELECT img_perfil FROM donadores WHERE id=:id_donador");
$donador->bindParam(':id_donador',$id_POST);
$donador->execute();
$res=$donador->fetchAll(PDO::FETCH_ASSOC);

foreach ($res as $r){
	$_SESSION['img_perfil']=$r['img_perfil'];
}


header('location:Perfil.php');



?>