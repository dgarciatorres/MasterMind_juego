<?php

// Función que nos permite eliminar las sesiones generadas

    function eliminar_sesiones() {
        if (isset($_SESSION['clave'])) {
            session_destroy();
        } else {
            session_start();
        }
    }

?>
