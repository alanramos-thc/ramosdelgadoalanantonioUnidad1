<?php
session_start();
require_once 'config.php'; 
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generarTokenUsuario($longitudTokenUsuario = 32) {
    return bin2hex(random_bytes($longitudTokenUsuario));
}

$tokenUsuarioGenerado = generarTokenUsuario();
$tokenUsuarioHasheado = password_hash($tokenUsuarioGenerado, PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correoElectronicoUsuario = $_POST['correo_electronico_usuario'];

    $sqlObtenerUsuario = "SELECT * FROM usuarios WHERE correo_electronico_usuario = :correo";
    $stmtObtenerUsuario = $pdo->prepare($sqlObtenerUsuario);
    $stmtObtenerUsuario->bindParam(':correo', $correoElectronicoUsuario, PDO::PARAM_STR);
    $stmtObtenerUsuario->execute();
    $usuario = $stmtObtenerUsuario->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $nombreUsuario = $usuario['nombre_usuario_usuario'];

        $sqlActualizarTokenUsuario = "UPDATE usuarios SET token_usuario = :token WHERE correo_electronico_usuario = :correo";
        $stmtActualizarTokenUsuario = $pdo->prepare($sqlActualizarTokenUsuario);
        $stmtActualizarTokenUsuario->bindParam(':token', $tokenUsuarioHasheado, PDO::PARAM_STR);
        $stmtActualizarTokenUsuario->bindParam(':correo', $correoElectronicoUsuario, PDO::PARAM_STR);
        $stmtActualizarTokenUsuario->execute();

        if ($stmtActualizarTokenUsuario->rowCount() > 0) {
            $servidorSMTP = 'smtp.gmail.com';
            $puertoSMTP = 587;
            $usuarioSMTP = 'alanradax@gmail.com';
            $claveSMTP = 'tkvoadvqeiguugna';

            $correoElectronicoRemitente = $usuarioSMTP;
            $correoElectronicoDestinatario = $correoElectronicoUsuario;
            $asuntoCorreo = 'Restablecimiento de Contraseña en SquidGameFans: Accede de Nuevo a tu Cuenta';

            $cuerpoCorreo = '
            <div style="width: 450px; background-color: white; margin: 0 auto;">
                <div style="display: flex; justify-content: space-between; align-items: center; background-color: #e977a8; padding: 20px;">
                    <h1 style="color: white; font-family: Roboto, sans-serif; font-weight: 800; font-size: 18px; text-align: center; flex: 1;">¡Recupera el Acceso a tu Cuenta en SquidGameFans!</h1>
                    <div style="background-color: white; border-radius: 19px; width: 90px; height: 85px; display: flex; align-items: center; justify-content: center; margin-left: 20px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/57/Squid_Game_2021_vector_logo_english.svg" loading="lazy" alt="SquidGameFans" style="width: auto; height: 40px;">
                    </div>
                </div>
                <div style="font-size: 16px; font-family: DM Sans, sans-serif; color: #020132; padding: 20px;">
                    <p>Hola ' . htmlspecialchars($nombreUsuario) . ',</p>
                    <p>Estamos aquí para asistirte en el restablecimiento de tu contraseña en SquidGameFans, asegurando así el acceso seguro a tu cuenta.</p>
                    <p>Por favor, haz clic en el enlace a continuación para comenzar:</p>
                    <p><a style="color: #1EC3E0;" href="http://localhost/squidgamefans/generar_nueva_contrasena.php?token_usuario=' . urlencode($tokenUsuarioGenerado) . '">Generar Nueva Contraseña</a></p>
                    <p>Si no solicitaste este cambio, por favor ignora este mensaje.</p>
                    <p>Gracias,<br>El equipo de SquidGameFans</p>
                </div>
                <div style="width: 100%; height: 25px; background-color: #e977a8;"></div>
            </div>
            ';

            $correo = new PHPMailer(true);
            try {
                $correo->isSMTP();
                $correo->Host = $servidorSMTP;
                $correo->SMTPAuth = true;
                $correo->Username = $usuarioSMTP;
                $correo->Password = $claveSMTP;
                $correo->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $correo->Port = $puertoSMTP;

                $correo->setFrom($correoElectronicoRemitente, 'SquidGameFans');
                $correo->addAddress($correoElectronicoDestinatario);
                $correo->Subject = $asuntoCorreo;
                $correo->isHTML(true);
                $correo->Body = $cuerpoCorreo;
                $correo->CharSet = 'UTF-8';

                $correo->send();
                header("Location: ../correo_enviado.html");
                exit();
            } catch (Exception $e) {
                $_SESSION['errorRecuperarContrasenaUsuario'] = "No se pudo enviar el correo. Inténtalo más tarde.";
                header("Location: ../recuperar_contrasena.php");
                exit();
            }
        } else {
            $_SESSION['errorRecuperarContrasenaUsuario'] = "Hubo un problema con tu solicitud. Inténtalo nuevamente.";
            header("Location: ../recuperar_contrasena.php");
            exit();
        }
    } else {
        $_SESSION['errorRecuperarContrasenaUsuario'] = "No encontramos una cuenta con ese correo. Verifica e intenta nuevamente.";
        header("Location: ../recuperar_contrasena.php");
        exit();
    }
}
?>
