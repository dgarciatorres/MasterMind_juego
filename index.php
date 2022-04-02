<?php
include "funciones.php";
eliminar_sesiones();
session_destroy();
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Juego Master Mind - inicio</title>
</head>
<body>
<section class="container-info">
    <div class="col-info">
        <fieldset>
            <h1>Descripción del Juego Master Mind</h1>
            <hr>
            <ol>
                <li>Esta es una presentación personalizada del juego</li>
                <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes</li>
                <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos</li>
                <li>En total el usuario tendrá 14 intentos para adivinar la clave</li>
                <li>En cada jugada la app informará
                    <ul>
                        <li>cuantos colores ha acertado el usuario de la clave.</li>
                        <li>cuantos de estos colores están en la posición correcta.</li>
                    </ul>
                </li>
                <li>No se especificará cuáles son las posiciones acertadas en caso de acierto.</li>
            </ol>
            <hr>
            <form action="jugar.php" method="post">
                <input class="btn-norm" type="submit" value="Jugar">
            </form>
        </fieldset>
    </div>
    <section>
</body>
</html>
