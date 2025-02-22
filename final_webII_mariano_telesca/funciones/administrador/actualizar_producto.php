<?php
    include_once('funciones/alerta_exitosa.php');
    include_once('funciones/alerta_error.php');

    $errores_actualizar = [];

    $id_producto_actualizar = "";
    $titulo_a_actualizar = "";
    $descripcion_a_actualizar = "";
    $categoria_a_actualizar = "";
    $precio_a_actualizar = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar_producto'])){

        $id_producto_actualizar = $_POST["id_producto_actualizar"];
        $titulo_a_actualizar = $_POST["titulo_a_actualizar"];
        $descripcion_a_actualizar = $_POST["descripcion_a_actualizar"];
        $categoria_a_actualizar = $_POST["categoria_a_actualizar"];
        $precio_a_actualizar = $_POST["precio_a_actualizar"];

        if($_POST["id_producto_actualizar"] == "" || $_POST["id_producto_actualizar"] <= 0){
            $errores_actualizar[] = "El ID debe completarse con el ID del producto que desea actualizar, que debe ser mínimo 1.";
        }

        if($_POST["titulo_a_actualizar"] == ""){
            $errores_actualizar[] = "El título debe tener información";
        }
    
        if($_POST["categoria_a_actualizar"] == ""){
            $errores_actualizar[] = "La categoría debe tener información";
        }
    
        if($_POST["descripcion_a_actualizar"] == ""){
            $errores_actualizar[] = "La descripción debe tener información";
        }
    
        if($_POST["precio_a_actualizar"] == ""){
            $errores_actualizar[] = "El precio debe tener un valor";
        }


        if(empty($errores_actualizar)){

            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once 'basededatos/conexion.php';
                
            //Realizamos la Query para eliminar los productos de la tabla correspondiente
            $sql = "UPDATE productos SET titulo = ?, categoria = ?, descripcion = ?, precio = ? WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql);

            //Si hay error que lo muestre, si es exitoso que muestre el id borrado
            if($stmt == false){
                echo mysqli_error($conn);
            }else{
                mysqli_stmt_bind_param($stmt, "sssdi", $titulo_a_actualizar, $categoria_a_actualizar, $descripcion_a_actualizar, $precio_a_actualizar, $id_producto_actualizar);

                if(mysqli_stmt_execute($stmt)){
                    //Traigo la función importada de la alerta exitosa
                    alerta_exitosa("Producto actualizado", $id_producto_actualizar);
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