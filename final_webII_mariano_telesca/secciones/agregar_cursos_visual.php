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
    <form method="post" class="form" onsubmit="validarFormularioAgregarCursos(event)">
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

        <button type="submit" name="agregar_curso" class="form_boton">Agregar</button>

    </form>

</div>

<script>
    
    // En caso de que el campo este vacio (o completado solo con espacios en blanco), no se envía el formulario y envía un alerta al usuario para que complete el campo
    function validarCampo(campo, nombre_campo, event) {
    if (campo.trim() === "") {
    event.preventDefault();
    alert("Por favor, ingrese " + nombre_campo);
    return false;
    }
    }

    // En esta función, antes de enviar el formulario, validamos los valores ingresados.
    function validarFormularioAgregarCursos(event) {
        // Asignamos a consts los elementos del form
        const titulo = document.getElementById("titulo_nuevo_curso").value;
        const descripcion = document.getElementById("descripcion_nuevo_curso").value;
        const texto_boton = document.getElementById("texto_boton_nuevo_curso").value;

        validarCampo(titulo, "el titulo del nuevo curso", event);
        validarCampo(descripcion, "la descripcion del nuevo curso", event);
        validarCampo(texto_boton, "el texto del boton del nuevo curso", event);

        return true;
    }
</script>