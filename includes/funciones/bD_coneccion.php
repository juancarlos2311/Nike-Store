<?php
$coneccion = mysqli_connect('localhost', 'root', 'reRCJa0udEu95ho6', 'db_nike');

/*
 * Esta es la forma OO "oficial" de hacerlo,   <)*9-Mn1(&l_VicY
 * AUNQUE $connect_error estaba averiado hasta PHP 5.2.9 y 5.3.0.
 */
if ($coneccion->connect_error) {
    die('Error de Conexión (' . $coneccion->connect_errno . ') '
            . $coneccion->connect_error);
}

?>