<?php
//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require "$class.php";
});
session_start();

$colores = Clave::COLORES;
$texto_informativo = "Escoja una opción";
$formulario = Plantilla::mostrar_formulario_jugada($colores) ?? null;
$opc_ocultar = 'Si quieres ver el contenido de la clave pulsa en "Mostrar"';
$retorno = $opc_ocultar ?? null;

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
if (($_POST['submit']) == "Mostrar Clave") {
    $opcion_clave = 'Ocultar Clave';
    $opc_mostrar = Plantilla::mostrar_clave($clave);
} else {
    $opcion_clave = 'Mostrar Clave';
}

// controlamos la opción seleccionada por el usuario
switch ($opcion) {
    case "Resetear clave":
        $clave = Clave::generar_clave($colores);
//        $clave::guardar_clave($colores);
        $texto_informativo = "Se ha reseteado la clave";
        ///....
        exit;
    case "Jugar":
//        $jugada = new Jugada ($_POST['combinacion']);
//        $texto_informativo=$jugada->valida_jugada();
        break;
    case "Mostrar Clave":
        $retorno = $opc_mostrar;
        break;
    case "Ocultar Clave":
        $retorno = $opc_ocultar;

    default: //Si no vengo del index, redericciono

}
var_dump($clave);
var_dump($opcion);

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
            <?=$formulario?>
        </fieldset>

    </div>

    <div class="col-info">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <div class="container-selecion">
                <?= $retorno ?>
            </div>
        </fieldset>
    </div>
</section>
</body>

</html>
