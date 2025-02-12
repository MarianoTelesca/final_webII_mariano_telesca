<?php
    // Acá se carga el footer desde un archivo externo
    include_once('secciones/head.php');
    titulo_pag("Inicio");
?>

<body class="cuerpo">

    <div class="container">

        <?php
            // Acá se carga el header desde un archivo externo
            include_once('secciones/header.php');
        ?>

        <main class="container my-4">
            <!-- *** FRANJA SEPARADORA CON TITULO *** -->
            <div class="row franjacolor franjaalto1 text-center titulo py-4">
                <div class="col">
                    <h1 class="display-4">Cámara Nikon ZarII Nikkor</h1>
                </div>
            </div>

            <!-- *** PRODUCTO *** -->
            <div class="row franjacolor mb-4"> <!-- Añadí margen abajo a la fila -->
                <!-- *** IMAGEN PRODUCTO *** -->
                <div class="col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <img src="imagenes/tienda1.png" alt="Cámara" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-6 col-sm-12 borde py-3">
                    <!-- ***** ESPECIFICACIONES ***** -->
                    <div class="row mt-5"> <!-- Añadí margen superior aquí para separar más el título -->
                        <div class="col-12">
                            <h4 class="text-center mb-4">Especificaciones</h4> <!-- Añadí margen abajo aquí -->
                            <table class="table table-striped table-bordered">
                                <?php
                                $seccionesTabla = [
                                    "Flash" => "Sí",
                                    "Lente" => "Sí",
                                    "Memoria" => "32GB",
                                    "Funda" => "Sí",
                                    "Baterías" => "Sí",
                                    "Trípode" => "No",
                                    "Manual" => "Sí",
                                    "Tapa" => "Sí, necesario."
                                ];

                                // Por cada sección definida en el array, se imprime un <tr> para mostrar la especificación
                                foreach ($seccionesTabla as $seccion => $sino) {
                                    echo '<tr>
                                            <th>' . $seccion . '</th>
                                            <td>' . $sino . '</td>
                                          </tr>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <!-- ***** PRECIO ***** -->
                    <div class="row bordetop">
                        <div class="col-12 text-center mb-3" id="precio">
                            <h3 class="text-danger">$140.000</h3>
                            <p class="pago">Pagos con MP, transferencia o tarjetas de débito</p>
                            <p class="pago">10% de descuento en efectivo</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- *** FRANJA SEPARADORA *** -->
            <div class="row franjacolor franjaalto2">
                <div class="col">
                    <p class="text-center py-4"> </p>
                </div>
            </div>

            <!-- *** RECOMENDACIONES *** -->
            <div class="row mb-4">
                <div class="col textofranja text-center">
                    <h2>Recomendaciones en base a tus búsquedas:</h2>
                </div>
            </div>

            <div class="row">
                <?php
                    //Cargo la conexión a la Base de Datos desde un archivo externo
                    require_once 'basededatos/conexion.php';

                    //Realizamos la Query de los productos y guardamos los resultados
                    $sql = "SELECT * FROM productos";
                    $result = mysqli_query($conn, $sql);

                    //Si los resultados dan más de una fila, entonces entra en un FOR donde los recorre
                    $nfilas = mysqli_num_rows($result);
                    if ($nfilas > 0) {
                        for ($i = 0; $i < $nfilas; $i++) {
                            //Recorre los resultados de la Query y muestra uno por uno los resultados en el formato pedido (Cards)
                            $actual = $i + 1;
                            $fila = mysqli_fetch_array($result);

                            echo '<div class="card col-6 col-md-4 col-lg-3 mb-4">';
                            echo '<img src="imagenes/tienda' . $actual . '.png" class="card-img-top img-fluid rounded" alt="Imagen del producto">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title text-center">Producto ' . $actual . '</h5>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </main>

        <?php
            // Acá se carga el footer desde un archivo externo
            include_once('secciones/footer.php');
        ?>

    </div>

    <?php
        //Cargo el CDN de Bootstrap JS desde un archivo externo
        require_once('secciones/bootstrapjs.php');
    ?>

</body>
</html>
