<?php
    include_once('funciones/alerta_exitosa.php');
    include_once('funciones/alerta_error.php');

    $errores_actualizar_usuario = [];

    $id_usuario_actualizar = "";
    $tipo_admin_a_actualizar = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar_usuario'])){

        $id_usuario_actualizar = $_POST["id_usuario_actualizar"];
        $tipo_admin_a_actualizar = $_POST["tipo_admin_a_actualizar"];

        if($_POST["id_usuario_actualizar"] == "" || $_POST['id_usuario_actualizar'] <= 1){
            $errores_actualizar_usuario[] = "El ID debe completarse con el ID del usuario que desea actualizar, que debe ser mayor a 2 ya que el usuario admin original no puede modificarse";
        }
    
        if($_POST["tipo_admin_a_actualizar"] != 0 && $_POST["tipo_admin_a_actualizar"] != 1){
            $errores_actualizar_usuario[] = "El tipo admin debe tener un valor de 0 o 1";
        }


        if(empty($errores_actualizar_usuario)){

            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once 'basededatos/conexion.php';
                
            //Realizamos la Query para eliminar los usuarios de la tabla correspondiente
            $sql = "UPDATE usuarios SET tipo_admin = ? WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql);

            //Si hay error que lo muestre, si es exitoso que muestre el id borrado
            if($stmt == false){
                echo mysqli_error($conn);
            }else{
                mysqli_stmt_bind_param($stmt, "ii", $tipo_admin_a_actualizar, $id_usuario_actualizar);

                if(mysqli_stmt_execute($stmt)){
                    //Traigo la función importada de la alerta exitosa
                    alerta_exitosa("Usuario actualizado", $id_usuario_actualizar);
                }else{
                    alerta_error(mysqli_stmt_error($stmt));
                }

            }
        }else{
            foreach($errores_actualizar_usuario as $error){
                alerta_error($error);
            }
        }
    }
?>