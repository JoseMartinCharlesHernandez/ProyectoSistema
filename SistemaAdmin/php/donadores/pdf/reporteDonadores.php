<?php  
ob_start();
 include('../../conexion.php');
   $query_donadores=$pdo->prepare("SELECT * FROM donadores WHERE aceptado=1");
   $query_donadores->execute();
   $lista_donadores=$query_donadores->fetchAll(PDO::FETCH_ASSOC);

?>


<h2 STYLE="TEXT-ALIGN:CENTER"> DONADORES REGISTRADOS</h2> 
<table style="width: 100%;margin-left: auto;margin-right:auto;">

  <tr style="background-color: #005cb9; color: white;height:px;	width:100%;">
    <th scope="col">Curp:</th>
     <th scope="col">Nombre:</th>
     <th scope="col">Apellidos:</th>
     <th scope="col">Correo:</th>
     <th scope="col">Teléfono:</th>
  </tr>
<?php foreach ($lista_donadores as $donadores) {?>
  <tr style=" height:80px;	width:100%; ">
      <td><?php echo $donadores['curp'];?></td>
      <td><?php echo $donadores['nombre'];?></td>
      <td><?php echo $donadores['a_paterno']." ".$donadores['a_materno'];?></td>
      <td><?php echo $donadores['correo'];?></td>
      <td><?php echo $donadores['telefono'];?></td>
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
$dompdf->stream('Reporte-Donadores.pdf');
?>