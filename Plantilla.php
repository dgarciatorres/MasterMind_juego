<?php
spl_autoload_register(function ($class) {
    require "$class.php";
});
$colores = Clave::COLORES;

class Plantilla
{
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
                            <option >Color</option>
                        FIN;
            foreach ($colores as $color) {
                $formulario .= "<option class = '$color' value = '$color'>$color</option>";
            }
            $formulario .= " </select>";
        }
        $formulario .= <<<FIN
                    <br />
                    <input class="btn-norm" type ='submit' name='submit' value='Jugar' />
                </form>
            </fieldset>
            FIN;
        return $formulario;
    }

    //Mostrar la relación de jugadas efectuadas.
    // metodo: generaInformeJugada()

    //Mostrar informe de resultado de la partida.
    // metodo: generaInformeresultado()

}


