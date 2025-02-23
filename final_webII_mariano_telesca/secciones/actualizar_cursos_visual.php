<?php
        include_once('funciones/administrador/eliminar_curso.php');
        include_once('funciones/administrador/actualizar_curso.php');
?>

<!-- Lista de los cursos traido de la BD -->
<div class="container">
    <?php
        //Cargo la conexión a la Base de Datos desde un archivo externo
        require_once './basededatos/conexion.php';

        //Realizamos la Query de los cursos y guardamos los resultados
        $sql = "SELECT * FROM cursos";
        $result = mysqli_query($conn, $sql);

        //Si los resultados dan más de una fila, entonces entra en un FOR donde los recorre
        $nfilas = mysqli_num_rows($result);
        if ($nfilas > 0) {
            echo '<div class="row">';
            echo '<table class="table table-striped table-bordered"> <tr> <th>ID</th><th>Título</th><th>Descripción</th><th>Texto botón</th><th>Acción</th></tr>';
            echo    '<tr>
                            <form method="post" onsubmit="validarFormularioActualizarCursos(event)">
                                <td> <input name="id_curso_actualizar" type="number" id="id_curso_actualizar" placeholder="ID del curso"> </td>
                                <td> <input name="titulo_actualizar_curso" type="text" id="titulo_actualizar_curso" placeholder="Nuevo título"> </td>
                                <td> <input name="descripcion_actualizar_curso" id="descripcion_actualizar_curso" placeholder="Nueva descripción"> </td>
                                <td> <input name="boton_actualizar_curso" type="text" id="boton_actualizar_curso" placeholder="Nueva texto al botón"> </td>
                                <td> <button type="submit" name="actualizar_curso">Actualizar</button> </td>
                            </form>
                        </tr>';
            for ($i = 0; $i < $nfilas; $i++){
                //Recorre los resultados de la Query y muestra uno por uno los resultados en una lista
                $actual = $i + 1;
                $fila = mysqli_fetch_array($result);
                echo '<tr><td>'.$fila['id'].'<td>'.$fila['titulo'].'<td>'.$fila['descripcion'].'</td><td>'.$fila['boton'].'</td>';
                echo '<td><form method="post">
                        <input type="hidden" id="id_curso_borrar" name="id_curso_borrar" value="'.$fila['id'].'">
                        <button type="submit" name="eliminar_curso">Borrar</button>
                    </form></td>
                    </tr>';
            }
            echo '</table></div>';
        }
    ?>
</div>