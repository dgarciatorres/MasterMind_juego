<?php
spl_autoload_register(function ($clase){
    require ("$clase.php");
});


class Jugada {

    public $jugada;
    public $colores_acertados = 0;
    public $posiciones_acertadas = 0;

    function __construct($colores,$clave)
    {
        $claveaux = array_merge($clave);
        $this->jugada= $colores;

        // comprobamos los colores acertados
        for ($i=0; $i < 4; $i++){
            for ($j=0; $j < count($claveaux); $j++){
                if ($colores[$i] == $claveaux[$j]){
                    $this->colores_acertados++;
                    unset($claveaux[$j]);
                    sort($claveaux);
                    break;
                }
            }
        }

        // comprobamos las posiciones acertaadas
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

}