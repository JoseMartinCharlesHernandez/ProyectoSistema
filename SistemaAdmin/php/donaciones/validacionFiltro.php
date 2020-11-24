  <?php
  /*echo "NOMBRE: ".$filtro."- ";
   echo "filtro 2 donacion: ".$filtro2."- ";
   echo "filtro 3 sangre: ".$filtro3."- ";
   echo "inicio: ".$filtro4."- ";
   echo "fin: ".$filtro5."- ";*/
//consulta por default
  if($filtro=="" || $filtro==NULL){
    if($filtro2=="" || $filtro2=="Tipos de Donaciones..."){
      if($filtro3=="" || $filtro3=="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador ORDER BY donaciones.id");
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }


    //if si se busca por nombre
  if($filtro!="" || $filtro!=NULL){
    if($filtro2=="" || $filtro2=="Tipos de Donaciones..."){
     if($filtro3=="" || $filtro3=="Tipo de Sangre..."){
      if ($filtro4=="" || $filtro4=="0000-00-00") {
        if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }



//--------------------------------------------- validaciones con nombre y tipo de donacion ------------------------------------

  if($filtro!="" || $filtro!=NULL){
     if($filtro2=="Todos"){
      if($filtro3=="" || $filtro3=="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }

    if($filtro!="" || $filtro!=NULL){
     if($filtro2!="Todos" && $filtro2!="Tipos de Donaciones..."){
      if($filtro3=="" || $filtro3=="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipo_donacion.tipo_donacion LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->bindValue(2,"%{$filtro2}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }


    if($filtro=="" || $filtro==NULL){
     if($filtro2!="" && $filtro2!="Tipos de Donaciones..."){
      if($filtro3=="" || $filtro3=="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
         $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE tipo_donacion.tipo_donacion LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro2}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }



//------------------------------------ validaciones con nombre, tipo de donacion y sangre------------------------------
//-----------------------------------------"con nombre, todos los tipos de donacipon y toda la sangre"-------------------  
    if($filtro!="" || $filtro!=NULL){
     if($filtro2=="Todos"){
      if($filtro3=="Todos"){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }

//-----------------------------------------"con nombre, todos los tipos de donacipon y toda la sangre"-------------------  
    if($filtro!="" || $filtro!=NULL){
     if($filtro2=="Todos"){
      if($filtro3!="Todos" && $filtro3!="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipos_sangre.tipo_de_sangre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->bindValue(2,"%{$filtro3}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }

//----------------------------"con nombre, tipo de donacion especifica y toda la sangre"-----------------------------
    if($filtro!="" || $filtro!=NULL){
     if($filtro2!="Todos" && $filtro2!="Tipos de Donaciones..."){
      if($filtro3=="Todos"){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipo_donacion.tipo_donacion LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->bindValue(2,"%{$filtro2}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }



    if($filtro!="" || $filtro!=NULL){
     if($filtro2!="Todos" && $filtro2!="Tipos de Donaciones..."){
      if($filtro3!="Todos" && $filtro3!="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
         $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipo_donacion.tipo_donacion LIKE ? AND tipos_sangre.tipo_de_sangre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->bindValue(2,"%{$filtro2}%", PDO::PARAM_STR);
          $query_tabla_donaciones->bindValue(3,"%{$filtro3}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }



//------------------------------------------- nombre y tipo de sangre sin tipo de donacion------------------------------------
    if($filtro!="" || $filtro!=NULL){
     if($filtro2=="" || $filtro2=="Tipos de Donaciones..."){
      if($filtro3!="Todos" && $filtro3!="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipos_sangre.tipo_de_sangre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
          $query_tabla_donaciones->bindValue(2,"%{$filtro3}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);

          }
        }
      }
    }
  }

//---------------------------------------- solo con tipo de sangre especifica -------------------------------------------

    if($filtro=="" || $filtro==NULL){
     if($filtro2=="" || $filtro2=="Tipos de Donaciones..."){
      if($filtro3!="" && $filtro3!="Tipo de Sangre..."){
        if ($filtro4=="" || $filtro4=="0000-00-00") {
          if ($filtro5=="" || $filtro5=="0000-00-00") {
          $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE tipos_sangre.tipo_de_sangre LIKE ? ORDER BY donaciones.id");
          $query_tabla_donaciones->bindValue(1,"%{$filtro3}%", PDO::PARAM_STR);
          $query_tabla_donaciones->execute();
          $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
          }
        }
      }
    }
  }




//------------------------------ validaciones con nombre, tipo de donacion, sangre y fechas ------------------------------

//------------------con nombre, todos los tipos de donacipon, toda la sangre y con rango de fechas---------------------------
    if($filtro!="" || $filtro!=NULL){
     if($filtro2=="Todos"){
      if($filtro3=="Todos"){
        if ($filtro4!="" || $filtro4!="0000-00-00") {
          if ($filtro5!="" || $filtro5!="0000-00-00") {
            $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND donaciones.fecha_donacion BETWEEN ? AND ? ORDER BY donaciones.id");
            $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(2,"%{$filtro4}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(3,"%{$filtro5}%", PDO::PARAM_STR);
            $query_tabla_donaciones->execute();
            $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);   
          }
        }
      }
    }
  }


//--------------  con nombre, tipo de donacion especifica, toda la sangre y con rango de fechas ------------------
  //------------------------------------------aun no funciona
    if($filtro!="" || $filtro!=NULL){
     if($filtro2!="Todos" && $filtro2!="Tipos de Donaciones..."){
      if($filtro3=="Todos" || $filtro3=="Tipo de Sangre..."){
        if ($filtro4!="" || $filtro4!="0000-00-00") {
          if ($filtro5!="" || $filtro5!="0000-00-00") {
            $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipo_donacion.tipo_donacion LIKE ? AND donaciones.fecha_donacion BETWEEN ? AND ? ORDER BY donaciones.id");
            $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(2,"%{$filtro2}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(3,"%{$filtro4}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(4,"%{$filtro5}%", PDO::PARAM_STR);
            $query_tabla_donaciones->execute();
            $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
            echo "asdasdsd";    
          }
        }
      }
    }
  }


//----------------con nombre, tipo de donacion especifica, tipo de sangre especifico y con rango de fechas----------------
    if($filtro!="" || $filtro!=NULL){
     if($filtro2!="Todos" && $filtro2!="Tipos de Donaciones..."){
      if($filtro3!="Todos" && $filtro3!="Tipo de Sangre..."){
        if ($filtro4!="" && $filtro4!="0000-00-00") {
          if ($filtro5!="" && $filtro5!="0000-00-00") {
            $query_tabla_donaciones=$pdo->prepare("SELECT donaciones.id, tipo_donacion.tipo_donacion, tipos_sangre.tipo_de_sangre, donadores.nombre,donadores.a_paterno, donadores.a_materno, donaciones.fecha_donacion, donaciones.hora_donacion FROM donaciones INNER JOIN tipo_donacion ON tipo_donacion.id = donaciones.id_tipo_donacion INNER JOIN tipos_sangre ON tipos_sangre.id = donaciones.id_sangre INNER JOIN donadores ON donadores.id = donaciones.id_donador WHERE donadores.nombre LIKE ? AND tipo_donacion.tipo_donacion LIKE ? AND tipos_sangre.tipo_de_sangre LIKE ? AND donaciones.fecha_donacion BETWEEN ? AND ? ORDER BY donaciones.id");
            $query_tabla_donaciones->bindValue(1,"%{$filtro}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(2,"%{$filtro2}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(3,"%{$filtro3}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(4,"%{$filtro4}%", PDO::PARAM_STR);
            $query_tabla_donaciones->bindValue(5,"%{$filtro5}%", PDO::PARAM_STR);
            $query_tabla_donaciones->execute();
            $lista_donaciones=$query_tabla_donaciones->fetchAll(PDO::FETCH_ASSOC);
            if (!$lista_donaciones) {
              echo "no hay";
            }
          }
        }
      }
    }
  }




    if($filtro!="" || $filtro!=NULL){
     if($filtro2=="Todos" || $filtro2=="Tipos de Donaciones..."){
      if($filtro3!="Todos" && $filtro3!="Tipo de Sangre..."){
        if ($filtro4!="" && $filtro4!="0000-00-00") {
          if ($filtro5!="" && $filtro5!="0000-00-00") {
            echo "con nombre, todos los tipos de donacion, tipo de sangre especifico y con rango de fechas";
          }
        }
      }
    }
  }



    if($filtro!="" || $filtro!=NULL){
     if($filtro2=="Tipos de Donaciones..."){
      if($filtro3=="Tipo de Sangre..."){
        if ($filtro4!="" && $filtro4!="0000-00-00") {
          if ($filtro5!="" && $filtro5!="0000-00-00") {
            echo "con nombre, todos los tipos de donacion, todos los tipos de sangres y con rango de fechas";
          }
        }
      }
    }
  }



    if($filtro=="" || $filtro==NULL){
     if($filtro2=="" || $filtro2=="Tipos de Donaciones..."){
      if($filtro3=="" || $filtro3=="Tipo de Sangre..."){
        if ($filtro4!="" && $filtro4!="0000-00-00") {
          if ($filtro5!="" && $filtro5!="0000-00-00") {
            echo "solo con rango de fecha";
          }
        }
      }
    }
  }



//_---------------------------------------------------------------------------------------------------------------------------
 ?>
<!-- <script>alert("Debes elegir una fecha de fin para el rango de fecha");window.location.href ="historial-donaciones.php"</script>
-->
<?php

?>