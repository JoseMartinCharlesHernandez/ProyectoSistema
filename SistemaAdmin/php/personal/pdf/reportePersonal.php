<?php  
ob_start();
 include('../../conexion.php');
   $query_personal=$pdo->prepare("SELECT * FROM personal");
   $query_personal->execute();
   $lista_personal=$query_personal->fetchAll(PDO::FETCH_ASSOC);

?>


<h2 STYLE="TEXT-ALIGN:CENTER"> PERSONAL REGISTRADO</h2> 
<table style="width: 100%;margin-left: auto;margin-right:auto;">

  <tr style="background-color: #005cb9; color: white; height:px;	width:100%;">
    <th scope="col">Curp:</th>
     <th scope="col">Nombre:</th>
     <th scope="col">Apellidos:</th>
     <th scope="col">Correo:</th>
     <th scope="col">Teléfono:</th>
  </tr>
<?php foreach ($lista_personal as $personal) {?>
  <tr style=" height:40px;	width:100%; ">
      <td><?php echo $personal['curp'];?></td>
      <td><?php echo $personal['nombre'];?></td>
      <td><?php echo $personal['a_paterno']." ".$personal['a_materno'];?></td>
      <td><?php echo $personal['correo'];?></td>
      <td><?php echo $personal['telefono'];?></td>
  </tr>
<?php  } ?>
</table>





<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(ob_get_clean());
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream('Reporte-Personal.pdf');
?>