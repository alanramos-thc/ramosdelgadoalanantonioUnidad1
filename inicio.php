<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/squid-game-logo.svg" rel="icon">
    <title>SquidGameFans</title>
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
            <li><a class="item-menu-activo" href="inicio.php">Inicio</a></li>
            <li><a href="temporada_1.php">Temporada 1</a></li>
            <li><a href="temporada_2.php">Temporada 2</a></li>
            <li><a href="#" class="item-menu-inactivo">Temporada 3</a></li>
            <li><a href="#contactenos">Contáctenos</a></li>
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

    <section class="seccion-video">
        <video src="assets/video/banner-video.mp4" autoplay loop muted></video>
    </section>

    <section class="seccion-cuenta-regresiva">
        <div class="informacion-cuenta-regresiva">
            <h1>FALTAN</h1>
        </div>
        <div class="cuenta-regresiva">
            <div class="cuenta-regresiva-dias"> 
                <div class="cuenta-regresiva-numeros">
                    <h1 id="dias">00</h1>
                </div>
                <div class="cuenta-regresiva-titulo">
                    <h1>DÍAS</h1>
                </div>
            </div>
            <div class="cuenta-regresiva-horas"> 
                <div class="cuenta-regresiva-numeros">
                    <h1 id="horas">00</h1>
                </div>
                <div class="cuenta-regresiva-titulo">
                    <h1>HORAS</h1>
                </div>
            </div>
            <div class="cuenta-regresiva-minutos"> 
                <div class="cuenta-regresiva-numeros">
                    <h1 id="minutos">00</h1>
                </div>
                <div class="cuenta-regresiva-titulo">
                    <h1>MINUTOS</h1>
                </div>
            </div>
            <div class="cuenta-regresiva-segundos">
                <div class="cuenta-regresiva-numeros">
                    <h1 id="segundos">00</h1>
                </div>
                <div class="cuenta-regresiva-titulo">
                    <h1>SEGUNDOS</h1>
                </div>
            </div>
        </div>
        <div class="informacion-cuenta-regresiva">
            <h1>PARA EL ESTRENO DE LA TERCER TEMPORADA</h1>
        </div>
    </section>

    <section class="seccion-nuevo-trailer">
      <div class="titulo-nuevo-trailer">
        <h1>¡Ya está aquí el nuevo tráiler de Squid Game!</h1>
      </div>
      <div class="contenido-nuevo-trailer">
        <div class="informacion-nuevo-trailer">
            <p>El fenómeno mundial regresa y las apuestas son más altas que nunca. 
                Netflix ha lanzado un nuevo tráiler de la nueva temporada de Squid Game, 
                y no podríamos estar más emocionados.</p>
        </div>
        <div class="video-nuevo-trailer">
            <iframe 
                src="https://www.youtube.com/embed/-0Fr1blovx8" 
                title="Tráiler oficial de Squid Game" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
      </div>
    </section>

    <section class="seccion-que-es-squid-game">
        <div class="titulo-que-es-squid-game">
            <h1>¿Qué es Squid Game?</h1>
        </div>  
        <div class="contenido-que-es-squid-game">
            <div class="informacion-que-es-squid-game">
                <p>El juego del calamar (Squid Game) es una serie surcoreana de suspenso y
                     supervivencia creada por Hwang Dong-hyuk. Estrenada en Netflix en septiembre
                      de 2021, la trama sigue a 456 participantes con graves problemas financieros
                       que aceptan una invitación para competir en juegos infantiles tradicionales
                        con consecuencias mortales. El ganador se lleva un premio de 
                        ₩45.600 millones (aproximadamente 38 millones de dólares). 
                        La serie se convirtió en un fenómeno global, siendo la más vista de Netflix 
                        en 94 países y atrayendo a más de 142 millones de hogares miembros en sus 
                        primeras cuatro semanas. Ha recibido numerosos galardones, incluidos premios 
                        Emmy y Globo de Oro .</p>
            </div>
            <div class="cartel-temporada-uno">
                <img src="assets/img/cartel-temporada-uno.jpg" alt="Temporada 1">
            </div>
        </div>  
    </section>

        <section class="seccion-temporadas">
        <div class="titulo-temporadas">
            <h1>Temporadas</h1>
        </div>  
        <div class="contenido-temporadas">
            <a href="temporada_1.php">
            <div class="card-temporada">
                <img src="assets/img/temporada-uno.webp" alt="Temporada 1">
                <div class="card-temporada-titulo">Temporada 1</div>
            </div>
            </a>
            <a href="temporada_2.php">
                <div class="card-temporada">
                    <img src="assets/img/temporada-dos.webp" alt="Temporada 2">
                    <div class="card-temporada-titulo">Temporada 2</div>
                </div>
             </a>
            <div class="card-temporada">
                <img src="assets/img/temporada-tres.webp" alt="Temporada 3">
                <div class="card-temporada-titulo">Temporada 3</div>
            </div>
        </div>  
    </section>

    <section class="seccion-juegos">
        <div class="titulo-juegos">
            <h1>Juegos</h1>
        </div>  
        <div class="juegos">
            <div class="juego">
            <img src="assets/img/ddakji.webp" alt="Ddakji">
            <div class="juego-contenido">
                <h3>Ddakji</h3>
                <p>Juego inicial donde los participantes intentan voltear una carta de papel del oponente lanzando la suya sobre ella.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/luz-verde-luz-roja.jpg" alt="Luz Roja, Luz Verde">
            <div class="juego-contenido">
                <h3>Luz Roja, Luz Verde</h3>
                <p>Los jugadores deben avanzar cuando se dice "Luz verde" y detenerse en "Luz roja". Si se mueven durante "Luz roja", son eliminados.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/ppopgi.png" alt="Ppopgi">
            <div class="juego-contenido">
                <h3>Ppopgi</h3>
                <p>Los jugadores deben cortar una figura de un dulce sin romperla.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/tira-y-afloja.jpg" alt="Tira y Afloja">
            <div class="juego-contenido">
                <h3>Tira y Afloja</h3>
                <p>Equipos compiten en una cuerda, tratando de derribar al equipo contrario.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/canicas.webp" alt="Canicas">
            <div class="juego-contenido">
                <h3>Canicas</h3>
                <p>Los jugadores deben ganar canicas a sus oponentes mediante diversos juegos.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/puente-de-cristal.jpg" alt="Puente de Cristal">
            <div class="juego-contenido">
                <h3>Puente de Cristal</h3>
                <p>Los jugadores deben cruzar un puente con paneles de vidrio, algunos de los cuales son frágiles.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/el-juego-del-calamar.png" alt="El Juego del Calamar">
            <div class="juego-contenido">
                <h3>El Juego del Calamar</h3>
                <p>Juego final donde los participantes deben atravesar un campo dividido en áreas específicas, enfrentándose entre sí.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/pentatlon-de-seis-patas.jpg" alt="Pentatlón de Seis Patas">
            <div class="juego-contenido">
                <h3>Pentatlón de Seis Patas</h3>
                <p>Equipos de cinco jugadores atados por las piernas deben completar mini-juegos en un tiempo limitado.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/mingle.webp" alt="Mingle">
            <div class="juego-contenido">
                <h3>Mingle</h3>
                <p>Los jugadores deben formar grupos de un número específico y entrar en habitaciones correspondientes antes de que se acabe el tiempo.</p>
            </div>
            </div>
            <div class="juego">
            <img src="assets/img/juego-especial.jpg" alt="Juego Especial">
            <div class="juego-contenido">
                <h3>Juego Especial</h3>
                <p>Durante la noche, los jugadores pueden atacarse entre sí, aumentando la tensión y el peligro.</p>
            </div>
            </div>
        </div>
    </section>

    <section class="seccion-sorteo">
      <p class="informacion-sorteo">¡Participa en el sorteo de una cuenta de Netflix! El ganador será anunciado el 26 de junio. ¡No te lo pierdas!</p>
      
        <?php
            if (isset($_SESSION['errorSorteo'])) {
                echo '<p class="error-mensaje-sorteo">' . $_SESSION['errorSorteo'] . '</p>';
                unset($_SESSION['errorSorteo']);
            }
        ?>
      <div>
        <form action="backend/participar-sorteo.php" method="post" class="correo-sorteo">
                <input type="email" name="correo_electronico_sorteo" id="correoElectronicoSorteo" required>
                <button type="submit">Participar</button>
        </form>
      </div>
    </section>

    <section class="seccion-faq">
        <div class="titulo-faq">
            <h1>Preguntas Frecuentes</h1>
        </div>  
        <div class="faq-container">
            <div class="faq-item">
            <div class="faq-question">¿Qué es Squid Game?</div>
            <div class="faq-answer">
                <p>Es una serie surcoreana de Netflix donde personas con deudas participan en juegos infantiles mortales para ganar una gran suma de dinero.</p>
            </div>
            </div>
            <div class="faq-item">
            <div class="faq-question">¿Cuántas temporadas tiene Squid Game?</div>
            <div class="faq-answer">
                <p>Hasta ahora tiene 2 temporadas. La primera fue lanzada en 2021 y la segunda en 2024.</p>
            </div>
            </div>
            <div class="faq-item">
            <div class="faq-question">¿Qué tipo de juegos aparecen en la serie?</div>
            <div class="faq-answer">
                <p>Juegos infantiles coreanos como "Luz Roja, Luz Verde", juegos de canicas, tirar de la cuerda, entre otros, pero con consecuencias letales.</p>
            </div>
            </div>
            <div class="faq-item">
            <div class="faq-question">¿Quién es el protagonista de la historia?</div>
            <div class="faq-answer">
                <p>Seong Gi-hun, un hombre endeudado que entra a la competencia para ganar dinero y resolver sus problemas personales.</p>
            </div>
            </div>
            <div class="faq-item">
            <div class="faq-question">¿Está basada en hechos reales?</div>
            <div class="faq-answer">
                <p>No, aunque toma inspiración de desigualdades sociales reales, Squid Game es completamente ficticia.</p>
            </div>
            </div>
        </div>
    </section>

    <section class="seccion-contactenos-pagina" id="contactenos">
            <div class="contenedor-contactenos-pagina">
            <div class="formulario-contactenos-pagina">
                <form action="backend/enviar-correo-de-contacto.php" method="post">
                    <div class="nombre-correo-electronico">
                        <div class="nombre">
                            <label for="nombre">Nombre<span>*</span></label><br>
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                        <div class="correo-electronico">
                            <label for="correoElectronico">Correo Electrónico<span>*</span></label><br>
                            <input type="email" name="correo_electronico" id="correoElectronico" required>
                        </div>
                    </div>
                    <div class="telefono">
                        <label for="telefono">Télefono<span>*</span></label><br>
                        <input type="tel" name="telefono" id="telefono" pattern="^\d{10}$" 
                        title="El número de teléfono debe tener exactamente 10 dígitos." required>
                    </div>
                    <div class="mensaje">
                        <label for="mensaje">Mensaje<span>*</span></label><br>
                        <textarea name="mensaje" id="mensaje" required></textarea>
                    </div>
                    <button type="submit">Enviar</button>
                </form>
            </div>
            <div class="en-que-podemos-ayudarte">
                <h2>Contáctenos</h2>
                <img src="assets/img/contact.jpg" alt="Contáctenos" loading="lazy">
            </div>
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
                <li><a href="#contactenos"><i class="fa-solid fa-caret-right"></i> Contáctenos</a></li>
    
                            <?php
                if (isset($_SESSION['id_usuario'])) {
                    echo '<li><a href="backend/cerrar_sesion.php"><i class="fa-solid fa-caret-right"></i> Cerrar Sesión</a></li>';
                }
                else {
                    echo '<li><a href="iniciar_sesion.php"><i class="fa-solid fa-caret-right"></i> Iniciar Sesión</a></li>';
                    echo '<li><a href="registrarse.html"><i class="fa-solid fa-caret-right"></i> Registrarse</a></li>';
                }
            ?>
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

    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/684fc0e157eabb190a266566/1itrois74';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
</body>
</html>

<script src="assets/js/script.js"></script>