<?php  
ob_start();
 include('../../conexion.php');

       $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donaciones.fecha_donacion BETWEEN :fInicio AND :fFin  ORDER BY donaciones.id");
          $query_tabla_donaciones->bindParam(":fInicio",$inicio);
          $query_tabla_donaciones->bindParam(":fFin",$fin);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);

  $contadorPlasma=0;
  $contadorPlaquetas=0;
  $contadorSangre=0;

  foreach ($lista_donaciones as $donaciones) {
    if ($donaciones['tipo_donacion']=="Plasma") {
      $contadorPlasma+=1;
    }elseif ($donaciones['tipo_donacion']=="Plaquetas") {
      $contadorPlaquetas+=1;
    }elseif ($donaciones['tipo_donacion']=="Sangre") {
      $contadorSangre+=1;
    }
  }
  ?>

<h2>TOTALES</h2>
<table style=" font-size: 20px; width: 100%;margin-left: auto;margin-right:auto;">

  <tr style="background-color: #005cb9; color: white;">
    <th scope="col">Tipo de donación:</th>
     <th scope="col">Total:</th>
  </tr>
  <tr style=" text-align: center; height:40px;  width:100%; ">
    <td>Plasma</td>
    <td><?php echo $contadorPlasma; ?></td>
  </tr>

  <tr style=" text-align: center; height:40px;  width:100%; ">
    <td>Plaquetas</td>
  <td><?php echo $contadorPlaquetas; ?></td>
  </tr>

  <tr style=" text-align: center; height:40px;  width:100%; ">
    <td>Sangre</td>
  <td><?php echo $contadorSangre; ?></td>
  </tr>
</table>


<br><br>

<h2>HISTORIAL</h2>
<table style="width: 100%;margin-left: auto;margin-right:auto;">

  <tr style="background-color: #005cb9; color: white;">
    <th scope="col">Tipo de donación:</th>
     <th scope="col">Tipo de sangre:</th>
     <th scope="col">Donador:</th>
     <th scope="col">Fecha:</th>
     <th scope="col">Hora:</th>
  </tr>
<?php foreach ($lista_donaciones as $donaciones) {

$format_hora = new DateTime($donaciones['hora_donacion']);
$hora24h = $format_hora->format('H');

$format_fecha = new DateTime($donaciones['fecha_donacion']);
$fecha = $format_fecha->format('d/m/Y');
?>
  <tr style=" text-align: center; height:40px;	width:100%; ">
      <td><?php echo $donaciones['tipo_donacion'];?></td>
      <td><?php echo $donaciones['tipo_de_sangre'];?></td>
      <td><?php echo $donaciones['nombre']." ".$donaciones['a_paterno']." ".$donaciones['a_materno'];?></td>
      <td><?php echo $fecha;?></td>
      <td><?php
          if($hora24h>=12){
            $hora = $format_hora->format('h:i');
            echo $hora." PM";
          }else{
            $hora = $format_hora->format('h:i');
            echo $hora." AM";
          }?>
            
      </td>
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