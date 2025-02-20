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
</body>
</html>