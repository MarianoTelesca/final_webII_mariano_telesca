<?php
    // Acá se carga el footer desde un archivo externo
    require_once('secciones/head.php');
    titulo_pag("Log In");
    require('funciones/loguearse.php');
?>

<body class="cuerpo">

    <div class="container">

        <?php
            // Acá se carga el header desde un archivo externo
            include_once('secciones/header.php');
        ?>

        <main class="container">
            <div class="row">
                <!-- Formulario para iniciar sesión -->
                <form method="post" id="form_login" class="form">
                    <div class="form-group">
                        <label for="usuario_login">Usuario</label>
                        <input name="usuario_login" type="text" id="usuario_login" class="form_input">
                    </div>

                    <div class="form-group">
                        <label for="contrasenia_login">Contraseña</label>
                        <input type="password" name="contrasenia_login" id="contrasenia_login" class="form_input">
                    </div>
                    
                    <button type="submit" class="form_boton">Iniciar sesión</button>

                    <p>*En caso de no tener un usuario, registrate haciendo click <a href='registro.php'>aquí</a></p>
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
