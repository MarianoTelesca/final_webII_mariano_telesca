<?php
    include_once('funciones/alerta_exitosa.php');
    include_once('funciones/alerta_error.php');

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

        if($_POST["id_curso_actualizar"] == "" || $_POST["id_curso_actualizar"] <= 0){
            $errores_actualizar[] = "El ID debe completarse con el ID del curso que desea actualizar, que debe ser mínimo 1.";
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
                
            //Realizamos la Query para actualizar el curso según los datos ingresados
            $sql = "UPDATE cursos SET titulo = ?, descripcion = ?, boton = ? WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql); 

            //Si hay error que lo muestre, si es exitoso que muestre el id actualizado
            if($stmt == false){
                echo mysqli_error($conn);
            }else{
                //Mandamos los parámetros para completar la query hecha arriba
                mysqli_stmt_bind_param($stmt, "sssi", $titulo_a_actualizar, $descripcion_a_actualizar, $boton_a_actualizar, $id_curso_actualizar);

                if(mysqli_stmt_execute($stmt)){
                    //Traigo la función importada de la alerta exitosa
                    alerta_exitosa("Curso actualizado", $id_curso_actualizar);
                }else{
                    alerta_error(mysqli_stmt_error($stmt));
                }

            }
        }else{
            foreach($errores_actualizar as $error){
                alerta_error($error);
            }
        }
    }
?>