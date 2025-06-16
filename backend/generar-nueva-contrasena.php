<?php
require_once 'config.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idUsuario = $_POST['id_usuario'];
        $nuevaContrasenaUsuario = password_hash($_POST['nueva_contrasena_usuario'], PASSWORD_BCRYPT);

        $pdo->beginTransaction();

        $sqlGenerarNuevaContrasenaUsuario = "UPDATE usuarios SET contrasena_usuario = ?, token_usuario = NULL WHERE id_usuario = ?";
        $stmtGenerarNuevaContrasenaUsuario = $pdo->prepare($sqlGenerarNuevaContrasenaUsuario);

        if ($stmtGenerarNuevaContrasenaUsuario) {
            $stmtGenerarNuevaContrasenaUsuario->execute([$nuevaContrasenaUsuario, $idUsuario]);
            $pdo->commit();
            header("Location: ../nueva_contrasena_generada.html");
            exit;
        } else {
            $pdo->rollBack();
            echo 'Error en la preparación de la consulta.';
        }

    } else {
        echo 'Método no permitido.';
    }
} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo 'Excepción capturada: ' . $e->getMessage();
}
?>
