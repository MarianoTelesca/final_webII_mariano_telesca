<?php
    // Acá se carga el header desde un archivo externo
    include_once('funciones/administrador/agregar_producto.php');
?>

<div>
    <!-- Form para pedirle los datos del producto a agregar -->
    <form method="post" class="form" onsubmit="validarFormularioAgregarProductos(event)">
        <div>
            <label for="titulo_nuevo_producto">Título del producto</label>
            <!-- En el 'value' ponemos la variable creada arriba, para que al enviar, se mantenga el valor en caso de haber un error en otros inputs --> 
            <input name="titulo_nuevo_producto" type="text" id="titulo_nuevo_producto" class="form_input" placeholder="Título del producto" value="<?=$titulo_nuevo_producto;?>">
        </div>

        <div>
            <label for="categoria_nuevo_producto">Categoría del producto</label>
            <input name="categoria_nuevo_producto" type="text" id="categoria_nuevo_producto" class="form_input" placeholder="Categoría del producto" value="<?=$categoria_nuevo_producto;?>">
        </div>

        <div>
            <label for="precio_nuevo_producto">Precio del producto</label>
            <input name="precio_nuevo_producto" type="number" id="precio_nuevo_producto" class="form_input" value="<?=$precio_nuevo_producto;?>">
        </div>

        <div>
            <label for="descripcion_nuevo_producto">Descripción del producto</label>
            <textarea name="descripcion_nuevo_producto" id="descripcion_nuevo_producto consulta" cols="20" rows="5" placeholder="Introduzca la descripción..." class="form_input" value="<?=$descripcion_nuevo_producto;?>"></textarea>
        </div>

        <button type="submit" name="agregar_producto" class="form_boton">Agregar</button>

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
    function validarFormularioAgregarProductos(event) {
        // Asignamos a consts los elementos del form
        const titulo = document.getElementById("titulo_nuevo_producto").value;
        const categoria = document.getElementById("categoria_nuevo_producto").value;
        const descripcion = document.getElementById("descripcion_nuevo_producto").value;
        const precio = document.getElementById("precio_nuevo_producto").value;

        validarCampo(titulo, "el titulo del nuevo producto", event);
        validarCampo(categoria, "la categoria del nuevo producto", event);
        validarCampo(descripcion, "la descripcion del nuevo producto", event);
        validarCampo(precio, "el precio del nuevo producto", event);

        return true;
    }
</script>