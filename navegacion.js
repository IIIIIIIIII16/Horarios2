let prevScrollPos = window.pageYOffset;

window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  if (prevScrollPos > currentScrollPos) {
    document.getElementById("barra-navegacion").style.top = "0";
  } else {
    document.getElementById("barra-navegacion").style.top = "-60px"; // Ajusta según la altura de tu barra de navegación
  }
  prevScrollPos = currentScrollPos;
}