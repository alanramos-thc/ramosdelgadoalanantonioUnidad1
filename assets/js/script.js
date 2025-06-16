document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.getElementById('hamburger');
  const menu = document.getElementById('menu');
  const navbar = document.getElementById('navbar');
  const fondoMenuMovil = document.getElementById('fondoMenuMovil');
  const icono = hamburger.querySelector('i');

  function alternarMenu() {
      if (menu.classList.contains('activo')) {
          menu.classList.remove('activo');
          setTimeout(() => {
              menu.style.visibility = 'hidden'; 
              menu.style.opacity = '0';
          }, 200); 
          
          icono.classList.remove('fa-times');
          icono.classList.add('fa-bars');
      } else {
          menu.style.visibility = 'visible';
          menu.style.opacity = '1';
          menu.classList.add('activo');

          icono.classList.remove('fa-bars');
          icono.classList.add('fa-times');
      }

      navbar.classList.toggle('activo');
      fondoMenuMovil.classList.toggle('activo');
  }

  function restablecerMenuEnElEscritorio() {
      if (window.innerWidth > 1200) {
          menu.classList.remove('activo');
          menu.style.visibility = '';
          menu.style.opacity = '';
          menu.style.transform = '';
          menu.style.flexDirection = '';
          
          icono.classList.remove('fa-times');
          icono.classList.add('fa-bars');
          
          navbar.classList.remove('activo');
          fondoMenuMovil.classList.remove('activo');
      }
  }

  hamburger.addEventListener('click', alternarMenu);

  window.addEventListener('resize', restablecerMenuEnElEscritorio);

  restablecerMenuEnElEscritorio();
    const fechaDestino = new Date('June 27, 2025 00:00:00').getTime();

    function actualizarCuentaRegresiva() {
        const ahora = new Date().getTime();
        const diferencia = fechaDestino - ahora;

        const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
        const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
        const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

        document.getElementById('dias').innerHTML = dias < 10 ? '0' + dias : dias;
        document.getElementById('horas').innerHTML = horas < 10 ? '0' + horas : horas;
        document.getElementById('minutos').innerHTML = minutos < 10 ? '0' + minutos : minutos;
        document.getElementById('segundos').innerHTML = segundos < 10 ? '0' + segundos : segundos;


        if (diferencia <= 0) {
            clearInterval(intervalo);
        }
    }


    const intervalo = setInterval(actualizarCuentaRegresiva, 1000);

    const items = document.querySelectorAll('.faq-item');

    items.forEach(item => {
      item.querySelector('.faq-question').addEventListener('click', () => {
        item.classList.toggle('active');
      });
    });
});
