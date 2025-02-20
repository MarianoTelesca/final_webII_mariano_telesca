<?php
    //Cargo la conexión a la Base de Datos desde un archivo externo
    require_once 'basededatos/conexion.php';

    $id_usuario_borrar = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_usuario'])){

        $id_usuario_borrar = $_POST["id_usuario_borrar"];

        //Realizamos la Query para eliminar el usuario de la tabla
        $sql = "DELETE FROM usuarios WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        //Si hay error que lo muestre, si es exitoso que muestre el id borrado
        if($stmt == false){
            echo mysqli_error($conn);
        }else{
            mysqli_stmt_bind_param($stmt, "i", $_POST['id_usuario_borrar']);

            if(mysqli_stmt_execute($stmt)){
                echo '<div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Usuario eliminado, ID: '.$id_usuario_borrar.'
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }else{
                echo mysqli_stmt_error($stmt);
            }

        }
    }
?>