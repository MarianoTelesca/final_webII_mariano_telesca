<?php
    include_once('secciones/head.php');
    titulo_pag("Tienda");
?>

<body class="cuerpo">

    <?php
        include_once('secciones/header.php');
    ?>

    <main class="container">
        <div class="row franjacolor franjaalto1 textofranja titulo">
            <div class="col"> <h1>Nuestros productos</h1> </div>
        </div>

        <?php
            //Se llama a la base de datos, si hay filas en la respuesta, con un FOR se muestran todos los productos
            require_once 'basededatos/conexion.php';
            $sql = "SELECT * FROM productos";
            $result = mysqli_query($conn, $sql);

            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                for ($i = 0; $i < $nfilas; $i++){
                    $actual = $i + 1;
                    $fila = mysqli_fetch_array($result);
                    echo '<div class="col">';
                    echo '<div class="card h-100 border-0 shadow-sm">';
                    echo '<img src="imagenes/tienda'.$actual.'.png" class="card-img-top img-fluid" alt="Imagen del producto" style="object-fit: cover; height: 200px;">';
                    echo '<div class="card-body text-center p-3">';
                    echo '<h5 class="card-title mb-2" style="font-size: 1rem;">'.$fila['titulo'].'</h5>';
                    echo '<p class="card-text text-muted mb-2" style="font-size: 0.9rem;">'.$fila['categoria'].'</p>';
                    echo '<p class="card-text text-dark fw-bold" style="font-size: 1rem;">$'.$fila['precio'].'</p>';
                    echo '<a href="producto.php" class="btn btn-primary w-100 mt-2">Comprar</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        ?>

    </main>

    <?php
        include_once('secciones/footer.php');
    ?>

    <?php 
        require_once('secciones/bootstrapjs.php');
    ?>

</body>
</html>
