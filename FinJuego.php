<?php
//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require "$class.php";
});

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        echo $_GET['msj'];
        echo count($_SESSION['jugadas']). " intentos";
        $jugadas = $_SESSION['jugadas'];
        foreach ($jugadas as $clave=>$jugada) {
            echo "<br>";
            echo '<h1>'. $jugada->posiciones_acertadas .'</h1>';
            echo '<h1>'. $jugada->colores_acertados .'</h1>';
            echo '<h1>'. $jugada->jugada[0] .'</h1>';
            echo '<h1>'. $jugada->jugada[1] .'</h1>';
            echo '<h1>'. $jugada->jugada[2] .'</h1>';
            echo '<h1>'. $jugada->jugada[3] .'</h1>';
        }
    ?>
</body>
</html>
