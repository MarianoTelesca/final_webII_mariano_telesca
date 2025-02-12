<?php
// Acá se define el array con las secciones
$secciones = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Contacto" => "contacto.php", "Registrarse" => "registro.php", "Log In" => "login.php", "Admin" => "administrador.php"];
// $secciones = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Contacto" => "contacto.php"];
// $seccionesUsuario = []
?>

<!-- *** Acá se carga el header que será contenido en varias secciones *** -->
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
                    // Por cada sección definida en el array, se imprime un <li> para mostrar el menú
                    foreach($secciones as $seccion => $archivo){
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccion.'</a>
                        </li>';
                    };
                    ?>
                </ul>

                <!--
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                -->

                <!--
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    // Por cada sección definida en el array, se imprime un <li> para mostrar el menú
                    foreach($seccionesUsuario as $seccionUsuario => $archivo){
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccionUsuario.'</a>
                        </li>';
                    };
                    ?>
                </ul>
                -->
                
            </div>
        </div>
    </nav>
</header>