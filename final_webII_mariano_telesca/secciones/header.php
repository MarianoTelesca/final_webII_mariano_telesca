<?php
// Acá se define el array con las secciones, según el tipo de usuario
$seccionesSinLoguear = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Contacto" => "contacto.php", "Registrarse" => "registro.php", "Log In" => "login.php"];
$seccionesAdmin = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Admin" => "administrador.php"];
$seccionesUsuario = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Contacto" => "contacto.php"];

session_start();
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
                        if(isset($_SESSION['sesion']) && $_SESSION['sesion'] == true){

                            if(isset($_SESSION['tipo_admin']) && $_SESSION['tipo_admin'] == 1){
                                //En caso haber iniciada sesión y que el tipo_admin sea positivo, por cada sección definida en el array correspondiente, se imprime un <li> para mostrar el menú
                                foreach($seccionesAdmin as $seccion => $archivo){
                                    echo '
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccion.'</a>
                                    </li>';
                                };
                            }

                            if(isset($_SESSION['tipo_admin']) && $_SESSION['tipo_admin'] == 0){
                                //En caso haber iniciada sesión y que el tipo_admin sea negativo, osea es un usuario común, por cada sección definida en el array correspondiente, se imprime un <li> para mostrar el menú
                                foreach($seccionesUsuario as $seccion => $archivo){
                                    echo '
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccion.'</a>
                                    </li>';
                                };
                            }

                        }else{
                            // En caso de no haber iniciada sesión, por cada sección definida en el array, se imprime un <li> para mostrar el menú
                            foreach($seccionesSinLoguear as $seccion => $archivo){
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccion.'</a>
                                </li>';
                            };
                        }
                    ?>
                </ul>                
            </div>
        </div>
    </nav>
</header>