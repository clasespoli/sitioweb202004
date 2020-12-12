<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "clasespolitecnicoint@gmail.com";
$mail->Password   = "Poli2020*";

$mail->IsHTML(true);
$mail->AddAddress('clasespolitecnicoint@gmail.com', "Particulares");
$mail->SetFrom("clasespolitecnicoint@gmail.com", "Web Particulares");
$mail->Subject = "Nuevo Mensaje Sitio Web";
$content = "<h4>Has recibido un nuevo correo de contacto desde tu sitio web</h4><br>
            <table border='1'>
              <tr>
                <td><b>Cliente: </b></td>
                <td>".$nombre."</td>
              </tr>
              <tr>
                <td><b>Correo: </b></td>
                <td>".$email."</td>
              </tr>
              <tr>
                <td><b>Teléfono: </b></td>
                <td>".$telefono."</td>
              </tr>
              <tr>
                <td><b>Mensaje: </b></td>
                <td>".$mensaje."</td>
              </tr>
            </table>";
                 
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}

?>
