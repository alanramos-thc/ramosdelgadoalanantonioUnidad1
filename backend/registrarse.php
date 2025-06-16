<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST['nombre_usuario'];
    $correoElectronicoUsuario = $_POST['correo_electronico_usuario'];
    $contrasenaUsuarioPlana = $_POST['contrasena_usuario'];
    
    $contrasenaUsuario = password_hash($contrasenaUsuarioPlana, PASSWORD_DEFAULT);
    
    if (password_needs_rehash($contrasenaUsuario, PASSWORD_DEFAULT)) {
        exit("Error en el registro. Por favor intenta nuevamente.");
    }
    
    $sql = "INSERT INTO usuarios (nombre_usuario, correo_electronico_usuario, contrasena_usuario) 
            VALUES (:nombre_usuario, :correo_electronico_usuario, :contrasena_usuario)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':nombre_usuario' => $nombreUsuario,
            ':correo_electronico_usuario' => $correoElectronicoUsuario,
            ':contrasena_usuario' => $contrasenaUsuario
        ]);
        
        header("Location: ../iniciar_sesion.php");
        exit();
    } catch (PDOException $e) {
        exit("Error en el registro. Por favor intenta nuevamente.");
    }
}

header("Location: ../registrarse.html");
exit();
?>