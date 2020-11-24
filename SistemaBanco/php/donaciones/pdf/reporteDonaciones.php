<?php  
ob_start();
 include('../../conexion.php');
   $query_tabla_donaciones=$pdo->prepare("SELECT * FROM donaciones");
   $query_tabla_donaciones->execute();
   $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);

?>



<table style="width: 100%;margin-left: auto;margin-right:auto;">

  <tr style="background-color: #005cb9; color: white;">
     <th scope="col">Tipo de sangre:</th>
     <th scope="col">Donador:</th>
     <th scope="col">Fecha:</th>
     <th scope="col">Hora:</th>
  </tr>
<?php foreach ($lista_donaciones as $donaciones) {?>
  <tr style=" text-align: center; height:40px;	width:100%; ">
      <td><?php echo $donaciones['tipo_sangre'];?></td>
      <td><?php echo $donaciones['nombre_donador'];?></td>
      <td><?php echo $donaciones['fecha_donacion'];?></td>
      <td><?php echo $donaciones['hora_donacion'];?></td>
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
$dompdf->stream('Reporte-Donaciones.pdf');
?>