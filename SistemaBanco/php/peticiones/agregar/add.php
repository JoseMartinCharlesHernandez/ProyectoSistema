<?php 
include('../../conexion.php');
include('../../config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../PHPMailer/Exception.php';
require '../../../PHPMailer/PHPMailer.php';
require '../../../PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$tipo_donacion=$_POST['select_donacion'];
$tipo_de_sangre=$_POST['select_sangre'];
$cant=$_POST['cant_trans'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$finalizada=0;


if($tipo_donacion!="ver más..." || $tipo_sangre!="ver más..."){

  	$insertar=$pdo->prepare("INSERT INTO peticiones(id_tipo_donacion,id_sangre,cantidad_transfusiones,fecha_inicio,fecha_fin,finalizada) VALUES((SELECT id FROM tipo_donacion WHERE tipo_donacion=:td),(SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tp),:cant_trans,:inicio,:fin,:finaliza)");
  	$insertar->bindParam(':td',$tipo_donacion);
    $insertar->bindParam(':tp',$tipo_de_sangre);
    $insertar->bindParam(':cant_trans',$cant);
    $insertar->bindParam(':inicio',$fecha_inicio);
    $insertar->bindParam(':fin',$fecha_fin);
    $insertar->bindParam(':finaliza',$finalizada);
    $insertar->execute();

    echo $tipo_donacion."<br>";
    echo $tipo_de_sangre."<br>";
    echo $cant."<br>";
    echo $fecha_inicio."<br>";
    echo $fecha_fin."<br>";
    echo $finalizada."<br>";

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
            $mail->Username   = $correo;                     // SMTP username
            $mail->Password   = $pass;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        foreach ($lista_donadores as $donadores) {

            //Recipients
            $mail->setFrom($correo, 'Admin');
            $mail->addAddress($donadores['correo'], $donadores['nombre']);

         	$format_date = new DateTime($fecha_fin);
			$fecha_d_m_y = $format_date->format('d/m/Y');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail->Body    = "SE REQUIERE UNA DONACIÓN DE PLAQUETAS ".$tipo_de_sangre." PARA ANTES DE LA FECHA ".$fecha_d_m_y;
            $mail->send();
            echo 'Mensaje enviado';
        }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

/*------------------------------------------------------------------------------------------------------------------*/

        header('location:../peticiones.php');
	}else{?>
		<script type="text/javascript">alert("Debes especificar el tipo de donación y/o el tipo de sangre");window.location.href ="../peticiones.php"</script>

<?php
	}
?>