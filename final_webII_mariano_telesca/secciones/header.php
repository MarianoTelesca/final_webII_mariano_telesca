<?php

    // Si no hay un session start en el archivo desde donde se llama a este, entonces se crea uno. Si ya hay un session_start, se sigue
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Acá se define el array con las secciones, según el tipo de usuario
    $seccionesAdmin = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Admin" => "administrador.php"];
    $secciones = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Contacto" => "contacto.php"];

    // Incluyo una función creada aparte donde solo pasó que array usará para crear el menú según  quien inicio sesión
    include_once('./funciones/header_secciones.php');

    include_once('./funciones/cerrar_sesion.php');
?>

<!-- Acá se carga el header que será contenido en varias secciones -->
<header class="container">
    <nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary border-bottom border-bottom-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" alt="Logo de la empresa" height="50" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                        if(isset($_SESSION['sesion']) && $_SESSION['sesion'] == true){

                            if(isset($_SESSION['tipo_admin']) && $_SESSION['tipo_admin'] == 1){
                                header_secciones($seccionesAdmin);
                            }

                            if(isset($_SESSION['tipo_admin']) && $_SESSION['tipo_admin'] == 0){
                                header_secciones($secciones);
                            }

                        }else{
                            header_secciones($secciones);
                        }
                    ?>
                </ul> 
                
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php
                        // Si el usuario no está logueado, ponemos los botones de login y registrar del lado derecho
                        if (!isset($_SESSION['sesion']) || $_SESSION['sesion'] != true) {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registro.php">Registrarse</a>
                            </li>';
                        }else{
                            echo '<li class="nav-item"><form method="POST">
                                    <button type="submit" name="cerrar_sesion" class="btn btn-outline-light">Cerrar sesión</button>
                                </form></li>';
                        }
                    ?>
                </ul>
                
            </div>
        </div>
    </nav>
</header>