<?php
spl_autoload_register(function ($class) {
    require "$class.php";
});

$colores = Clave::COLORES;

// esta clase todo lo qeu tiene que ver con la interfaz gráfica --> generar un formulario

class Plantilla
{
    //Imprime en varios badges el color y la posicion de los colores de la clave
//    function mostrar_clave($clave)
//    {
//        echo '<div class="container caja_clave">';
//        echo '<h4>Clave Actual</h4>';
//        foreach ($clave as $pos => $color) {
//            echo '<div class="badge pildora ' . $color . '"><h3><span class="badge bg-warning ms-2">' . ($pos + 1) . '</span> ' . $color . '</h3></div>';
//        }
//        echo "<div/>";
//    }

    //Mostrar / ocultar la clave.
    public static function mostrar_clave($clave)
    {
        foreach ($clave as $color) {
            $retorno .= "<div class=$color>$color</div>";
        }
        return $retorno;
    }

    //Mostrar formulario de jugadas
    public static function mostrar_formulario_jugada($colores)
    {
        $formulario = "<form method = 'POST' action = 'jugar.php'>";

        for ($i = 0; $i < 4; $i++) {
            $formulario .= <<<FIN
                            <select id = 'combinacion$i' name = 'combinacion$i' onchange = cambia_color($i)>
                            <option >Ver colores</option>
            FIN;
            foreach ($colores as $color) {
                $formulario .= "<option class = '$color' value = '$color'>$color</option>";
            }
            $formulario .= " </select>";
        }
        $formulario .= <<<FIN
             <br />
             <input class="btn-norm" type = 'submit' name = 'jugar' value = 'Jugar' />
            </form></fieldset>
            FIN;
        return $formulario;
    }

    //Mostrar la relación de jugadas efectuadas.
    // metodo: generaInformeJugada()

    //Mostrar informe de resultado de la partida.
    // metodo: generaInformeresultado()

}


