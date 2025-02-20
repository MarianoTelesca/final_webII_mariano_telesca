<?php
    include_once('funciones/alerta_exitosa.php');

    //Cargo la conexión a la Base de Datos desde un archivo externo
    require_once 'basededatos/conexion.php';

    $id_curso_borrar = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_curso'])){

        $id_curso_borrar = $_POST["id_curso_borrar"];

        //Realizamos la Query para eliminar el curso de la tabla
        $sql = "DELETE FROM cursos WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        //Si hay error que lo muestre, si es exitoso que muestre el id borrado
        if($stmt == false){
            echo mysqli_error($conn);
        }else{
            mysqli_stmt_bind_param($stmt, "i", $_POST['id_curso_borrar']);

            if(mysqli_stmt_execute($stmt)){
                //Traigo la función importada de la alerta exitosa
                alerta_exitosa("Curso eliminado", $id_curso_borrar);
            }else{
                echo mysqli_stmt_error($stmt);
            }

        }
    }
?>