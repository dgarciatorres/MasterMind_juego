function cambia_color(numero) {
    color = document.getElementById("combinacion" + numero).value;
    elemento = document.getElementById("combinacion" + numero);
    elemento.className = color;
}