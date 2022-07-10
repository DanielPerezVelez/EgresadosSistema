<!DOCTYPE html>
<html>
    <form method='POST'>
<?php
//IMPORTACIÓN DE FICHEROS PARA EL PROCEDIMIENTO DE ENVIO
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include ('conexion.php');
$mail = new PHPMailer(true);

if(isset($_POST["enviar"])&&($_POST["email"]))
{
    $Correo=$_POST["email"];

    //PROCESO DE GENERACION DEL TOKEN
function getToken($len)
{
    $cadena = uniqid();
    $token = "";

    //FUNCION FOR PARA GENERAR EL ARREGLO
    for ($i = 0; $i < $len; $i++) {
        $token .= $cadena[rand(0, $len)];
    }
    return $token;
}$t0k3n = getToken(12); //GUARAMOS EL VALOR OBTENIDO DEL ARREGLO EN LA VARIABLE T0K3N NOMBRADA ASI PARA DIFERENCIARLA

//PROCESO DE ALMACENADO EN LA BASE DE DATOS
$ID_T = '';
$ID_Usuario=rand(1,999);
$Fecha=date("F j, Y, g:i a");
$insertar = "INSERT INTO validacion(ID_T,  ID_Usuario, Token, Fecha, Correo) VALUES ('$ID_T','$ID_Usuario','$t0k3n','$Fecha','$Correo')";
$ejecutar = mysqli_query($enlace,$insertar);

    //PROCEDIMIENTO DE ENVIO DEL CORREO
try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; //llave del host
    $mail->SMTPAuth = true;
    $mail->Username = 'wilmerc27@wr27.com';
    $mail->Password = 'To2RpTo2.';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //llave del host
    $mail->Port = 587; //puerto del host

    //SECCIÓN DE ASIGNACIÓN DE USUARIOS A ENVIAR EL CORREO
    $mail->setFrom('wilmerc27@wr27.com', 'Comunicacion'); //'usuario conectado al host','Nombre del dpto que envia el correo'
    $mail->addAddress($Correo, $Correo);//'usuario ingresado', 'Para: Usuario ingresado'

    //CONTENIDO DEL CORREO A ENVIAR
    $mail->isHTML(true);
    $mail->Subject = 'Validacion de su correo electronico';
    $mail->Body = "<a href='https://egresados.tecnm.com/$t0k3n'>Ingresa a este link para obtener tu token</a>";
    $mail->send();

    //REGRESAR A LA PANTALLA PRINCIPAL DESPUES DE EJECUTAR EL PROCEDIMIENTO
    header("Location: index.php?enviado=true");
    
} catch (Exception $e) {
}
}