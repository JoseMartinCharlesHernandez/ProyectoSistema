<?php
 include('../../conexion.php');
 //recibo por post el tipo de sangre que se quiere buscar
 $sangre_POST=$_POST['sangre'];
 $donacion_POST=$_POST['donacion'];
 $inicio=$_POST['fechaInicio'];
 $fin=$_POST['fechaFin'];

//si lo que se recibe no es un tipo de sangre redirecciona otra vez al historial de donaciones
  if ($donacion_POST=="Tipo de donación...") { 
    if ($sangre_POST=="Tipo de sangre...") {
      if ($inicio=="") {
        if ($fin=="") { ?>
          <script>alert("Debe seleccionar un tipo de donación");window.location.href ="../historial-donaciones.php"</script>
 <?php
 //si lo que se recibe es igual a "TODOS" genera un reporte con todos los tipos de donaciones con todos los tipos de sangre
      }
    }
  }
}

//condicional de si tipo de donaciones trae Todos
  if($donacion_POST=="Todos"){
    if ($sangre_POST=="Tipo de sangre...") {
      if ($inicio=="") {
        if ($fin=="") {
          include 'reportesTD/pdfReporteTD.php';
        }
      }
    }
  }
//condicional de si tipo de donaciones trae datos
  else if($donacion_POST!="Tipo de donación..."){
    if ($sangre_POST=="Tipo de sangre...") {
      if ($inicio=="") {
        if ($fin=="") {
          include 'reportesTD/pdfReporteTD.php';
        }
      }
    }
  }





  if($donacion_POST=="Todos"){
    if ($sangre_POST!="Tipo de sangre...") {
      if ($inicio=="") {
        if ($fin=="") {
          include 'reportesTD/pdfReporteTDS.php';
        }
      }
    }
  }  
  //condicional de si tipo de donacion y tipos de sangre es Todos
  else if($donacion_POST=="Todos"){
    if ($sangre_POST=="Todos") {
      if ($inicio=="") {
        if ($fin=="") {
          include 'reportesTD/pdfReporteTDS.php';
        }
      }
    }
  }
    //condicional de si tipo de donacion y tipos de sangre si traen datos
  else if($donacion_POST!="Tipo de donación..."){
      if ($sangre_POST!="Tipo de sangre...") {
        if($inicio==""){
          if($fin==""){
            include 'reportesTD/pdfReporteTDS.php';
          }
        }
      }
  }
    else if($donacion_POST=="Tipo de donación..."){
    if ($sangre_POST!="Tipo de sangre...") {
      if ($inicio=="") {
        if ($fin=="") {
          include 'reportesTD/pdfReporteTDS.php';
        }
      }
    }
  }





//--------------------------------------- includes TDSF --------------------------------------------------------------


  if($donacion_POST=="Todos"){
    if ($sangre_POST!="Tipo de sangre...") {
        if($inicio!=""){
          if($fin!=""){
          include 'reportesTD/pdfReporteTDSF.php';
        }
      }
    }
  }else if($donacion_POST=="Todos"){
    if ($sangre_POST=="Todos") {
        if($inicio!=""){
          if($fin!=""){
          include 'reportesTD/pdfReporteTDSF.php';
        }
      }
    }
  }
//condicional de si tipo de donacion, tipos de sangre y las fechas traen datos
  else if($donacion_POST!="Tipo de donación..."){
      if ($sangre_POST!="Tipo de sangre...") {
        if($inicio!=""){
          if($fin!=""){
            include 'reportesTD/pdfReporteTDSF.php';
          }
        }
      }
  }
  else if($donacion_POST=="Tipo de donación..."){
      if ($sangre_POST=="Tipo de sangre...") {
        if($inicio!=""){
          if($fin!=""){
            include 'reportesTD/pdfReporteTDSF.php';
          }
        }
      }
  }


?>