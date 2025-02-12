<?php

//Se declara un array para los errores del form
$errors_register = [];

//Se declaran variables para cada input que sirven para mantener un valor ingresado si hay errores en otros inputs
$nombre_nuevo_usuario = "";
$tipo_nuevo_usuario = 0;
$contrasenia_nuevo_usuario = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Asignamos a cada variable el valor ingresado, para mantener despues si  hay error en otro input
    $nombre_nuevo_usuario = $_POST["nombre_nuevo_usuario"];
    $tipo_nuevo_usuario = 0;
    $contrasenia_nuevo_usuario = $_POST["contrasenia_nuevo_usuario"];

    //Acá, por cada uno de los tres inputs, si uno está vacio, agrega ese error al array de errors
    if($_POST["nombre_nuevo_usuario"] == ""){
        $errors_register[] = "El título debe tener información";
    }

    if($_POST["contrasenia_nuevo_usuario"] == ""){
        $errors_register[] = "La contraseña debe completarse";
    }

    if ($_POST["contrasenia_nuevo_usuario"] !== $_POST["contrasenia_nuevo_usuario_2"]) {
        $errors_register[] = "Las contraseñas no coinciden";
    }

    //Si el array está vacio (osea no hay errores en los inputs), se continua con introducir la data a la DB
    if(empty($errors_register)){

        //Cargo la conexión a la Base de Datos desde un archivo externo
        require_once 'basededatos/conexion.php';

        $contrasenia_hasheada = password_hash($contrasenia_nuevo_usuario, PASSWORD_DEFAULT);

        //Realizamos la Query para insertar los productos en la tabla correspondiente
        $sql = "INSERT INTO usuarios (tipo_admin, user, pass) 
                VALUES (?,?,?)";

        $stmt = mysqli_prepare($conn, $sql);

        //Si hay error que lo muestre, si es exitoso que muestre el id generado
        if ($stmt === false) {
            die('Error preparando la consulta: ' . mysqli_error($conn));
        }else{
            mysqli_stmt_bind_param($stmt, "iss", $tipo_nuevo_usuario, $_POST['nombre_nuevo_usuario'], $contrasenia_hasheada);

            if(mysqli_stmt_execute($stmt)){
                echo 'Usuario agregado';
            } else {
                echo 'Error al insertar el usuario: ' . mysqli_stmt_error($stmt);
            }
            
        }
    }
}
?>