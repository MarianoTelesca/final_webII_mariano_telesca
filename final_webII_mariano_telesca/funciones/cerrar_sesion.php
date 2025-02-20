<?php

    // Acá, si se apreta el botón de cerrar sesión, se destruye la session y se redirige al index
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cerrar_sesion'])) {
        session_start();
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 3600, '/');
        header("Location: index.php");
        exit;
    }

?>
