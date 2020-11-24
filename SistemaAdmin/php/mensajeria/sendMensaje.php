<?php  
include('../conexion.php');
include('../config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';




$filtro=$_POST['opcion'];
$check=$_POST['customRadioInline1'];
$sangre=$_POST['sangre'];//variable que recibe el valor del select
$inicio=$_POST['fecha_inicio'];
$fin=$_POST['fecha_limite'];
$asunto=$_POST['asunto'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


if($filtro=="Selecciona una opcion..."){
    //si no se selecciona una opcion regresa al form de los correos?>
    <script>alert("Debes seleccionar una opcion");window.location.href ="mensajeria.php"</script>
<?php
}//condicional que compara si el filtro es igual a todos los donadores hace una consukts
//-----------------------condicional para mandar el correo a todos los donadores que aun no han donado y tienen cualquier tipo de sangre------------------------------
else if($filtro=="Todos los donadores" AND $sangre=="Cualquier"){
    
        $query=$pdo->prepare("SELECT * FROM donadores WHERE aceptado=1");
        $query->execute();
        $lista_donadores=$query->fetchAll(PDO::FETCH_ASSOC);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer'=> false,
                'verify_peer_name' =>false,
                'allow_self_signed' => true
            )
            );
/*------------------------------------------------------------------------------------------------------------------*/
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $AdminEmail;                     // SMTP username
            $mail->Password   = $AdminPass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
             //Recipients
            $mail->setFrom($AdminEmail, 'Admin');
            
            foreach ($lista_donadores as $donadores) {
            $mail->addAddress($donadores['correo'], $donadores['nombre']);

         
            $format_date = new DateTime($fin);
            $fecha_d_m_y = $format_date->format('d/m/Y');


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail->Body    = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title></title>
</head>
<body style="background-color: #eeeeee ;"><label> </label><br>
 <h2 style=" position: absolute; margin-top: 2.6%; color:black; font-size:27px;  margin-left:1%; text-align: center;">CENTRO ESTATAL DE LA TRANSFUSION SANGUINEA DE TAMAULIPAS</h2>

   <img style="width:20%; height:240px; margin-left:39%;" src="https://www.tamaulipas.gob.mx/wp-content/themes/gobtam-2016/img/esc-tam.png">

    <h2 style=" margin-top: 1.6%; color:black; margin-left:-7%; font-size:35px; text-align: center;">
    ¡HOLA '.$donadores['nombre'].'! </h2>
   

    <div style="width:60%; border-radius:5px; height: 100%; background-color: white; margin-left:19%; ">
       
        <p style="font-size:20px; text-align:justify; padding-top: 1%; padding-left: 1%; padding-right: 1%;"><b>¡Se requiere una donación de '.$check.' del tipo '.$sangre.' para antes de la fecha '.$fecha_d_m_y.'!</b></p>

        <p style="font-size:20px; text-align:justify; padding-top: 1%; padding-left: 1%; padding-right: 1%;">'.$asunto.'</p>

           <br><label> </label>
    </div>

<label> </label><br>

</body>
</html> ';
            if(empty($_FILES['attachment']['name'])){
                echo "string";
            }else{

                for($ct=0;$ct<count($_FILES['attachment']['tmp_name']);$ct++){
                    $mail->AddAttachment($_FILES['attachment']['tmp_name'][$ct],$_FILES['attachment']['name'][$ct]);
                }
            }
            
            $mail->send();
            $mail->clearAddresses();
        }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}?>
    
      <script>alert("Mensajes enviados");window.location.href ="mensajeria.php"</script>


<?php

/*------------------------------------------------------------------------------------------------------------------*/


//-------------------------------condicional para mandar el correo a todos los donadores y que tienen un tipo de sangre especifico--------------------------------
}else if($filtro=="Todos los donadores" AND $sangre!="Cualquier"){
        echo $sangre;
        $query3=$pdo->prepare("SELECT * FROM donadores WHERE id_sangre=(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:s) AND aceptado=1");
        $query3->bindParam(":s",$sangre);
        $query3->execute();
        $lista_donadores3=$query3->fetchAll(PDO::FETCH_ASSOC);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer'=> false,
                'verify_peer_name' =>false,
                'allow_self_signed' => true
            )
            );
