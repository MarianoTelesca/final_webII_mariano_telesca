
    <!-- Lista de los productos traido de la BD -->
    <div class="container">
        <?php
            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once './basededatos/conexion.php';

            //Realizamos la Query de los productos y guardamos los resultados
            $sql = "SELECT * FROM cursos";
            $result = mysqli_query($conn, $sql);

            //Si los resultados dan más de una fila, entonces entra en un FOR donde los recorre
            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                echo '<div class="row">';
                echo '<table class="table table-striped table-bordered"> <tr> <th>ID</th><th>Título</th><th>Descripción</th><th>Texto botón</th></tr>';
                for ($i = 0; $i < $nfilas; $i++){
                    //Recorre los resultados de la Query y muestra uno por uno los resultados en una lista
                    $actual = $i + 1;
                    $fila = mysqli_fetch_array($result);
                    echo '<tr><td>'.$fila['id'].'<td>'.$fila['titulo'].'<td>'.$fila['descripcion'].'</td><td>'.$fila['boton'].'</td></tr>';
                }
                echo '</table></div>';
            }
        ?>
    </div>