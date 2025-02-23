<?php

include_once('funciones/alerta_exitosa.php');
include_once('funciones/alerta_error.php');

//Se declara un array para los errores del form
$errores_agregar_curso = [];

//Se declaran variables para cada input que sirven para mantener un valor ingresado si hay errores en otros inputs
$titulo_nuevo_curso = "";
$descripcion_nuevo_curso = "";
$texto_boton_nuevo_curso = "";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_curso'])){

    //Asignamos a cada variable el valor ingresado, para mantener despues si hay error en otro input
    $titulo_nuevo_curso = $_POST["titulo_nuevo_curso"];
    $descripcion_nuevo_curso = $_POST["descripcion_nuevo_curso"];
    $texto_boton_nuevo_curso = $_POST["texto_boton_nuevo_curso"];

    //Acá, por cada uno de los input, si uno está vacio, agrega ese error al array de errores_agregar_curso
    if($_POST["titulo_nuevo_curso"] == ""){
        $errores_agregar_curso[] = "El título debe tener información";
    }

    if($_POST["texto_boton_nuevo_curso"] == ""){
        $errores_agregar_curso[] = "El curso debe tener un texto en el botón";
    }

    if($_POST["descripcion_nuevo_curso"] == ""){
        $errores_agregar_curso[] = "La descripción debe tener información";
    }

    //Si el array está vacio (osea no hay errores en los inputs), se continua con introducir la data a la DB
    if(empty($errores_agregar_curso)){

        //Cargo la conexión a la Base de Datos desde un archivo externo
        require_once 'basededatos/conexion.php';

        //Realizamos la Query para insertar los cursos en la tabla correspondiente
        $sql = "INSERT INTO cursos (titulo, descripcion, boton) 
                VALUES (?,?,?)";

        $stmt = mysqli_prepare($conn, $sql);

        //Si hay error que lo muestre, si es exitoso que muestre el id generado
        if($stmt == false){
            echo mysqli_error($conn);
        }else{
            mysqli_stmt_bind_param($stmt, "sss", $_POST['titulo_nuevo_curso'], $_POST['descripcion_nuevo_curso'], $_POST['texto_boton_nuevo_curso']);

            if(mysqli_stmt_execute($stmt)){
                $id = mysqli_insert_id($conn);
                include('funciones/subida_archivo_cursos.php');
                alerta_exitosa("Curso agregado", $id);
            }else{
                alerta_error(mysqli_stmt_error($stmt));
            }

        }
    }else{
        foreach($errores_agregar_curso as $error){
            alerta_error($error);
        }
    }
}
?>