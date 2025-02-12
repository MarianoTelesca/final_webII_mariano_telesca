<?php

//Se declara un array para los errores del form
$errors_login = [];

//Se declaran variables para cada input que sirven para mantener un valor ingresado si hay errores en otros inputs
$usuario_login = "";
$contrasenia_login = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Asignamos a cada variable el valor ingresado, para mantener después si hay error en otro input
    $usuario_login = $_POST["usuario_login"];
    $contrasenia_login = trim($_POST["contrasenia_login"]);

    //Acá, por cada uno de los tres inputs, si uno está vacío, agrega ese error al array de errores
    if ($_POST["usuario_login"] == "") {
        $errors_login[] = "El usuario debe tener información";
    }

    if ($_POST["contrasenia_login"] == "") {
        $errors_login[] = "La contraseña debe completarse";
    }

    //Si el array está vacío (o sea, no hay errores en los inputs), se continúa con introducir los datos a la DB
    if (empty($errors_login)) {

        //Cargo la conexión a la Base de Datos desde un archivo externo
        require_once 'basededatos/conexion.php';

        //Realizamos la Query para obtener los datos del usuario
        $sql = "SELECT id, user, pass, tipo_admin FROM usuarios WHERE user = ?";
        $stmt = mysqli_prepare($conn, $sql);

        //Si hay error que lo muestre, si es exitoso que lo muestre
        if ($stmt === false) {
            die('Error preparando la consulta: ' . mysqli_error($conn));
        } else {
            mysqli_stmt_bind_param($stmt, "s", $usuario_login);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    mysqli_stmt_bind_result($stmt, $id, $user, $contrasenia_hash, $tipo_admin);

                    mysqli_stmt_fetch($stmt);

                    // Comprobamos si la contraseña está en texto plano
                    if (!password_get_info($contrasenia_hash)['algo']) {
                        // Si la contraseña está en texto plano, la hasheamos
                        $contrasenia_hash = password_hash($contrasenia_hash, PASSWORD_DEFAULT);

                        // Actualizamos el hash en la base de datos
                        $update_sql = "UPDATE usuarios SET pass = ? WHERE id = ?";
                        $update_stmt = mysqli_prepare($conn, $update_sql);
                        mysqli_stmt_bind_param($update_stmt, "si", $contrasenia_hash, $id);
                        mysqli_stmt_execute($update_stmt);
                    }

                    // Verificamos la contraseña con el hash
                    if (password_verify($contrasenia_login, $contrasenia_hash)) {
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['user'] = $user;
                        $_SESSION['tipo_admin'] = $tipo_admin;

                        // Redirigimos dependiendo del tipo de usuario
                        if ($tipo_admin == 1) {
                            header("Location: administrador.php");
                        } else {
                            header("Location: index.php");
                        }
                        exit();
                    } else {
                        echo 'Contraseña incorrecta';
                    }
                } else {
                    echo 'Usuario no encontrado';
                }
            } else {
                echo 'Error al ejecutar la consulta: ' . mysqli_stmt_error($stmt);
            }
        }
    }
}
?>
