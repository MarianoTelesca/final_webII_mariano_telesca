<?php
        include_once('funciones/administrador/eliminar_producto.php');
        include_once('funciones/administrador/actualizar_producto.php');
    ?>

    <!-- Lista de los productos traido de la BD -->
    <div class="container">
        <?php
            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once './basededatos/conexion.php';


            // PAGINACIÓN
            $resultados_por_pagina = 5; //Cantidad de resultados a mostrar por página
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

            //Si los resultados dan más de una fila, entonces creo una tabla y entra en un FOR donde los recorre
            $nfilas = mysqli_num_rows($result);
            if ($nfilas > 0) {
                echo '<div class="row">';
                echo '<table class="table table-striped table-bordered"> <tr> <th>ID</th><th>Título</th><th>Categoría</th><th>Descripción</th><th>Precio</th><th>Acción</th> </tr>';
                echo    '<tr>
                            <form method="post">
                                <td> <input name="id_producto_actualizar" type="number" size="1" id="id_producto_actualizar" placeholder="ID del producto"> </td>
                                <td> <input name="titulo_a_actualizar" type="text" id="titulo_a_actualizar" placeholder="Nuevo título"> </td>
                                <td> <input name="categoria_a_actualizar" type="text" id="categoria_a_actualizar" placeholder="Nueva categoría"> </td>
                                <td> <input name="descripcion_a_actualizar" id="descripcion_a_actualizar" placeholder="Nueva descripción"> </td>
                                <td> <input name="precio_a_actualizar" type="number" id="precio_a_actualizar" placeholder="Nuevo precio"> </td>
                                <td> <button type="submit" name="actualizar_producto">Actualizar</button> </td>
                            </form>
                        </tr>';

                for ($i = 1; $i <= $nfilas; $i++){
                    //Recorre los resultados de la Query y muestra uno por uno los resultados en una lista + el botón para eliminar una fila individualmente
                    $actual = $i + 1;
                    $fila = mysqli_fetch_array($result);
                    echo '<tr><td>'.$fila['id'].'</td><td>'.$fila['titulo'].'</td><td>'.$fila['categoria'].'<td>'.$fila['descripcion'].'</td><td>$'.$fila['precio'].
                        '<td><form method="post">
                            <input type="hidden" id="id_producto_borrar" name="id_producto_borrar" value="'.$fila['id'].'">
                            <button type="submit" name="eliminar_producto">Borrar</button>
                        </form></td>
                        </tr>';
                }
                echo '</table></div>';

                echo "<nav aria-label='Page navigation example'>
                        <ul class='pagination'>";
                        for($i = 1; $i <= $total_paginas; $i++){
                            echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                        }
                echo    '</ul>
                    </nav>';
            }
        ?>
    </div>