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

            // PAGINACIÓN
            $resultados_por_pagina = 6; //Cantidad de resultados a mostrar por página
            $query_cantidad = "SELECT COUNT(*) AS total FROM productos"; //Query que trae el total de registros en la tabla
            $resultado_cantidad_total = $conn->query($query_cantidad); //Acá se efetua la query
            $total_resultados = $resultado_cantidad_total->fetch_assoc()['total']; //Acá se pone la cantidad de registros en una variable
            $total_paginas = ceil($total_resultados / $resultados_por_pagina); //Cantidad de páginas que habrá según la cantidad de registros en la BD
            $pagina_actual = isset($_GET['pagina'])? $_GET['pagina'] : 1; //Si no está establecida la página se pone en la primera
            $pagina_actual = max(1, min($pagina_actual, $total_paginas)); //Minimo de página 1, y máximo el total de páginas
            $indice_inicio = ($pagina_actual - 1) * $resultados_por_pagina; //Se calcula la página inicial
            $indice_inicio = max(0, $indice_inicio); //Evitamos que muestre un número negativo  
            $sql = "SELECT * FROM productos LIMIT $indice_inicio, $resultados_por_pagina"; //Query que trae los productos con el límite establecido
            $result = mysqli_query($conn, $sql);


            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                for ($i = 0; $i < $nfilas; $i++){
                    $actual = $i + 1;

                    $fila = mysqli_fetch_array($result);
                    echo '<div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                            <img src="imagenes/producto'.$fila['id'].'.png" class="card-img-top img-fluid" alt="Imagen del producto" style="object-fit: cover; height: 200px;">
                                <div class="card-body text-center p-3">
                                    <h5 class="card-title mb-2" style="font-size: 1rem;">'.$fila['titulo'].'</h5>
                                    <p class="card-text text-muted mb-2" style="font-size: 0.9rem;">'.$fila['categoria'].'</p>
                                    <p class="card-text text-dark fw-bold" style="font-size: 1rem;">$'.$fila['precio'].'</p>
                                    <a href="producto.php" class="btn btn-primary w-100 mt-2">Comprar</a>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
                
                echo "<nav aria-label='Page navigation example'>
                        <ul class='pagination'>";
                        for($i = 1; $i <= $total_paginas; $i++){
                            echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                        }
                echo    '</ul>
                    </nav>';

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
