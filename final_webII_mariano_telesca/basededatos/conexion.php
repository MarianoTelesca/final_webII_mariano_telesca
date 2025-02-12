<?php
require_once 'basededatos/config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>