<?php

    // Acá se recibe el archivo y se pasan sus datos a variables
    $archivo = $_FILES['archivosubido'];
    $nombreArchivo = $_FILES['archivosubido']['name'];
    $tipoArchivo = $_FILES['archivosubido']['type'];


    // Verificamos si el archivo es el permitido (jog o png)
    if(isset($_FILES)){
        if ($tipoArchivo == "image/jpg" || $tipoArchivo == "image/png") {
            # Mover el archivo a la ubicación deseada (por ejemplo, la carpeta 'uploads')
            $directorioDestino = 'adjuntados/';
            $rutaDestino = $directorioDestino.$nombreArchivo;
            
            if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                echo "El archivo se subió correctamente.";
            } else {
                echo "Error al subir el archivo.";
            }
        } else {

            echo "Error: Tipo de archivo no permitido.";
        };
    } else {
        echo "Error: No se ha seleccionado un archivo o ocurrió un error en la subida.";
    }

?>