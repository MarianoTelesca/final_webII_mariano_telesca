<?php
    $errores_actualizar = [];

    $id_curso_actualizar = "";
    $titulo_a_actualizar = "";
    $descripcion_a_actualizar = "";
    $boton_a_actualizar = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar_curso'])){

        $id_curso_actualizar = $_POST["id_curso_actualizar"];
        $titulo_a_actualizar = $_POST["titulo_a_actualizar"];
        $descripcion_a_actualizar = $_POST["descripcion_a_actualizar"];
        $boton_a_actualizar = $_POST["boton_a_actualizar"];

        if($_POST["id_curso_actualizar"] == ""){
            $errores_actualizar[] = "El ID debe completarse con el ID del curso que desea actualizar";
        }

        if($_POST["titulo_a_actualizar"] == ""){
            $errores_actualizar[] = "El título debe tener información";
        }
    
        if($_POST["boton_a_actualizar"] == ""){
            $errores_actualizar[] = "El boton debe tener información";
        }
    
        if($_POST["descripcion_a_actualizar"] == ""){
            $errores_actualizar[] = "La descripción debe tener información";
        }

        if(empty($errores_actualizar)){

            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once 'basededatos/conexion.php';
                
            //Realizamos la Query para eliminar los cursos de la tabla correspondiente
            $sql = "UPDATE cursos SET titulo = ?, descripcion = ?, boton = ? WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql);

            //Si hay error que lo muestre, si es exitoso que muestre el id borrado
            if($stmt == false){
                echo mysqli_error($conn);
            }else{
                mysqli_stmt_bind_param($stmt, "sssi", $titulo_a_actualizar, $descripcion_a_actualizar, $boton_a_actualizar, $id_curso_actualizar);

                if(mysqli_stmt_execute($stmt)){
                    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Curso actualizado, ID: '.$id_curso_actualizar.'
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }else{
                    echo mysqli_stmt_error($stmt);
                }

            }
        }else{
            foreach($errores_actualizar as $error){
                echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '.$error.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            }
        }
    }
?>