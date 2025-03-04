<?php

function subir_imagen($tipo, $nombre_tabla, $id, $conn){
    // Acá agrego una ruta a una imagen por defecto, por si falla la subida de la imagen
    $ruta_imagen = 'imagenes/placeholder.png';

    if ($_FILES['archivo_subido']['error'] == 0) {
        $archivo = $_FILES['archivo_subido'];
        $nombre_archivo_nuevo = $tipo.$id.".png";
        $directorio_destino = $_SERVER['DOCUMENT_ROOT'].'/final_webII_mariano_telesca/final_webII_mariano_telesca/imagenes/';
        $ruta_destino = $directorio_destino.$nombre_archivo_nuevo;

        // Verificación del tipo de archivo
        $ext_archivo = pathinfo($archivo['name'], PATHINFO_EXTENSION);

        if ($archivo['type'] == 'image/png' && strtolower($ext_archivo) == 'png') {
            if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
                // Si se sube correctamente, actualizamos la ruta de la imagen
                $ruta_imagen = "imagenes/".$nombre_archivo_nuevo;

            } else {
                alerta_error("Error al subir la imagen. Verifica que no sea un archivo dañado o demasiado grande.");
            }
        } else {
            alerta_error("El archivo no es de tipo PNG o su extensión no es válida.");
        }
    } else {
        alerta_error("No se ha seleccionado ningún archivo o ocurrió un error en la subida.");
    }

    // Ahora actualizamos la base de datos con la ruta de la imagen (ya sea la del archivo subido o la de placeholder)
    $sql_update = "UPDATE $nombre_tabla SET ruta_imagen = ? WHERE id = ?";
    $stmt_update = mysqli_prepare($conn, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "si", $ruta_imagen, $id);
    
    if (mysqli_stmt_execute($stmt_update)) {
        alerta_exitosa("${tipo} agregado con éxito", $id);
    } else {
        alerta_error("Error al actualizar la ruta de la imagen en la base de datos.");
    }
}

?>