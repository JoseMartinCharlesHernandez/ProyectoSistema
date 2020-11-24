<?php
 include('../../conexion.php');
 //recibo por post el tipo de sangre que se quiere buscar
 $inicio=$_POST['fechaInicio'];
 $fin=$_POST['fechaFin'];

//si lo que se recibe no es un tipo de sangre redirecciona otra vez al historial de donaciones
  if ($inicio=="0000-00-00" || $fin=="0000-00-00") { ?>

    <script>alert("Ingresa un tipo de sangre válido");window.location.href ="../historial-donaciones.php"</script>

 <?php
 //si lo que se recibe es igual a "TODOS" genera un reporte con todos los tipos de donaciones con todos los tipos de sangre
  }elseif($inicio!="0000-00-00" || $fin!="0000-00-00"){
  
       $query_validar=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donaciones.fecha_donacion BETWEEN :fInicio AND :fFin  ORDER BY donaciones.id");
          $query_validar->bindParam(":fInicio",$inicio);
          $query_validar->bindParam(":fFin",$fin);
          $query_validar->execute();
          $validar=$query_validar->fetchAll(PDO::FETCH_ASSOC);

          if($validar){
              include 'reportesFecha/pdfReporteFecha.php';
          }elseif (!$validar) { ?>
      <script>alert("No existen donaciones en este rango de fechas");window.location.href ="../historial-donaciones.php"</script>
    <?php }
  }
?>