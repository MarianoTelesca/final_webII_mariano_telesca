<?php
    session_start();
    include_once('secciones/head.php');
    titulo_pag("Inicio");
?>

<body class="cuerpo">

    <?php
        // Acá se carga el header desde un archivo externo
        include_once('secciones/header.php');
    ?>

    <div class="container">

        <!-- HEADER CON NAVBAR Y IMAGEN PRINCIPAL -->
        <div class="container">
            <!-- IMAGEN DEL HEADER -->
            <div class="row">
            <div class="col-12">
                <img src="imagenes/indexheader.jpg" alt="Cámara de fotos en una ruta" class="img-fluid" width="1323" height="631">
            </div>
            </div>
        </div>

        <main class="container">
            <!-- FRANJA SEPARADORA CON TITULO -->
            <div class="row franjacolor franjaalto1 textofranja titulo">
                <div class="col"> <h1>Nikon: El futuro de la fotografía</h1> </div>
            </div>

            <!-- CARDS DE CURSOS -->
            <?php
                //Cargo la conexión a la Base de Datos desde un archivo externo
                require_once 'basededatos/conexion.php';

                //Realizamos la Query de los cursos y guardamos los resultados
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
                        echo '<img src="'.$fila['ruta_imagen'].'" class="card-img-top img-fluid imgcardtamanio" alt="Una foto al azar que representa al curso" width="295" height="201">';
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

            <!-- FRANJA SEPARADORA -->
            <div class="row franjacolor franjaalto2">
                <div class="col"> <p></p> </div>
            </div>
            
            <!-- IMAGENES GENERALES DE PRODUCTOS -->
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

            <div class="row franjacolor franjaalto2">
                <div class="col"> <p></p> </div>
            </div>
            
            <!-- FOTO Y DESCRIPCION DEL QUIENES SOMOS -->
            <div class="row textofranja">
                <h2>Nikon: Pasado - Presente - Futuro de la fotografía</h2>
            </div>

            <section class="borde row">
                <div class="col-md-6 col-sm-12">
                <img src="imagenes/ubicacion.png" alt="Mapa de la ciudad resaltado" class="img-fluid imagenesgaleria" id="mapa" width="882" height="582">
                </div>
                <article class="col-md-6 col-sm-12">   
                    <p>Nikon es una marca creada en Japón hace más de 100 años.</p>
                    <p>Vende todos los productos relacionados a la fotografía.</p>
                    <p>Es una corporación multinacional japonesa, productor de cámaras fotográficas, prismáticos, microscopios, e instrumentos de medición.</p>
                    <p>Tras 70 años, Nikon dijo adiós al «Made in Japan»: todas sus cámaras se empezaron a fabricar en Tailandia.</p>
                    <p>Por qué Nikon?: En septiembre de 1946, el diseño de la cámara estaba terminado y fue denominado NIKON. Esta marca deriva de NIppon KOgaku, a la que Joe Ehrenreich añadió una N para ofrecer la sensación de grande, consistente. </p>
                </article>
            </section>
            
            <div class="row franjacolor franjaalto2">
                <div class="col"> <p></p> </div>
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