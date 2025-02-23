<?php
    // Acá se carga el header desde un archivo externo
    include_once('funciones/administrador/agregar_curso.php');
?>

<div>

    <!-- Esto sirve para que si el array $errors tiene contenido, se muestre con un for each cada error que tiene-->
    <?php if (!empty($errors)): ?>
        <ul>
        <?php foreach($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Form para pedirle los datos del curso a agregar -->
    <form method="post" class="form" enctype="multipart/form-data" onsubmit="validarFormularioAgregarCursos(event)">
        <div>
            <label for="titulo_nuevo_curso">Título del curso</label>
            <input name="titulo_nuevo_curso" type="text" id="titulo_nuevo_curso" class="form_input" placeholder="Título del curso">
        </div>

        <div>
            <label for="descripcion_nuevo_curso">Descripción del curso</label>
            <textarea name="descripcion_nuevo_curso" id="descripcion_nuevo_curso consulta" cols="20" rows="5" placeholder="Introduzca la descripción..." class="form_input"></textarea>
        </div>

        <div>
            <label for="texto_boton_nuevo_curso">Texto del boton del curso</label>
            <input name="texto_boton_nuevo_curso" type="text" id="texto_boton_nuevo_curso" class="form_input" placeholder="Texto del boton del curso">
        </div>

        <div class="row">
            <div class="col-12">
                <p><input type="file" class="form_input" name="archivo_subido">Imagen que se mostrará con el curso (Solo png)</p>
            </div>
        </div>

        <button type="submit" name="agregar_curso" class="form_boton">Agregar</button>

    </form>

</div>