/*------------------------------------------------------------------------------------------------------------------*/
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $AdminEmail;                     // SMTP username
            $mail->Password   = $AdminPass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
             //Recipients
            $mail->setFrom($AdminEmail, 'Admin');
            
            foreach ($lista_donadores3 as $donadores) {
            $mail->addAddress($donadores['correo'], $donadores['nombre']);

         
            $format_date = new DateTime($fin);
            $fecha_d_m_y = $format_date->format('d/m/Y');


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail->Body    = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title></title>
</head>
<body style="background-color: #eeeeee ;"><label> </label><br>
 <h2 style=" position: absolute; margin-top: 2.6%; color:black; font-size:27px;  margin-left:1%; text-align: center;">CENTRO ESTATAL DE LA TRANSFUSION SANGUINEA DE TAMAULIPAS</h2>

   <img style="width:20%; height:240px; margin-left:39%;" src="https://www.tamaulipas.gob.mx/wp-content/themes/gobtam-2016/img/esc-tam.png">

    <h2 style=" margin-top: 1.6%; color:black; margin-left:-7%; font-size:35px; text-align: center;">
    ¡HOLA '.$donadores['nombre'].'! </h2>
   

    <div style="width:60%; border-radius:5px; height: 100%; background-color: white; margin-left:19%; ">
       
        <p style="font-size:20px; text-align:justify; padding-top: 1%; padding-left: 1%; padding-right: 1%;"><b>¡Se requiere una donación de '.$check.' del tipo '.$sangre.' para antes de la fecha '.$fecha_d_m_y.'!</b></p>

        <p style="font-size:20px; text-align:justify; padding-top: 1%; padding-left: 1%; padding-right: 1%;">'.$asunto.'</p>

           <br><label> </label>
    </div>

<label> </label><br>

</body>
</html> ';
            
            for($ct=0;$ct<count($_FILES['attachment']['tmp_name']);$ct++){
                $mail->AddAttachment($_FILES['attachment']['tmp_name'][$ct],$_FILES['attachment']['name'][$ct]);
            }

            $mail->send();
            $mail->clearAddresses();
        }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }?>
    
      <script>alert("Mensajes enviados");window.location.href ="mensajeria.php"</script>


<?php

/*------------------------------------------------------------------------------------------------------------------*/



//-------------------------------------------aun no funciona---------------------------------------------------------

//------------------------condicional para mandar el correo a todos los donadores que aun no han donado y tienen cualquier tipo de sangre-------------------------------
}else if($filtro=="Todos los que aun no han donado" AND $sangre=="Cualquier"){
    //consulta para obtener los datos de los donadores
    $query2=$pdo->prepare("SELECT * FROM donadores WHERE aceptado=1");
    $query2->execute();
    $lista_donadores2=$query2->fetchAll(PDO::FETCH_ASSOC);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'=> false,
            'verify_peer_name' =>false,
            'allow_self_signed' => true
        )
        );
    try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $AdminEmail;                     // SMTP username
            $mail->Password   = $AdminPass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->setFrom($AdminEmail, 'Admin');


    //foreach para recorrer el array que contiene los datos de todos los donadores
     foreach ($lista_donadores2 as $datos) {
 //convierto las dos fechas como un tipo de dato DateTime:
        if($datos['ultima_donacion']!=NULL){
            $donacion = new DateTime($datos['ultima_donacion']);
            $fechainicial = new DateTime($inicio);

            //calculo la diferencia entre la fecha de la
            $diferencia = $donacion->diff($fechainicial);

            $meses = ( $diferencia->y * 12 ) + $diferencia->m;

            if($meses>=4){
                $mail->addAddress($datos['correo'], $datos['nombre']);

             
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
                $mail->Body    = 'SE REQUIERE UNA DONACIÓN DE '.strtoupper($check)." ".strtoupper($sangre)." PARA ANTES DE LA FECHA ".$fin;

                for($ct=0;$ct<count($_FILES['attachment']['tmp_name']);$ct++){
                  $mail->AddAttachment($_FILES['attachment']['tmp_name'][$ct],$_FILES['attachment']['name'][$ct]);
                }

                $mail->send();
                $mail->clearAddresses();
            }else{
                echo "aun no pasa el tiempo suficiente para donar"."<br>";
            }
            //else del if que verifica si la ultima donacion de la persona devuelve un nulo
            }else if($datos['ultima_donacion']==NULL){
                $mail->addAddress($datos['correo'], $datos['nombre']);
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
                $mail->Body    = 'SE REQUIERE UNA DONACIÓN DE '.strtoupper($check)." ".strtoupper($sangre)." PARA ANTES DE LA FECHA ".$fin;

                for($ct=0;$ct<count($_FILES['attachment']['tmp_name']);$ct++){
                  $mail->AddAttachment($_FILES['attachment']['tmp_name'][$ct],$_FILES['attachment']['name'][$ct]);
                }

                $mail->send();
                $mail->clearAddresses();



            }
        }
        }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }?>
    
      <script>alert("Mensajes enviados");window.location.href ="mensajeria.php"</script>


