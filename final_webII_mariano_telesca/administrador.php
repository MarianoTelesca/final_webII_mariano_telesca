<?php

    session_start();
    // Si ya hay logueado un usuario común, se lo redirige al index
    if (isset($_SESSION['sesion']) && $_SESSION['sesion'] == true && $_SESSION['tipo_admin'] == 0) {
        header("Location: index.php");
        exit();
    }

    include_once('secciones/head.php');
    titulo_pag("Panel administrador");
?>

<body class="cuerpo">

    <?php
        // Acá se carga el header desde un archivo externo
        include_once('secciones/header.php');
    ?>

    <!-- Acá va un 'acordeón' de bootstrap, para colapsar las opciones del administrador -->
    <div class="accordion container" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Productos: Agregar
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php include('secciones/agregar_productos_visual.php'); ?>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Productos: Actualizar
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php include('secciones/actualizar_productos_visual.php'); ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Usuarios: Actualizar
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php include('secciones/actualizar_usuarios_visual.php'); ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Cursos: Agregar
            </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php include('secciones/agregar_cursos_visual.php'); ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Cursos: Actualizar
            </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php include('secciones/actualizar_cursos_visual.php'); ?>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Consultas: Visualizar
            </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php include('secciones/visualizar_consultas.php'); ?>
                </div>
            </div>
        </div>
    </div>


    <?php
        // Acá se carga el footer desde un archivo externo
        include_once('secciones/footer.php');

        //Cargo el CDN de Bootstrap JS desde un archivo externo
        require_once('secciones/bootstrapjs.php'); 
    ?>


<script>
    
    // En caso de que el campo este vacio (o completado solo con espacios en blanco), no se envía el formulario y envía un alerta al usuario para que complete el campo
    function validarCampo(campo, nombre_campo, event) {
        if (campo.trim() === "") {
        event.preventDefault();
        alert("Por favor, ingrese " + nombre_campo);
        return false;
        }
    }

    function validarFormularioAgregarProductos(event) {
        const titulo_nuevo_prod = document.getElementById("titulo_nuevo_producto").value;
        const categoria_nuevo_prod = document.getElementById("categoria_nuevo_producto").value;
        const descripcion_nuevo_prod = document.getElementById("descripcion_nuevo_producto").value;
        const precio_nuevo_prod = document.getElementById("precio_nuevo_producto").value;

        validarCampo(titulo_nuevo_prod, "el titulo del nuevo producto", event);
        validarCampo(categoria_nuevo_prod, "la categoria del nuevo producto", event);
        validarCampo(descripcion_nuevo_prod, "la descripcion del nuevo producto", event);
        validarCampo(precio_nuevo_prod, "el precio del nuevo producto", event);

        return true;
    }

    function validarFormularioAgregarCursos(event) {
        const titulo_nuevo_curso = document.getElementById("titulo_nuevo_curso").value;
        const descripcion_nuevo_curso = document.getElementById("descripcion_nuevo_curso").value;
        const texto_boton_nuevo_curso = document.getElementById("texto_boton_nuevo_curso").value;

        validarCampo(titulo_nuevo_curso, "el titulo del nuevo curso", event);
        validarCampo(descripcion_nuevo_curso, "la descripcion del nuevo curso", event);
        validarCampo(texto_boton_nuevo_curso, "el texto del boton del nuevo curso", event);

        return true;
    }

    function validarFormularioActualizarCursos(event) {
        const titulo_actualizar_curso = document.getElementById("titulo_actualizar_curso").value;
        const descripcion_actualizar_curso = document.getElementById("descripcion_actualizar_curso").value;
        const texto_boton_actualizar_curso = document.getElementById("texto_boton_actualizar_curso").value;

        validarCampo(titulo_actualizar_curso, "el titulo nuevo del curso", event);
        validarCampo(descripcion_actualizar_curso, "la descripcion nueva del curso", event);
        validarCampo(texto_boton_actualizar_curso, "el texto del boton nuevo del curso", event);

        return true;
    }

    function validarFormularioActualizarProductos(event) {
        const titulo_actualizar_prod = document.getElementById("titulo_actualizar_producto").value;
        const categoria_actualizar_prod = document.getElementById("categoria_actualizar_producto").value;
        const descripcion_actualizar_prod = document.getElementById("descripcion_actualizar_producto").value;
        const precio_actualizar_prod = document.getElementById("precio_actualizar_producto").value;

        validarCampo(titulo_actualizar_prod, "el titulo nuevo del producto", event);
        validarCampo(categoria_actualizar_prod, "la categoria nueva del producto", event);
        validarCampo(descripcion_actualizar_prod, "la descripcion nueva del producto", event);
        validarCampo(precio_actualizar_prod, "el precio nuevo del producto", event);

        return true;
    }
</script>


</body>
</html>