    <!-- Lista de las consultas traidas de la BD -->
    <div class="container">
        <?php
            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once './basededatos/conexion.php';

            $sql = "SELECT * FROM consultas";
            $result = mysqli_query($conn, $sql);

            //Si los resultados dan más de una fila, entonces creo una tabla y entra en un FOR donde los recorre
            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                echo '<div class="row">';
                echo '<table class="table table-striped table-bordered"> <tr> <th>ID</th><th>Nombre</th><th>Apellido</th><th>Mail</th><th>Tema</th><th>Consulta</th><th>Resuelta?</th> </tr>';

                for ($i = 1; $i <= $nfilas; $i++){
                    //Recorre los resultados de la Query y muestra uno por uno los resultados en una lista
                    $actual = $i + 1;
                    $fila = mysqli_fetch_array($result);

                    echo '<tr><td>'.$fila['id'].'</td><td>'.$fila['nombre'].'</td><td>'.$fila['apellido'].'<td>'.$fila['mail'].'</td><td>$'.$fila['tema'].'</td><td>'.$fila['consulta'].'</td>';
                    echo '<td><form method="post">
                            <input type="checkbox" id="id_consulta_resuelta" name="id_consulta_resuelta" value="'.$fila['resuelta'].'">
                        </form></td>
                        </tr>';
                }
                echo '</table></div>';
            }
        ?>
    </div>