<?php
spl_autoload_register(function ($clase){
    require ("$clase.php");
});

//$clave = $_SESSION['clave'];

class Jugada {

    public $jugada;
    public $colores_acertados = 0;
    public $posiciones_acertadas = 0;

    function __construct($colores,$clave)
    {
        $claveaux = array_merge($clave);
        $this->jugada= $colores;

        // si esta
        // si esta en la posición correcta
        // 2 array -->

        for ($i=0; $i < 4; $i++){
            for ($j=0; $j < count($claveaux); $j++){
                if ($colores[$i] == $claveaux[$j]){
                    $this->colores_acertados++;
                    unset($claveaux[$j]);
                    sort($claveaux);
                    print_r($claveaux);
                    break;
                }
            }
        }
        for ($i=0; $i < 4; $i++){
            if ($colores[$i] == $clave[$i]){
                $this->posiciones_acertadas++;
            }
        }
    }

    // cada jugada recoge los cuatro colores de la jugada
    public static function leer_jugada() {
        for ($i = 0; $i < 4; $i++)
            $jugada[] = $_POST["combinacion$i"];
        return $jugada;
    }

    // metodo: evaluaJugada() --> se le pasa la selección de colores --> tiene que tener acceso a la clave
    public static function  valida_jugada(){

    }
    // entero de numero de posiciones acertadas que va a ser menor o igual al numero de colores que he acertado
    public static function comprobar_jugada(){

    }

    //        $jugada_actual = actualizar_jugada($jugada_actual);
    //        $array_jugada_actual = leer_jugada();
    //        //Guardamos la jugada con el número de jugada en la sesión
    //        $_SESSION['jugada'][$jugada_actual] = $array_jugada_actual;
    //        $comparacion = comparar_jugada($array_jugada_actual, $array_claves, $jugada_actual);
    //        $colores_coinciden = actualizar_colores($comparacion, $jugada_actual);
    //        $posiciones_coinciden = actualizar_posiciones($comparacion, $jugada_actual);
    //        comprobar_fin_juego($jugada_actual);
}