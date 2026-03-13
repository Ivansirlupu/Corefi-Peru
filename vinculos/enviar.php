<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ajusta la ruta según tu proyecto
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

// Correo de la empresa (donde recibirás los mensajes)
$destino = "leovilchez.2003@gmail.com";

// Correo Gmail y contraseña de app (para enviar)
$correo_gmail = "leovilchez.2003@gmail.com";       // tu correo Gmail
$clave_app    = "usacerjyhhxjqwxt";      // contraseña de aplicación de Gmail

if(isset($_POST['nombre'], $_POST['email'], $_POST['mensaje'])){
    $nombre = strip_tags(trim($_POST['nombre']));
    $email_usuario = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mensaje_usuario = htmlspecialchars(trim($_POST['mensaje']));

    if(!empty($nombre) && !empty($email_usuario) && !empty($mensaje_usuario)){
        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $correo_gmail;
            $mail->Password   = $clave_app;
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Remitente y destinatario
            $mail->setFrom($correo_gmail, 'Formulario Web COREFI');
            $mail->addAddress($destino);

            // Contenido
            $mail->Subject = "Mensaje desde la web COREFI";
            $mail->Body    = "Nombre: $nombre\nEmail: $email_usuario\nMensaje:\n$mensaje_usuario";

            $mail->send();
            echo "<p style='color:green;text-align:center;'>¡Mensaje enviado correctamente!</p>";

        } catch (Exception $e) {
            echo "<p style='color:red;text-align:center;'>Error al enviar el mensaje: {$mail->ErrorInfo}</p>";
        }

    } else {
        echo "<p style='color:red;text-align:center;'>Por favor completa todos los campos.</p>";
    }

} else {
    echo "<p style='color:red;text-align:center;'>Formulario incompleto.</p>";
}
?>
