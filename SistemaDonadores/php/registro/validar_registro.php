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
$mail2 = new PHPMailer(true);


$curp=strtoupper($_POST['curp']);
$nombre=$_POST['nombre'];
$a_paterno=$_POST['A_paterno'];
$a_materno=$_POST['A_materno'];
$fecha_nac=$_POST['Fecha_nacimiento'];
$sexo=$_POST['sexo'];
$estado_civil=$_POST['estado_civil'];
$tipo_sangre=$_POST['tipo_sangre'];
$calle=$_POST['calle'];
$num_dir=$_POST['num_dir'];
$col_fac=$_POST['col_fac'];
$cp=$_POST['cp'];
$ciudad=$_POST['ciudad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$pass=$_POST['pass'];
$cuenta_FB=$_POST['cuenta_FB'];
$link_FB=$_POST['link_FB'];
$ocupacion=$_POST['ocupacion'];
$grado_estudios=$_POST['grado_estudios'];
$ultima=$_POST['ultima_donacion'];
$aceptado=0;


/*
echo"curp: ".$curp."<br><br>";
echo "nombre: ".$nombre."<br>";
echo "a paterno: ".$a_paterno."<br>";
echo "a materno: ".$a_materno."<br>";
echo "nac: ".$fecha_nac."<br>";
echo "estado_civil: ".$estado_civil."<br>";
echo "genero: ".$sexo."<br>";
echo "sangre: ".$tipo_sangre."<br>";
echo "calle: ".$calle."<br>";
echo "dir: ".$num_dir."<br>";
echo "frac: ".$col_fac."<br>";
echo "cp: ".$cp."<br>";
echo "ciudad: ".$ciudad."<br>";
echo "telefono: ".$telefono."<br>";
echo "correo: ".$correo."<br>";
echo "pass: ".$pass."<br>";
echo "cuenta fb: ".$cuenta_FB."<br>";
echo "ocupacion: ".$ocupacion."<br>";
echo "ultima donacion: ".$ultima."<br>";
echo "estudios: ".$grado_estudios."<br>";
echo "link fb: ".$link_FB."<br>";
*/



  $query_verificar_user=$pdo->prepare("SELECT * FROM donadores WHERE curp=:curp");
  $query_verificar_user->bindParam(':curp',$curp);
  $query_verificar_user->execute();
  $resul=$query_verificar_user->fetchAll(PDO::FETCH_ASSOC);

  if ($resul) {?>

  <script type="text/javascript">alert("Ya existe un usuario registrado");window.location.href ="../registroFormulario.php"</script>

<?php
}else{
  if ($sexo=="Sexo...") {?>
  <script type="text/javascript">alert("Debes especificar tu genero");window.location.href ="../registroFormulario.php"</script>
<?php }else if($estado_civil=="Estado civil..."){?>
  <script type="text/javascript">alert("Debes especificar tu estado civil");window.location.href ="../registroFormulario.php"</script>
<?php }else if($tipo_sangre=="Tipo de sangre..."){?>
  <script type="text/javascript">alert("Debes especificar tu tipo de sangre");window.location.href ="../registroFormulario.php"</script>
<?php }else if($ciudad=="Ciudad..."){?>
  <script type="text/javascript">alert("Debes especificar tu ciudad");window.location.href ="../registroFormulario.php"</script>
<?php }else if($ocupacion=="Ocupación..."){?>
  <script type="text/javascript">alert("Debes especificar tu ocupación");window.location.href ="../registroFormulario.php"</script>
<?php }else if($grado_estudios=="Grado máximo de estudios..."){?>
  <script type="text/javascript">alert("Debes especificar tu grado máximo de estudios...");window.location.href ="../registroFormulario.php"</script>
<?php }else if($fecha_nac==NULL || $fecha_nac=='0000-00-00' || $fecha_nac==''){?>
  <script type="text/javascript">alert("Debes especificar tu fecha de nacimiento...");window.location.href ="../registroFormulario.php"</script>
<?php }

    if($ultima==NULL || $ultima=='0000-00-00' || $ultima==''){
    $insertar=$pdo->prepare("INSERT INTO donadores(curp,nombre, a_paterno, a_materno, fecha_nacimiento, id_genero, id_estado_civil, id_sangre, calle, numero, col_frac, cp, id_ciudad,telefono, correo, contra, cuenta_facebook, link_facebook, id_ocupacion, id_grado_estudios,aceptado) VALUES 
    (:curp,:nombre,:a_paterno,:a_materno,:fecha_nac,
    (SELECT id FROM genero WHERE genero=:sexo),
    (SELECT id FROM estado_civil WHERE estado_civil=:estado_civil),
    (SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tipo_sangre),
    :calle,:num_dir,:col_fac,:cp,
    (SELECT id FROM ciudad WHERE nombre=:ciudad),
    :telefono,:correo,:pass,:cuenta_FB,:link_FB,
    (SELECT id FROM ocupaciones WHERE nombre_ocupacion=:ocupacion),
    (SELECT id FROM grado_estudios WHERE nombre_grado=:grado_estudios),:acept)");
          $insertar->bindParam(':curp',$curp);
          $insertar->bindParam(':nombre',$nombre);
          $insertar->bindParam(':a_paterno',$a_paterno);
          $insertar->bindParam(':a_materno',$a_materno);
          $insertar->bindParam(':fecha_nac',$fecha_nac);
          $insertar->bindParam(':sexo',$sexo);
          $insertar->bindParam(':estado_civil',$estado_civil);
          $insertar->bindParam(':tipo_sangre',$tipo_sangre);
          $insertar->bindParam(':calle',$calle);
          $insertar->bindParam(':num_dir',$num_dir);
          $insertar->bindParam(':col_fac',$col_fac);
          $insertar->bindParam(':cp',$cp);
          $insertar->bindParam(':ciudad',$ciudad);
          $insertar->bindParam(':telefono',$telefono);
          $insertar->bindParam(':correo',$correo);
          $insertar->bindParam(':pass',$pass);
          $insertar->bindParam(':cuenta_FB',$cuenta_FB);
          $insertar->bindParam(':link_FB',$link_FB);
          $insertar->bindParam(':ocupacion',$ocupacion);
          $insertar->bindParam(':grado_estudios',$grado_estudios);
          $insertar->bindParam(':acept',$aceptado);
          $insertar->execute();

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
            $mail->setFrom($correo, 'Admin');
            $mail->addAddress($correo,$nombre);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail->Body    = 'TU CUENTA SERA ACEPTADA LO MAS PRONTO POSIBLE POR EL ADMINISTRADOR DEL SISTEMA, GRACIAS POR TU REGISTRO';
            $mail->send();
            echo 'Mensaje enviado';
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

/*------------------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------correo para avisar al admin-----------------------------------------*/
        try {
            //Server settings
            $mail2->SMTPDebug = 0;                      // Enable verbose debug output
            $mail2->isSMTP();                                            // Send using SMTP
            $mail2->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail2->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail2->Username   = $AdminEmail;                     // SMTP username
            $mail2->Password   = $AdminPass;                               // SMTP password
            $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail2->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            $mail2->setFrom($correo, 'Admin');
            $mail2->addAddress($AdminEmail,$nombre);

            // Content
            $mail2->isHTML(true);                                  // Set email format to HTML
            $mail2->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail2->Body    = 'TIENES UN REGISTRO PENDIENTE DE '.$nombre.$a_paterno.$a_materno." QUE DESEA REGISTRARSE COMO DONADOR PARA SALVAR VIDAS".'\n'."ENTRA AL SISTEMA LO ANTES POSIBLE PARA ACEPTAR SU SOLICITUD";
            $mail2->send();
            echo 'Mensaje enviado';
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

/*------------------------------------------------------------------------------------------------------------------*/
        header('location:../../index.php');

          
  }else if($ultima!=NULL || $ultima!='' || $ultima!='0000-00-00'){

    $insertar=$pdo->prepare("INSERT INTO donadores(curp,nombre, a_paterno, a_materno, fecha_nacimiento, id_genero, id_estado_civil, id_sangre, calle, numero, col_frac, cp, id_ciudad,telefono, correo, contra, cuenta_facebook, link_facebook, id_ocupacion, id_grado_estudios,ultima_donacion,aceptado) VALUES 
    (:curp,:nombre,:a_paterno,:a_materno,:fecha_nac,
    (SELECT id FROM genero WHERE genero=:sexo),
    (SELECT id FROM estado_civil WHERE estado_civil=:estado_civil),
    (SELECT id FROM tipos_sangre WHERE tipo_de_sangre=:tipo_sangre),
    :calle,:num_dir,:col_fac,:cp,
    (SELECT id FROM ciudad WHERE nombre=:ciudad),
    :telefono,:correo,:pass,:cuenta_FB,:link_FB,
    (SELECT id FROM ocupaciones WHERE nombre_ocupacion=:ocupacion),
    (SELECT id FROM grado_estudios WHERE nombre_grado=:grado_estudios),:ultima_donacion,:acept)");
          $insertar->bindParam(':curp',$curp);
          $insertar->bindParam(':nombre',$nombre);
          $insertar->bindParam(':a_paterno',$a_paterno);
          $insertar->bindParam(':a_materno',$a_materno);
          $insertar->bindParam(':fecha_nac',$fecha_nac);
          $insertar->bindParam(':sexo',$sexo);
          $insertar->bindParam(':estado_civil',$estado_civil);
          $insertar->bindParam(':tipo_sangre',$tipo_sangre);
          $insertar->bindParam(':calle',$calle);
          $insertar->bindParam(':num_dir',$num_dir);
          $insertar->bindParam(':col_fac',$col_fac);
          $insertar->bindParam(':cp',$cp);
          $insertar->bindParam(':ciudad',$ciudad);
          $insertar->bindParam(':telefono',$telefono);
          $insertar->bindParam(':correo',$correo);
          $insertar->bindParam(':pass',$pass);
          $insertar->bindParam(':cuenta_FB',$cuenta_FB);
          $insertar->bindParam(':link_FB',$link_FB);
          $insertar->bindParam(':ocupacion',$ocupacion);
          $insertar->bindParam(':grado_estudios',$grado_estudios);

          $insertar->bindParam(':ultima_donacion',$ultima);
          $insertar->bindParam(':acept',$aceptado);
          $insertar->execute();

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
            $mail->setFrom($correo, 'Admin');
            $mail->addAddress($correo,$nombre);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail->Body    = 'Tu cuenta será aceptada lo mas pronto posible por el administrador del sistema, gracias por tu registro.';
            $mail->send();
            echo 'Mensaje enviado';
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

/*------------------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------correo para avisar al admin-----------------------------------------*/
        try {
            //Server settings
            $mail2->SMTPDebug = 0;                      // Enable verbose debug output
            $mail2->isSMTP();                                            // Send using SMTP
            $mail2->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail2->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail2->Username   = $AdminEmail;                     // SMTP username
            $mail2->Password   = $AdminPass;                               // SMTP password
            $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail2->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            $mail2->setFrom($correo, 'Admin');
            $mail2->addAddress($AdminEmail,$nombre);

            // Content
            $mail2->isHTML(true);                                  // Set email format to HTML
            $mail2->Subject = utf8_decode('CENTRO ESTATAL DE LA TRANSFUSIÓN SANGUÍNEA DE TAMAULIPAS');
            $mail2->Body    = 'Tiene un registro pendiente de '.$nombre.$a_paterno.$a_materno." , el cual desea registrase como posible donador para salvar vidas".'\n'."Favor de entrar al sistema y verificar su solicitud, recuerda que la vida de las demás personas cuenta contigo.";
            $mail2->send();
            echo 'Mensaje enviado';
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

/*------------------------------------------------------------------------------------------------------------------*/
?>
    <script type="text/javascript">alert("Tu cuenta será verificada por el administrador del sistema, cuando sea verificada recibirás un correo de confirmación");window.location.href ="../../index.php"</script>
<?php
  }

}




?>