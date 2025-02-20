<?php
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
