<?php
require_once 'config.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);
        $nuevaContrasenaPlana = $_POST['nueva_contrasena_usuario'] ?? '';

        if (!$idUsuario || empty($nuevaContrasenaPlana)) {
            throw new Exception("Datos incompletos o inválidos");
        }

        $nuevaContrasenaUsuario = password_hash($nuevaContrasenaPlana, PASSWORD_BCRYPT);

        if (!$nuevaContrasenaUsuario) {
            throw new Exception("Error al generar la nueva contraseña");
        }

        $pdo->beginTransaction();

        $sqlGenerarNuevaContrasenaUsuario = "UPDATE usuarios SET contrasena_usuario = ?, token_usuario = NULL WHERE id_usuario = ?";
        $stmtGenerarNuevaContrasenaUsuario = $pdo->prepare($sqlGenerarNuevaContrasenaUsuario);

        if (!$stmtGenerarNuevaContrasenaUsuario) {
            throw new Exception("Error en la preparación de la consulta");
        }

        $resultado = $stmtGenerarNuevaContrasenaUsuario->execute([$nuevaContrasenaUsuario, $idUsuario]);

        if (!$resultado) {
            throw new Exception("Error al actualizar la contraseña");
        }

        $filasAfectadas = $stmtGenerarNuevaContrasenaUsuario->rowCount();

        if ($filasAfectadas === 0) {
            $pdo->rollBack();
            throw new Exception("Usuario no encontrado");
        }

        $pdo->commit();

        header("Location: ../nueva_contrasena_generada.html");
        exit;

    } else {
        throw new Exception("Método no permitido");
    }

    } catch (Exception $e) {
        if (isset($pdo) && $pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo 'Excepción capturada: ' . $e->getMessage();
    }
?>
