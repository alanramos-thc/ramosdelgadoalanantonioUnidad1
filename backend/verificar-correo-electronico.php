<?php
    require_once 'config.php';

    if (isset($_POST['correo_electronico_usuario'])) {
        $correoElectronicoUsuario = $_POST['correo_electronico_usuario'];

        $sqlObtenerUsuarios = "SELECT * FROM usuarios WHERE correo_electronico_usuario = ?";
        $stmtObtenerUsuarios = $pdo->prepare($sqlObtenerUsuarios);
        $stmtObtenerUsuarios->execute([$correoElectronicoUsuario]);

        $usuarios = $stmtObtenerUsuarios->fetchAll();

        if (count($usuarios) > 0) {
            echo 'existe';
        } else {
            echo 'no_existe';
        }
    }

    $pdo = null;
?>
