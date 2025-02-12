<?php
    // Acá se carga el header desde un archivo externo
    include_once('funciones/administrador/agregar_producto.php');
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

    <!-- Form para pedirle los datos del producto a agregar -->
    <form method="post" class="form">
        <div>
            <label for="titulo_nuevo_producto">Título del producto</label>
            <!-- En el 'value' ponemos la variable creada arriba, para que al enviar, se mantenga el valor en caso de haber un error en otros inputs --> 
            <input name="titulo_nuevo_producto" type="text" id="titulo_nuevo_producto" class="form_input" placeholder="Título del producto" value="<?=$titulo_nuevo_producto;?>">
        </div>

        <div>
            <label for="categoria_nuevo_producto">Categoría del producto</label>
            <!-- En el 'value' ponemos la variable creada arriba, para que al enviar, se mantenga el valor en caso de haber un error en otros inputs --> 
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