<?php

include_once('funciones/alerta_error.php');

//Se declara un array para los errores del form
$errores_register = [];

//Se declaran variables para cada input que sirven para mantener un valor ingresado si hay errores en otros inputs
$nombre_nuevo_usuario = "";
$tipo_nuevo_usuario = 0;
$contrasenia_nuevo_usuario = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Asignamos a cada variable el valor ingresado, para mantener despues si  hay error en otro input
    $nombre_nuevo_usuario = $_POST["nombre_nuevo_usuario"];
    $tipo_nuevo_usuario = 0;
    $contrasenia_nuevo_usuario = $_POST["contrasenia_nuevo_usuario"];

    //Acá, por cada uno de los tres inputs, si uno está vacio, agrega ese error al array de errores
    if($_POST["nombre_nuevo_usuario"] == ""){
        $errores_register[] = "El título debe tener información";
    }

    if($_POST["contrasenia_nuevo_usuario"] == ""){
        $errores_register[] = "La contraseña debe completarse";
    }

    if ($_POST["contrasenia_nuevo_usuario"] !== $_POST["contrasenia_nuevo_usuario_2"]) {
        $errores_register[] = "Las contraseñas no coinciden";
    }

    // Acá chequeo que el nombre de usuario no se repita en la base
    if(empty($errores_register)){
        require 'basededatos/conexion.php';

        $sql_user = "SELECT * FROM usuarios WHERE user = ?";
        $stmt_user = mysqli_prepare($conn, $sql_user);
        
        if ($stmt_user === false) {
            die('Error preparando la consulta de verificación: ' . mysqli_error($conn));
        }else{
            mysqli_stmt_bind_param($stmt_user, "s", $nombre_nuevo_usuario);
            mysqli_stmt_execute($stmt_user);
            mysqli_stmt_store_result($stmt_user);

            // Si el nombre de usuario ya existe, agregamos el error
            if(mysqli_stmt_num_rows($stmt_user) > 0){
                $errores_register[] = "El nombre de usuario ya está registrado.";
            }
        
            mysqli_stmt_close($stmt_user);
        }
    }

    //Si el array está vacio (osea no hay errores en los inputs), se continua con introducir la data a la DB
    if(empty($errores_register)){

        //Cargo la conexión a la Base de Datos desde un archivo externo
        require 'basededatos/conexion.php';

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
                alerta_error("Error al registrar al usuario".mysqli_stmt_error($stmt));
            }
            
        }
    }else{
        foreach($errores_register as $error){
            alerta_error($error);
        }
    }
}
?>