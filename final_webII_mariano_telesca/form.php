<?php
    include_once('secciones/head.php');
    titulo_pag("Contacto");
?>

<body class="cuerpo">
    <div class="container">

        <?php
        // Acá se carga el header desde un archivo externo
        include_once('secciones/header.php');
        ?>

        <main class="container">
            <!-- FRANJA CON TITULO -->
            <div class="row franjacolor franjaalto1 textofranja titulo">
                <div class="col">
                <h1></h1>
                </div>
            </div>

            <?php
                // Inicializacion de variables en cero.
                $nombre = "";
                $apellido = "";
                $consulta = "";
                $edad = "";
                $email = "";

                // Traigo el archivo externo que contiene la función para filtrar los datos ingresados desde el formulario 
                require_once('funciones/saneos/saneodatos.php');

                // Se verifica que el metodo de reenvio del formulario sea POST
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Se pasa la funcion de filtrado a cada dato ingresado y se los asigna a una variable
                    $nombre = saneo_dato_ingresado($_POST["nombre"]);
                    $apellido = saneo_dato_ingresado($_POST["apellido"]);
                    $consulta = saneo_dato_ingresado($_POST["consulta"]);
                    $edad = saneo_dato_ingresado($_POST["edad"]);
                    // Traigo de un archivo externo la validación del email ingresado por formulario
                    include('funciones/saneos/saneoemail.php');
                } 

                // En caso de que los valores ya filtrados esten completados, el mail correctamente validado y el check de confirmación chequeado,  se imprime un nuevo cuadro con la información ingresada
                if ((isset($apellido) && $apellido !="")  &&  (isset($nombre) && $nombre !="")
                && (isset($consulta) && $consulta !="")  &&  ($email_valido == true)  &&  (isset($_POST["confirmacion"]))){

                    echo '<div class="row">
                            <div class="form borde container">
                                <div class="row">
                                    <div class="col">
                                    <h2>Su consulta fue enviada.</h2>
                                    <br>
                                    <p>Nombre: '.$nombre.'</p>
                                    <p>Apellido: '.$apellido.'</p>
                                    <p>'.$msjemail.'</p>
                                    <p>Edad: '.$edad.'</p>
                                    <p>Su consulta: '.$consulta.'</p>';

                                    include_once('funciones/subida_archivo.php');

                    echo '          </div>
                                </div>
                            </div>
                        </div>';
                
                } else {
                    // En caso de algún error en la validación del IF, imprime que hubo algún error
                    echo 
                    '<div class="row franjaColorRojo franjaalto1 textofranja titulo">
                        <div class="col">
                            <p> Su consulta no fue enviada por haber error en los datos. Por favor, reenvie la consulta. </p>';
                            
                            // Acá con un IF agrega un <p> para dar un poco más de información sobre el error (solo uno, en caso de ser muchos errores)
                            if(!isset($_POST["confirmacion"])){
                                echo '<p> No aceptó los terminos y condiciones </p>';
                            } else if(!(isset($apellido) && $apellido !="")
                                    || !(isset($nombre) && $nombre !="")
                                    || !(isset($consulta) && $consulta !="")){
                                echo '<p> Envió su nombre, apellido o consulta solo con espacios </p>';        
                            } else if(!$email_valido){
                                echo '<p> El mail ingresado no es valido. Debe ser en formato: nombreemail@dominio.com </p>';        
                            }

                    
                    echo '
                        </div>
                    </div>
                    <br>';


                };
            ?>

            </div>
        </main>

        <?php
        // Acá se incluye el footer desde un archivo externo
        include_once('secciones/footer.php');
        ?>

    </div>

    <?php require_once('secciones/bootstrapjs.php'); ?>
    
</body>
</html>