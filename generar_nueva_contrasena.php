<?php
require_once 'backend/config.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (isset($_GET['token_usuario'])) {
    $tokenUsuario = $_GET['token_usuario'];

    try {
        $sqlObtenerUsuario = "SELECT id_usuario, token_usuario FROM usuarios";
        $stmtObtenerUsuario = $pdo->prepare($sqlObtenerUsuario);
        $stmtObtenerUsuario->execute();

        $esTokenUsuarioValido = false;
        $tokenUsuarioHasheado = null;
        $idUsuario = null;

        while ($row = $stmtObtenerUsuario->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($tokenUsuario, $row['token_usuario'])) {
                $esTokenUsuarioValido = true;
                $tokenUsuarioHasheado = $row['token_usuario'];
                $idUsuario = $row['id_usuario'];
                break;
            }
        }

        if ($esTokenUsuarioValido) {
            if (!is_null($tokenUsuarioHasheado)) {
                echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/squid-game-logo.svg" rel="icon">
    <title>SquidGameFans - Generar Nueva Contraseña</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="redes-sociales-header">
            <a href="https://wa.me/5218441752822?text=¡Hola!%20Vi%20su%20sitio%20Squid%20Game%20Fans%20y%20quiero%20recibir%20información%20sobre%20nuevos%20artículos%20o%20colaboraciones.%20Gracias."><img src="assets/img/WhatsApp.png" alt="WhatsApp"></a>
            <a href="https://www.facebook.com/squidgamenetflix/"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="https://www.instagram.com/squidgamenetflix/"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>

<nav class="navbar" id="navbar">
        <li class="logo-navbar">
            <a href="inicio.php"><img src="assets/img/squid-game-logo.svg" alt="SquidGame"></a>
            <h1>SquidGameFans</h1>
        </li>
        <button class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="menu" id="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="temporada_1.php">Temporada 1</a></li>
            <li><a href="temporada_2.php">Temporada 2</a></li>
            <li><a href="#" class="item-menu-inactivo">Temporada 3</a></li>
            <li><a href="inicio.php#contactenos">Contáctenos</a></li>
            <li><a href="iniciar_sesion.php">Iniciar Sesión</a></li>
            <li><a href="registrarse.html">Registrarse</a></li>
            <div class="redes-sociales-movil">
                <a href="https://wa.me/5218441752822?text=¡Hola!%20Vi%20su%20sitio%20Squid%20Game%20Fans%20y%20quiero%20recibir%20información%20sobre%20nuevos%20artículos%20o%20colaboraciones.%20Gracias."><img src="assets/img/WhatsApp.png" alt="WhatsApp"></a>
                <a href="https://www.facebook.com/squidgamenetflix/"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://www.instagram.com/squidgamenetflix/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </ul>
    </nav>

    <div class="fondo-menu-movil" id="fondoMenuMovil"></div>

    <section class="seccion-generar-nueva-contrasena">
        <div class="formulario-generar-nueva-contrasena">
            <form action="backend/generar-nueva-contrasena.php" method="post">
                <input type="hidden" name="id_usuario" value="'. $idUsuario .'">
                <div class="nueva-contrasena-usuario">
                    <label for="nuevaContrasenaUsuario">Nueva Contraseña<span>*</span></label><br>
                    <input type="password" name="nueva_contrasena_usuario" id="nuevaContrasenaUsuario" required>
                </div>
                <div class="confirmar-nueva-contrasena-usuario">
                    <label for="confirmarNuevaContrasenaUsuario">Confirmar Nueva Contraseña<span>*</span></label><br>
                    <input type="password" name="confirmar_nueva_contrasena_usuario" id="confirmarNuevaContrasenaUsuario" required>
                </div>
                    <div id="errorValidarNuevaContrasenaUsuario" class="error-mensaje-generar-nueva-contrasena">Las contraseñas no coinciden</div>
                <button id="generarNuevaContrasenaUsuario" type="submit">Generar Nueva Contraseña</button>
            </form>
            <script>
                  $(document).ready(function() {
                      function validarNuevaContrasenaUsuario() {
                      var nuevaContrasenaUsuario = $("#nuevaContrasenaUsuario").val();
                      var confirmarNuevaContrasenaUsuario = $("#confirmarNuevaContrasenaUsuario").val();
                  
                      if (confirmarNuevaContrasenaUsuario.length > 0 && nuevaContrasenaUsuario !== confirmarNuevaContrasenaUsuario) {
                        $("#errorValidarNuevaContrasenaUsuario").show();
                      } else {
                        $("#errorValidarNuevaContrasenaUsuario").hide();
                      }
                  
                      habilitarBtnGenerarNuevaContrasenaUsuario();
                    }
                  
                    function habilitarBtnGenerarNuevaContrasenaUsuario() {
                      var esErrorValidarNuevaContrasenaUsuarioVisible = $("#errorValidarNuevaContrasenaUsuario").is(":visible");
                  
                      if (esErrorValidarNuevaContrasenaUsuarioVisible) {
                        $("#generarNuevaContrasenaUsuario").prop("disabled", true);
                      } else {
                        $("#generarNuevaContrasenaUsuario").prop("disabled", false);
                      }
                    }
                  
      
                    $("#nuevaContrasenaUsuario, #confirmarNuevaContrasenaUsuario").on("input", validarNuevaContrasenaUsuario);
                  });
            </script>
        </div>
        <div class="informacion-generar-nueva-contrasena">
            <h1>Generar Nueva Contraseña</h1>
            <p>Estimado usuario, para restablecer con seguridad su contraseña, 
                  le solicitamos que establezca una nueva contraseña segura. Esto asegurará 
                  la protección de su cuenta. ¡Gracias por su confianza!</p>
        </div>
    </section>

        <footer class="pie-de-pagina">
        <div class="enlaces-rapidos-pie-de-pagina">
            <h2 class="titulo-enlaces-rapido">Enlaces Rápidos</h2>
            <ul class="enlaces-rapidos">
                <li><a href="inicio.php"><i class="fa-solid fa-caret-right"></i> Inicio</a></li>
                <li><a href="temporada_1.php"><i class="fa-solid fa-caret-right"></i> Temporada 1</a></li>
                <li><a href="temporada_2.php"><i class="fa-solid fa-caret-right"></i> Temporada 2</a></li>
                <li><a class="enlace-rapido-inactivo" href="#"><i class="fa-solid fa-caret-right"></i> Temporada 3</a></li>
                <li><a href="inicio.php#contactenos"><i class="fa-solid fa-caret-right"></i> Contáctenos</a></li>
                <li><a href="iniciar_sesion.php"><i class="fa-solid fa-caret-right"></i> Iniciar Sesión</a></li>
                <li><a href="registrarse.html"><i class="fa-solid fa-caret-right"></i> Registrarse</a></li>
            </ul>
        </div>
        <div class="siguenos-pie-de-pagina">
            <h2 class="titulo-siguenos">Síguenos</h2>
            <div class="redes-sociales-siguenos">
                <a href="https://www.facebook.com/squidgamenetflix/"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://www.instagram.com/squidgamenetflix/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
        <div class="correo-de-contacto-pie-de-pagina">
            <h2 class="titulo-correo-de-contacto">Correo de Contacto</h2>
            <div class="correo-de-contacto">
                <a href="mailto:alanradax@gmail.com"><p><i class="fa-solid fa-envelope"></i> alanradax@gmail.com</p></a>
            </div>
        </div>
        <div class="logo-pie-de-pagina">
            <div class="contenedor-logo">
                <a href=""><img src="assets/img/squid-game-logo.svg" alt="Servileasing" loading="lazy"></a>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <p>© 2025 SquidGameFans. Todos los derechos reservados.</p>
    </div>
</body>
</html>

<script src="assets/js/script.js"></script>
        ';
     } else {
                header("Location: iniciar_sesion.php");
                exit;
            }
        } else {
            header("Location: iniciar_sesion.php");
            exit;
        }

    } catch (PDOException $e) {
        die("Error en la base de datos: " . $e->getMessage());
    }

} else {
    header("Location: iniciar_sesion.php");
    exit;
}
?>