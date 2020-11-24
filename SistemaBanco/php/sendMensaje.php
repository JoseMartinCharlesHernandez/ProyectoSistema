<?php  
include('../conexion.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';




$filtro=$_POST['opcion'];
$check=$_POST['customRadioInline1'];
$sangre=$_POST['sangre'];
$inicio=$_POST['fecha_inicio'];
$fin=$_POST['fecha_limite'];


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


if($filtro=="Selecciona una opcion..."){
    //si no se selecciona una opcion regresa al form de los correos
    header("location:mensajeria.php");
}//condicional que compara si el filtro es igual a todos los donadores hace una consukts
else if($filtro=="Todos los donadores"){
    
        $query=$pdo->prepare("SELECT * FROM donadores WHERE aceptado=1");
        $query->execute();
        $lista_donadores=$query->fetchAll(PDO::FETCH_ASSOC);

/*------------------------------------------------------------------------------------------------------------------*/
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'volkanogaming.98@gmail.com';                     // SMTP username
            $mail->Password   = 'Majinthehand3';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        foreach ($lista_donadores as $donadores) {

            //Recipients
            $mail->setFrom('volkanogaming.98@gmail.com', 'Admin');
            $mail->addAddress($donadores['correo'], $donadores['nombre']);

         
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail->Body    = 'SE REQUIERE UNA DONACIÓN DE '.$check." ".$sangre." para antes de la fecha ".$fin;
            $mail->send();
            echo 'Mensaje enviado';
        }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

/*------------------------------------------------------------------------------------------------------------------*/



}else if($filtro=="Todos los que aun no han donado"){
    //consulta para obtener los datos de los donadores
    $query=$pdo->prepare("SELECT * FROM donadores");
    $query->execute();
    $lista_donadores=$query->fetchAll(PDO::FETCH_ASSOC);


    try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'volkanogaming.98@gmail.com';                     // SMTP username
            $mail->Password   = 'Majinthehand3';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above




    //foreach para recorrer el array que contiene los datos de todos los donadores
     foreach ($lista_donadores as $datos) {
        //convierto las dos fechas como un tipo de dato DateTime:
            $donacion = new DateTime($datos['ultima_donacion']);
            $fechainicial = new DateTime($inicio);

            //calculo la diferencia entre la fecha de la
            $diferencia = $donacion->diff($fechainicial);

            $meses = ( $diferencia->y * 12 ) + $diferencia->m;

            if($meses>=6){
                echo "ya han pasado 6 meses desde su ultima donacion"."<br>";

          //Recipients
                $mail->setFrom('volkanogaming.98@gmail.com', 'Admin');
                $mail->addAddress($datos['correo'], $datos['nombre']);

             
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
                $mail->Body    = 'SE REQUIERE UNA DONACIÓN DE '.strtoupper($check)." ".strtoupper($sangre)." PARA ANTES DE LA FECHA ".$fin;
                $mail->send();
                echo 'Mensaje enviado';



            }else{
                echo "aun no pasa el tiempo suficiente para donar"."<br>";
            }

            }
        }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

}else{
    //si no se selecciona una opcion regresa al form de los correos
    header("location:mensajeria.php");
}











?>