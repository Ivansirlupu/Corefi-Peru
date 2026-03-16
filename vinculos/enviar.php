<?php

require 'config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

if(isset($_POST['nombre'], $_POST['email'], $_POST['mensaje'])){

    $nombre = strip_tags(trim($_POST['nombre']));
    $email_usuario = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mensaje_usuario = htmlspecialchars(trim($_POST['mensaje']));

    if(!empty($nombre) && !empty($email_usuario) && !empty($mensaje_usuario)){

        $mail = new PHPMailer(true);

        try {

            // Activar debug si hay errores
            //$mail->SMTPDebug = 2;

            // Configuración SMTP
            $mail->isSMTP();
            $mail->Host = 'corefiperu.pe';
            $mail->SMTPAuth = true;
            $mail->Username = $correo_empresa;
            $mail->Password = $clave_correo;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Opciones SSL (necesario en localhost)
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            // Remitente
            $mail->setFrom($correo_empresa, 'Formulario Web COREFI');

            // Destino
            $mail->addAddress($correo_empresa);

            // Contenido
            $mail->Subject = "Mensaje desde la web COREFI";
            $mail->Body = "Nombre: $nombre\nEmail: $email_usuario\nMensaje:\n$mensaje_usuario";

            $mail->send();

            // Redirigir a página de éxito
            header("Location: ./enviado.html");
            exit();

        } catch (Exception $e) {

            echo "Error al enviar: {$mail->ErrorInfo}";

        }

    } else {

        echo "Completa todos los campos.";

    }

}
?>