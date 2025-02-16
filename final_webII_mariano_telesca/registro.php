<?php

    session_start();

    // Si ya hay un logueo activo, se redirige (el admin al panel administrador y el user a la pág principal
    if (isset($_SESSION['sesion']) && $_SESSION['sesion'] == true) {
        if ($_SESSION['tipo_admin'] == 1) {
            header("Location: administrador.php");
        } else {
            header("Location: index.php");
        }
        exit();
    }

    // Acá se carga el head desde un archivo externo
    require_once('secciones/head.php');
    titulo_pag("Registrarse");
    require_once('funciones/registrarse.php');
?>

<body class="cuerpo">

    <div class="container">

        <?php
            // Acá se carga el header desde un archivo externo
            include_once('secciones/header.php');
        ?>

        <?php if (!empty($errors_register)): ?>
            <ul>
            <?php foreach($errors_register as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <main class="container">
            <div class="row">
                <form method="post" id="form_registro" class="form">
                    <div>
                        <label for="nombre_nuevo_usuario">Ingrese un nombre de usuario</label>
                        <input name="nombre_nuevo_usuario" type="text" id="nombre_nuevo_usuario" class="form_input">
                    </div>

                    <div>
                        <label for="contrasenia_nuevo_usuario">Introduzca su Contraseña</label>
                        <input type="password" name="contrasenia_nuevo_usuario" id="contrasenia_nuevo_usuario" class="form_input"></input>
                    </div>

                    <div>
                        <label for="contrasenia_nuevo_usuario_2">Repita su Contraseña</label>
                        <input type="password" name="contrasenia_nuevo_usuario_2" id="contrasenia_nuevo_usuario_2" class="form_input"></input>
                    </div>

                    <button type="submit" class="form_boton">Registrarse</button>

                </form>
            </div>
        </main>

        <?php
            // Acá se carga el footer desde un archivo externo
            include_once('secciones/footer.php');
        ?>

    </div>

    
    <?php //Cargo el CDN de Bootstrap JS desde un archivo externo
        require_once('secciones/bootstrapjs.php'); ?>

</body>
</html>