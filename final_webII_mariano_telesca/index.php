<?php
    // Acá se carga el footer desde un archivo externo
    include_once('secciones/head.php');
    titulo_pag("Inicio");
?>

<body class="cuerpo">

    <?php
        // Acá se carga el header desde un archivo externo
        include_once('secciones/header.php');
    ?>

    <div class="container">

        <!-- *** HEADER CON NAVBAR Y IMAGEN PRINCIPAL *** -->
        <div class="container">
            <!-- *** IMAGEN DEL HEADER *** -->
            <div class="row">
            <div class="col-12">
                <img src="imagenes/indexheader.jpg" alt="Cámara de fotos en una ruta" class="img-fluid" width="1323" height="631">
            </div>
            </div>
        </div>

        <main class="container">
            <!-- *** FRANJA SEPARADORA CON TITULO *** -->
            <div class="row franjacolor franjaalto1 textofranja titulo">
                <div class="col"> <h1>Nikon: El futuro de la fotografía</h1> </div>
            </div>

            <!-- *** CARDS DE CURSOS Y WORKSHOPS *** -->
            <?php
                //Cargo la conexión a la Base de Datos desde un archivo externo
                require_once 'basededatos/conexion.php';

                //Realizamos la Query de los productos y guardamos los resultados
                $sql = "SELECT * FROM cursos";
                $result = mysqli_query($conn, $sql);

                //Si los resultados dan más de una fila, entonces entra en un FOR donde los recorre
                $nfilas = mysqli_num_rows($result);
                if ($nfilas > 0) {
                    echo '<div class="row">';
                    for ($i = 0; $i < $nfilas; $i++){
                        //Recorre los resultados de la Query y muestra uno por uno los resultados en el formato pedido(Cards)
                        $actual = $i + 1;
                        $fila = mysqli_fetch_array($result);
                        
                        echo '<div class="card col-lg-4 col-md-6 col-12">';
                        echo '<img src="imagenes/indexcurso'.$actual.'.png" class="card-img-top img-fluid imgcardtamanio" alt="Ejemplo de la fotografía enseñada" width="295" height="201">';
                        echo '<div class="card-body">
                            <h2 class="card-title">'.$fila['titulo'].'</h2>
                            <p class="card-text">'.$fila['descripcion'].'...</p>
                            <a href="contacto.php" class="btn btn-primary">'.$fila['boton'].'</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            ?>

            <!-- *** FRANJA SEPARADORA *** -->
            <div class="row franjacolor franjaalto2">
                <div class="col"> <p></p> </div>
            </div>
            
            <!-- *** IMAGENES GENERALES DE PRODUCTOS *** -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div>
                    <img src="imagenes/indexprod1.jpg" alt="Cámaras mirrorless" class="img-fluid" width="700" height="380">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="imagenes/indexprod2.jpg" alt="Cámaras reflex" class="img-fluid" width="700" height="380">
                </div>
            </div>

            <!-- *** SECTOR DE SUSCRIPCIÓN *** -->
            <div class="row franjacolor franjaalto2">
                <div class="col-12 textofranja">
                    <a href="contacto.php">Suscribite a nuestro Newsletter</a>
                </div>
            </div>
        </main>

    </div>

    <?php
        // Acá se carga el footer desde un archivo externo
        include_once('secciones/footer.php');
    ?>

    <?php //Cargo el CDN de Bootstrap JS desde un archivo externo
        require_once('secciones/bootstrapjs.php'); ?>

</body>
</html>