<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/squid-game-logo.svg" rel="icon">
    <title>SquidGameFans - Recuperear Contraseña</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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

    <section class="seccion-recuperar-contrasena">
        <h1>Recuperar Contraseña</h1>
        <p>Por favor, proporciona el correo electrónico de tu cuenta para proceder con el restablecimiento de contraseña.</p>
        <div class="formulario-recuperar-contrasena">
            <?php
            if (isset($_SESSION['errorRecuperarContrasenaCliente'])) {
                echo '<p class="error-mensaje-rc">' . $_SESSION['errorRecuperarContrasenaCliente'] . '</p>';
                unset($_SESSION['errorRecuperarContrasenaCliente']);
            }
            ?>
            <form action="backend/recuperar-contrasena.php" method="post">
                <div class="correo-electronico-usuario">
                    <label for="correoElectronicoUsuario">Correo Electrónico<span>*</span></label><br>
                    <input type="email" name="correo_electronico_usuario" id="correoElectronicoUsuario" required>
                </div>
                <button type="submit">Confirmar Correo</button>
            </form>
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