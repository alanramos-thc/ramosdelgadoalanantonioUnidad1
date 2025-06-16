<?php
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correoElectronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];


    $servidorSMTP = 'smtp.gmail.com';
    $puertoSMTP = 587;
            $usuarioSMTP = 'alanradax@gmail.com';
            $claveSMTP = 'tkvoadvqeiguugna';

    $correoElectronicoRemitente = $usuarioSMTP;
    $correoElectronicoDestinatario = 'alanradax@gmail.com';
    $asuntoCorreo = 'Nuevo Mensaje de SquidGameFans';

            $cuerpoCorreo = '
                <!DOCTYPE html>
                <html lang="es">
                <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Nuevo Mensaje - SquidGameFans</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        color: #333;
                        background-color: #ffffff;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        width: 100%;
                        max-width: 500px;
                        margin: 0 auto;
                        background-color: #ffffff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    .header {
                        background-color: #e977a8;
                        height: 80px;
                        text-align: center;
                        padding-top: 5px;
                    }
                    .logo {
                        display: inline-block;
                        background-color: #ffffff;
                        border-radius: 50%;
                        width: 75px;
                        height: 75px;
                        line-height: 75px;
                    }
                    .logo img {
                        width: 70px;
                        height: auto;
                        vertical-align: middle;
                    }
                    .content {
                        font-size: 14px;
                        line-height: 1.5;
                        padding: 30px;
                    }
                    .contenedor-dato h1 {
                        color: #e977a8;
                        font-size: 18px;
                        margin: 0; 
                        padding: 0;
                        line-height: 1.2; 
                    }
                    .contenedor-dato p {
                        color: #333;
                        font-size: 14px;
                        width: 95%;
                        margin-top: 5px; 
                        margin-bottom: 15px;
                        padding: 0;
                        line-height: 1.4;
                    }
                    .footer {
                        text-align: center;
                        background-color: #e977a8;
                        height: 30px;
                        line-height: 30px;
                    }
                    .footer a {
                        font-size: 18px;
                        color: #ffffff;
                        text-decoration: none;
                    }
                </style>
                </head>
                <body>
                <div class="container">
                    <div class="header">
                        <div class="logo">
                            <img src="https://logoeps.com/wp-content/uploads/2021/12/squid-game-logoeps.png" alt="SquidGameFans">
                        </div>
                    </div>
                    <div class="content">
                    <div class="contenedor-dato">
                        <h1>Nombre:</h1>
                        <p>' . htmlspecialchars($nombre) . '</p>
                    </div>
                    <div class="contenedor-dato">
                        <h1>Correo Electrónico:</h1>
                        <p>' . htmlspecialchars($correoElectronico) . '</p>
                    </div>
                    <div class="contenedor-dato">
                        <h1>Teléfono:</h1>
                        <p>' . htmlspecialchars($telefono) . '</p>
                    </div>
                    <div class="contenedor-dato">
                        <h1>Mensaje:</h1>
                        <p>' . htmlspecialchars($mensaje) . '</p>
                    </div>
                    </div>
                    <div class="footer">
                        <a href="http://localhost/squidgamefans/">squidgamefans.com</a>
                    </div>
                </div>
                </body>
                </html>
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
                header("Location: ../inicio.php");
                exit();
            } catch (Exception $e) {
                header("Location: ../inicio.php");
                exit();
            }
        }
?>
