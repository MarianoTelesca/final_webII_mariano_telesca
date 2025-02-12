<?php
    // Acá se carga el footer desde un archivo externo
    include_once('secciones/head.php');
    titulo_pag("Nosotros");
?>

<body class="cuerpo">
    
    <?php
    // Acá se carga el header desde un archivo externo
    include_once('secciones/header.php');
    ?>

    <main>
        <!-- *** TITULO DE LA PAGINA EN FRANJA AMARILLA *** -->
        <div class="franjacolor franjaalto1 textofranja titulo">
            <div class="col">
                <h1>Quienes somos?</h1>
            </div>
        </div>
        </br>
        <!-- *** FOTOS Y DESCRIPCION ***-->
        <div class="row textofranja">
            <h2>Nikon: Pasado - Presente - Futuro de la fotografía</h2>
        </div>
        <section class="borde row">
            <div class="col-md-6 col-sm-12">
            <img src="imagenes/quienessomos1.png" alt="Mapa de la ciudad resaltado" class="img-fluid imagenesgaleria" id="mapa" width="882" height="582">
            </div>
            <article class="col-md-6 col-sm-12">   
                <p>Nikon es una marca creada en Japón hace más de 100 años.</p>
                <p>Vende todos los productos relacionados a la fotografía.</p>
                <p>Es una corporación multinacional japonesa, productor de cámaras fotográficas, prismáticos, microscopios, e instrumentos de medición.</p>
                <p>Tras 70 años, Nikon dijo adiós al «Made in Japan»: todas sus cámaras se empezaron a fabricar en Tailandia.</p>
                <p>Por qué Nikon?: En septiembre de 1946, el diseño de la cámara estaba terminado y fue denominado NIKON. Esta marca deriva de NIppon KOgaku, a la que Joe Ehrenreich añadió una N para ofrecer la sensación de grande, consistente. </p>
            </article>
        </section>
    </main>

    <?php
    // Acá se carga el footer desde un archivo externo
    include_once('secciones/footer.php');
    ?>

    <?php //Cargo el CDN de Bootstrap JS desde un archivo externo
        require_once('secciones/bootstrapjs.php'); ?>

</body>
</html>