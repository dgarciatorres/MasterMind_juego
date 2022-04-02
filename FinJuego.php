<?php
//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require "$class.php";
});
session_start();
$historico_jugadas = Plantilla::mostrar_historico() ?? null;
$clave_actual = Plantilla::mostrar_clave($_SESSION['clave']);

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
        <h2><?= $_GET['msj'] ?></h2>
        <fieldset>
            <legend>Fin de la partida</legend>
            <h3>Valor de la clave:</h3>
            <div class="container-selecion">
                <?= $clave_actual?>
            </div>
            <hr>
            <h3>Acertada la clave en <span class="destacado"><?= count($_SESSION['jugadas']). " intentos"; ?></span></h3>
            <hr>
            <?= $historico_jugadas?>
            <hr>
            <form action="index.php" method="POST">
                <input class="btn-norm" type="submit" name="submit" value="Volver al index">
            </form>
        </fieldset>
    </div>
</section>
</body>
</html>
