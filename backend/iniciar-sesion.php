<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correoElectronicoUsuario = $_POST['correo_electronico_usuario'];
    $contrasenaUsuario = $_POST['contrasena_usuario'];

    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = '6Lemel4rAAAAADp6Cu3YmcNNQB2jwvywGYzdB-47'; 
    $remoteIp = $_SERVER['REMOTE_ADDR'];

    $recaptchaURL = "https://www.google.com/recaptcha/api/siteverify";
    $response = file_get_contents("$recaptchaURL?secret=$secretKey&response=$recaptchaResponse&remoteip=$remoteIp");
    $responseKeys = json_decode($response, true);

    if (!$responseKeys['success']) {
        $_SESSION['errorIniciarSesion'] = "Confirme que no es un robot haciendo clic en el reCaptcha";
        header("Location: ../iniciar_sesion.php");
        exit();
    }

    $sqlObtenerUsuario = "SELECT * FROM usuarios WHERE correo_electronico_usuario = ?";
    $stmt = $pdo->prepare($sqlObtenerUsuario);
    $stmt->execute([$correoElectronicoUsuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($contrasenaUsuario, $usuario['contrasena_usuario'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
        $_SESSION['correo_electronico_usuario'] = $usuario['correo_electronico_usuario'];
        header("Location: ../inicio.php");
        exit();
    }

    $_SESSION['errorIniciarSesion'] = "Correo electrónico o contraseña incorrectos";
    header("Location: ../iniciar_sesion.php");
    exit();
}
?>
