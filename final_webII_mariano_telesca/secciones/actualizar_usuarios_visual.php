<?php
        include_once('funciones/administrador/eliminar_usuario.php');
?>

<!-- Lista de los productos traido de la BD -->
    <div class="container">
        <?php
            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once './basededatos/conexion.php';

            //Realizamos la Query de los productos y guardamos los resultados
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conn, $sql);

            //Si los resultados dan más de una fila, entonces entra en un FOR donde los recorre
            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                echo '<div class="row">';
                echo '<table class="table table-striped table-bordered"> <tr> <th>ID</th><th>Nombre Usuario</th><th>Tipo</th><th>Acción</th></tr>';
                for ($i = 0; $i < $nfilas; $i++){
                    //Recorre los resultados de la Query y muestra uno por uno los resultados en una lista
                    $tipo_usuario = "";
                    $actual = $i + 1;
                    $fila = mysqli_fetch_array($result);
                    
                    if($fila['tipo_admin'] == 0){
                        $tipo_usuario = "Usuario";
                    }
                    if($fila['tipo_admin'] == 1){
                        $tipo_usuario = "Administrador";
                    }

                    echo '<tr><td>'.$fila['id'].'<td>'.$fila['user'].'</td><td>'.$tipo_usuario.'</td>';
                    echo '<td><form method="post">
                            <input type="hidden" id="id_usuario_borrar" name="id_usuario_borrar" value="'.$fila['id'].'">
                            <button type="submit" name="eliminar_usuario">Borrar</button>
                        </form></td>
                        </tr>';
                }
                echo '</table></div>';
            }
        ?>
    </div>