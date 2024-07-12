
<?php

$mysqli = new mysqli('localhost', 'root', '', 'viajesbd');

if ($mysqli->connect_error) {
    echo 'Error de Conexión ' . $mysqli->connect_error;
    exit;
}

?>