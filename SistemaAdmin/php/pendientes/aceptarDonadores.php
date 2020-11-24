<?php 
include('../conexion.php');
include('../config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$aceptado=1;
$id=$_POST['id_donador'];

      $actualizar=$pdo->prepare("UPDATE donadores SET aceptado=:a WHERE id=:id_donador");
      $actualizar->bindParam(':id_donador',$id);
      $actualizar->bindParam(':a',$aceptado);
      $actualizar->execute();

        $query=$pdo->prepare("SELECT * FROM donadores WHERE id=:id_donador");
        $query->bindParam(':id_donador',$id);
        $query->execute();
        $donador=$query->fetchAll(PDO::FETCH_ASSOC);
/*---------------------------------------------correo para avisar al usuario-----------------------------------------*/
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
           foreach ($donador as $datos) {
                $mail->setFrom($AdminEmail, 'Admin');
                $mail->addAddress($datos['correo'], $datos['nombre']);

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
                $mail->Body    = 'TU CUENTA YA FUE ACEPTADA Y YA PUEDES INICIAR SESIÓN, GRACIAS POR TU REGISTRO';
                $mail->send();
                echo 'Mensaje enviado';
        	}
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
header('location:pendientes.php');


/*------------------------------------------------------------------------------------------------------------------*/











?>