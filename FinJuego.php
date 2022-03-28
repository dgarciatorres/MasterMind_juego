<?php
//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require "$class.php";
});

session_start();

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
        <h2><?= $_GET['msj'] ?></h2>
        <fieldset>
            <legend>Fin de la partida</legend>
            <?= count($_SESSION['jugadas']). " intentos"; ?>
            <hr>
            <?= $historico_jugadas?>
        </fieldset>
    </div>
</section>
</body>
</html>
