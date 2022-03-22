<?php
// iniciamos la sesion
session_start();

spl_autoload_register(function ($clase){
    require ("$clase.php");
});

class Jugada {
    // cada jugada recoge los cuatro colores de la jugada
    // metodo: evaluaJugada() --> se le pasa la selección de colores --> tiene que tener acceso a la clave
    // entero de numero de posiciones acertadas que va a ser menor o igual al numero de colores que he acertado

}