<?php




//--------------------------condicional para mandar el correo a todos los donadores que aun no han donado y que tienen un tipo de sangre especifico-----------------------
}else if($filtro=="Todos los que aun no han donado" ){


 //consulta para obtener los datos de los donadores
    $query4=$pdo->prepare("SELECT * FROM donadores WHERE id_sangre=(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:s) AND aceptado=1");
    $query4->bindParam(":s",$sangre);
    $query4->execute();
    $lista_donadores4=$query4->fetchAll(PDO::FETCH_ASSOC);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'=> false,
            'verify_peer_name' =>false,
            'allow_self_signed' => true
        )
        );

    try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $AdminEmail;                     // SMTP username
            $mail->Password   = $AdminPass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->setFrom($AdminEmail, 'Admin');


    //foreach para recorrer el array que contiene los datos de todos los donadores
     foreach ($lista_donadores4 as $datos) {
        //convierto las dos fechas como un tipo de dato DateTime:
        if($datos['ultima_donacion']!=NULL){
            $donacion = new DateTime($datos['ultima_donacion']);
            $fechainicial = new DateTime($inicio);

            //calculo la diferencia entre la fecha de la
            $diferencia = $donacion->diff($fechainicial);

            $meses = ( $diferencia->y * 12 ) + $diferencia->m;

            if($meses>=4){
                $mail->addAddress($datos['correo'], $datos['nombre']);

             
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
                $mail->Body    = 'SE REQUIERE UNA DONACIÓN DE '.strtoupper($check)." ".strtoupper($sangre)." PARA ANTES DE LA FECHA ".$fin;

                for($ct=0;$ct<count($_FILES['attachment']['tmp_name']);$ct++){
                  $mail->AddAttachment($_FILES['attachment']['tmp_name'][$ct],$_FILES['attachment']['name'][$ct]);
                }

                $mail->send();
                $mail->clearAddresses();
            }else{
                echo "Aún no pasa el tiempo suficiente para donar"."<br>";
            }
            //else del if que verifica si la ultima donacion de la persona devuelve un nulo
            }else if($datos['ultima_donacion']==NULL){
                $mail->addAddress($datos['correo'], $datos['nombre']);
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
                $mail->Body    = 'SE REQUIERE UNA DONACIÓN DE '.strtoupper($check)." ".strtoupper($sangre)." PARA ANTES DE LA FECHA ".$fin;

                for($ct=0;$ct<count($_FILES['attachment']['tmp_name']);$ct++){
                  $mail->AddAttachment($_FILES['attachment']['tmp_name'][$ct],$_FILES['attachment']['name'][$ct]);
                }

                $mail->send();
                $mail->clearAddresses();



            }
        }
        }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }?>
    
      <script>alert("Mensajes enviados");window.location.href ="mensajeria.php"</script>


<?php

}else{?>
    
      <script>alert("Selecciona a quien va dirigido el mensaje");window.location.href ="mensajeria.php"</script>


<?php
}

if($sangre=="Selecciona una opción..."){?>
    
    <script>alert("Selecciona un tipo de sangre");window.location.href ="mensajeria.php"</script>

<?php
}

?>