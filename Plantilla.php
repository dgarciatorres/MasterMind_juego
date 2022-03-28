<?php
spl_autoload_register(function ($class) {
    require "$class.php";
});

$colores = Clave::COLORES;

class Plantilla {

    //Mostrar / ocultar la clave.
    public static function mostrar_clave($clave)
    {
        $retorno = " ";
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
                $formulario .= "<option class = ' $color' value = '$color'>$color</option>";
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

    // Método para mostrar el informe de la jugada
    public static function mostrar_informe(){
        $num_jugada = count($_SESSION['jugadas']);
        $informe_jugadas = "<h3>Jugada actual " . $num_jugada. "</h3>";
        $informe_jugadas .= "<h3>Resultado: " . $_SESSION['jugadas'][count($_SESSION['jugadas'])-1]->colores_acertados . " colores y ". $_SESSION['jugadas'][count($_SESSION['jugadas'])-1]->posiciones_acertadas .  " posiciones</h3>";
        return $informe_jugadas;
    }

    //Mostrar la relación de jugadas efectuadas.
    public static function mostrar_historico(){
        $jugadas = $_SESSION['jugadas'];
        $historico_jugadas = "<h3>Histórico de jugadas</h3>";
        var_dump($_SESSION['jugadas']);
        foreach ($_SESSION['jugadas'] as $clave=>$jugada){
            // determinar que pintamos las colores y posiciones
            $historico_jugadas .= "<span class='cir_acert colores_acertados'>" . $jugada->colores_acertados . "</span> <span class='cir_acert posiciones_acertadas'>" . $jugada->posiciones_acertadas . "</span>";
            foreach ($jugada->jugada as $clave_jugada=>$color){
                $historico_jugadas .= "<span class=$color>$color</span>";
            }
            $historico_jugadas .= "<br>";
        }
        return $historico_jugadas;
    }

    //Mostrar informe de resultado de la partida.
    // metodo: generaInformeresultado() {
    //}

}


