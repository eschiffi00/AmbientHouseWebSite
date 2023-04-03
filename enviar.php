<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
//if ( !isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["message"]) 
//        || !isset($_POST["last-name"]) || !isset($_POST["phone"]) || !isset($_POST["tipodeevento"])
//        || !isset($_POST["espacios"])
//         ) {
//    die ("Es necesario completar todos los datos del formulario");
//}
$nombre = $_POST["name"];
$email = $_POST["email"];
$mensaje = $_POST["message"];
$apellido = $_POST["last-name"];
$phone = $_POST["phone"];
$tipodeevento = $_POST["tipodeevento"];


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1690617.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@edificiolahusen.com.ar";  // Mi cuenta de correo
$smtpClave = "SenGdo17";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@edificiolahusen.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 25; 
//$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Consulta Edificio Lahusen Formulario Contacto Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "Contacto: {$apellido} , {$nombre} <br />  Telefono: {$phone}  <br />  Email: {$email}  <br /> Tipo de Evento:{$tipodeevento}<br /> {$mensajeHtml} <br /><br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "<script>alert('El correo fue enviado correctamente.');</script>";
    header('Location: ../index.html');
} else {
    echo "<script>alert('Ocurrió un error inesperado.');</script>";
}

//Telefono: {$phone} \n\n Espacio: {$espacios} \n\n  Tipo de Evento: {$tipodeevento} \n\n 