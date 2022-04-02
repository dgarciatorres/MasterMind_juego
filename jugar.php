<?php
//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require "$class.php";
});

session_start();

$colores = Clave::COLORES;
$texto_informativo = "Escoja una opción";
$retorno = "Sin datos a mostrar";

if (!isset($_SESSION['jugadas'])) {
    $_SESSION['jugadas'] = array();
}

// si no existe la clave la creamos
if (!isset($_SESSION['clave'])) {
    $clave = Clave::obtener_clave($colores);
    $_SESSION['clave'] = $clave;
} else {
    $clave = $_SESSION['clave'];
}
// control de la opcion seleccionada por el usuario
$opcion = $_POST['submit'] ?? null;

// Mostramos y ocultamos el botón de mostar
if (isset($_POST['submit'])) {
    if (($_POST['submit']) == "Mostrar Clave") {
        $opcion_clave = 'Ocultar Clave';
        $opc_mostrar = Plantilla::mostrar_clave($clave);
    } else {
        $opcion_clave = 'Mostrar Clave';
        $opc_ocultar = 'Sin datos a mostrar';
    }
} else {
    $opcion_clave = 'Mostrar Clave';
}

// esta variable genere el interfaz para la selección de los colores
$formulario = Plantilla::mostrar_formulario_jugada($colores) ?? null;

// controlamos la opción seleccionada por el usuario
switch ($opcion) {
    case "Resetear clave":
        $clave = Clave::generar_clave($colores);
        $_SESSION['clave'] = $clave;
        $texto_informativo = "Se ha reseteado la clave";
        break;
    case "Jugar":
        $colores = [$_POST['combinacion0'], $_POST['combinacion1'], $_POST['combinacion2'], $_POST['combinacion3']];
        $colores_acertados = 0;
        $posiciones_acertadas = 0;
        $clave = $_SESSION['clave'];
        $jugada = new Jugada ($colores, $clave);
        array_push($_SESSION['jugadas'], $jugada);

        if ($jugada->posiciones_acertadas == 4 && $jugada->colores_acertados == 4) {
            header('Location:FinJuego.php?msj=Has ganado la partida');
        } elseif (count($_SESSION['jugadas']) > 14) {
            header('Location:FinJuego.php?msj=Se han acabado los intentos');
        }

        break;
    case "Mostrar Clave":
        $retorno = $opc_mostrar;
        break;
    case "Ocultar Clave":
        $retorno = $opc_ocultar;

    default: //Si no vengo del index, redericciono
}

$opc_ocultar = 'Si quieres ver el contenido de la clave pulsa en "Mostrar"';
$informe_jugadas = Plantilla::mostrar_informe() ?? null;
$historico_jugadas = Plantilla::mostrar_historico() ?? null;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="main.js"></script>
    <title>Juego Master Mind - Jugar</title>
</head>
<body>
<section class="container-info">
    <div class="col-info">
        <h2>OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <?= $texto_informativo ?><br>
                <input class="btn-norm" type='submit' name='submit' value='Resetear clave'/>
                <input class="btn-norm" type='submit' name='submit' value='<?php echo $opcion_clave ?>'/>
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <p>Debes seleccionar <strong>4 colores</strong> para jugar</p>
            <?= $formulario ?>
        </fieldset>
    </div>

    <div class="col-info">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <div class="container-selecion">
                <?= $retorno ?>
            </div>
            <hr>
            <?= $informe_jugadas ?>
            <hr>
            <?= $historico_jugadas ?>
        </fieldset>
    </div>
</section>
</body>

</html>
