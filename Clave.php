<?php

class Clave
{
    const COLORES = ['Azul', 'Rojo', 'Amarillo', 'Verde', 'Rosa', 'Blanco', 'Negro', 'Morado', 'Marron', 'Naranja'];

    /**
     * @return array que es la clave con 4 colores
     * Usamos el modo array_rand que me devuelve un número aleatorio de indices no repetidos de un array
     */
    public static function obtener_clave($colores)
    {
        $clave = [];
        $posiciones = array_rand($colores, 4);
        for ($i = 0; $i < 4; $i++) {
            $pos = $posiciones[$i];
            $color = $colores[$pos];
            $clave[] = $color;
        }
        return $clave;
    }

    public static function generar_clave($colores)
    {
        session_destroy();
        $clave = [];
        $posiciones = array_rand($colores, 4);
        for ($i = 0; $i < 4; $i++) {
            $pos = $posiciones[$i];
            $color = $colores[$pos];
            $clave[] = $color;
        }
        return $clave;
    }

    function guardar_clave()
    {
    }
}
