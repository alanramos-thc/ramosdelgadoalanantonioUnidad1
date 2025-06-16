<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/squid-game-logo.svg" rel="icon">
    <title>SquidGameFans - Temporada 2</title>
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
        <div class="comunicate-con-nosotros-header">
            <?php
                if (isset($_SESSION['nombre_usuario'])) {
                    echo '<p>Bienvenido Jugador ' . $_SESSION['nombre_usuario'] . '</p>';
                }
            ?>
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
            <li><a class="item-menu-activo" href="temporada_2.php">Temporada 2</a></li>
            <li><a href="#" class="item-menu-inactivo">Temporada 3</a></li>
            <li><a href="inicio.php#contactenos">Contáctenos</a></li>
            <?php
                if (isset($_SESSION['id_usuario'])) {
                    echo '<li><a href="backend/cerrar-sesion.php">Cerrar Sesión</a></li>';
                }
                else {
                    echo '<li><a href="iniciar_sesion.php">Iniciar Sesión</a></li>';
                    echo '<li><a href="registrarse.html">Registrarse</a></li>';
                }
            ?>
            <div class="comunicate-con-nosotros-movil">
                <?php
                    if (isset($_SESSION['nombre_usuario'])) {
                        echo '<p>Bienvenido Jugador ' . $_SESSION['nombre_usuario'] . '</p>';
                    }
                ?>
            </div>
            <div class="redes-sociales-movil">
                <a href="https://wa.me/5218441752822?text=¡Hola!%20Vi%20su%20sitio%20Squid%20Game%20Fans%20y%20quiero%20recibir%20información%20sobre%20nuevos%20artículos%20o%20colaboraciones.%20Gracias."><img src="assets/img/WhatsApp.png" alt="WhatsApp"></a>
                <a href="https://www.facebook.com/squidgamenetflix/"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://www.instagram.com/squidgamenetflix/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </ul>
    </nav>

    <div class="fondo-menu-movil" id="fondoMenuMovil"></div>

 <div class="seccion-temporada">
    <h1>Squid Game - Temporada 2</h1>

    <p>
      En la segunda temporada de <strong>Squid Game</strong>, Seong Gi-hun regresa con un nuevo propósito: exponer la organización detrás del juego. Mientras tanto, una nueva ronda de jugadores desesperados es arrastrada al cruel torneo, enfrentando juegos más complejos, traiciones inesperadas y dilemas morales más intensos. La serie profundiza en el pasado de los organizadores y revela más sobre los vigilantes enmascarados, ampliando el mundo del juego.
    </p>

    <iframe class="video-temporada" src="https://www.youtube.com/embed/Oh_B9Ejvn-8" allowfullscreen></iframe>
  </div>

  <div class="seccion-jugadores">
    <h2>Jugadores principales</h2>
    <input class="buscador" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Buscar jugador por nombre o número...">

    <table id="playerTable">
      <thead>
        <tr>
          <th>Número</th>
          <th>Nombre</th>
          <th>Ocupación</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>456</td>
          <td>Seong Gi-hun</td>
          <td>Exjugador</td>
          <td>Ahora con el cabello teñido de rojo, Gi-hun regresa decidido a destruir el juego desde adentro.</td>
        </tr>
        <tr>
          <td>000</td>
          <td>Nuevo Front Man</td>
          <td>Líder del juego</td>
          <td>Tras los eventos de la primera temporada, se revela más sobre su identidad y motivaciones.</td>
        </tr>
        <tr>
          <td>132</td>
          <td>Park Ji-hoon</td>
          <td>Empleado bancario</td>
          <td>Participa para cubrir las deudas de su familia tras un fraude financiero.</td>
        </tr>
        <tr>
          <td>211</td>
          <td>Choi Min-seo</td>
          <td>Influencer</td>
          <td>Busca fama y atención, pero no está preparada para lo brutal del juego.</td>
        </tr>
        <tr>
          <td>089</td>
          <td>Lee Do-hyun</td>
          <td>Estudiante universitario</td>
          <td>Se inscribió creyendo que el juego era falso, pero queda atrapado en su crueldad.</td>
        </tr>
        <tr>
          <td>275</td>
          <td>Kim Hana</td>
          <td>Madre soltera</td>
          <td>Decidida a sobrevivir por su hijo enfermo, muestra gran valentía.</td>
        </tr>
        <tr>
          <td>050</td>
          <td>Jung Woo-sik</td>
          <td>Exsoldado</td>
          <td>Calculador, frío y estratégico. Uno de los jugadores más peligrosos del grupo.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    function searchTable() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const rows = document.querySelectorAll("#playerTable tbody tr");

      rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(" ");
        row.style.display = rowText.includes(input) ? "" : "none";
      });
    }
  </script>

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