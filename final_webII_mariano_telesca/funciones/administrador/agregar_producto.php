<?php

include_once('funciones/alerta_exitosa.php');
include_once('funciones/alerta_error.php');

//Se declara un array para los errores del form
$errores_agregar_producto = [];

//Se declaran variables para cada input que sirven para mantener un valor ingresado si hay errores en otros inputs
$titulo_nuevo_producto = "";
$descripcion_nuevo_producto = "";
$categoria_nuevo_producto = "";
$precio_nuevo_producto = "";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_producto'])){

    //Asignamos a cada variable el valor ingresado, para mantener despues si hay error en otro input
    $titulo_nuevo_producto = $_POST["titulo_nuevo_producto"];
    $descripcion_nuevo_producto = $_POST["descripcion_nuevo_producto"];
    $categoria_nuevo_producto = $_POST["categoria_nuevo_producto"];
    $precio_nuevo_producto = $_POST["precio_nuevo_producto"];

    //Acá, por cada uno de los input, si uno está vacio, agrega ese error al array de errores_agregar_producto
    if($_POST["titulo_nuevo_producto"] == ""){
        $errores_agregar_producto[] = "El título debe tener información";
    }

    if($_POST["categoria_nuevo_producto"] == ""){
        $errores_agregar_producto[] = "La categoría debe tener información";
    }

    if($_POST["descripcion_nuevo_producto"] == ""){
        $errores_agregar_producto[] = "La descripción debe tener información";
    }

    if($_POST["precio_nuevo_producto"] == "" && $_POST["precio_nuevo_producto"] <= 0){
        $errores_agregar_producto[] = "El precio debe tener un valor, mayor a 0.";
    }

    //Si el array está vacio (osea no hay errores en los inputs), se continua con introducir la data a la DB
    if(empty($errores_agregar_producto)){

        //Cargo la conexión a la Base de Datos desde un archivo externo
        require_once 'basededatos/conexion.php';

        //Realizamos la Query para insertar los productos en la tabla correspondiente
        $sql = "INSERT INTO productos (titulo, categoria, descripcion, precio) 
                VALUES (?,?,?,?)";

        $stmt = mysqli_prepare($conn, $sql);

        //Si hay error que lo muestre, si es exitoso que muestre el id generado
        if($stmt == false){
            echo mysqli_error($conn);
        }else{
            mysqli_stmt_bind_param($stmt, "sssi", $_POST['titulo_nuevo_producto'], $_POST['categoria_nuevo_producto'], $_POST['descripcion_nuevo_producto'], $_POST['precio_nuevo_producto']);

            if(mysqli_stmt_execute($stmt)){
                $id = mysqli_insert_id($conn);
                include('funciones/subida_imagen.php');
                subir_imagen("producto", "productos", $id, $conn);
                alerta_exitosa("Producto agregado", $id);
            }else{
                echo mysqli_stmt_error($stmt);
            }

        }
    }else{
        foreach($errores_register as $error){
            alerta_error($error);
        }
    }
}
?>