<?php
    // Acá se carga el footer desde un archivo externo
    include_once('secciones/head.php');
    titulo_pag("Form add");
?>

<body>

    <?php
        // Acá se carga el header desde un archivo externo
        include_once('secciones/header.php');
    ?>

    <?php

        //Se declara un array para los errores del form
        $errors = [];

        //Se declaran variables para cada input que sirven para mantener un valor ingresado si hay errores en otros inputs
        $titulo_nuevo_producto = "";
        $descripcion_nuevo_producto = "";
        $precio_nuevo_producto = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //Asignamos a cada variable el valor ingresaado, para mantener despues si  hay error en otro input
            $titulo_nuevo_producto = $_POST["titulo_nuevo_producto"];
            $descripcion_nuevo_producto = $_POST["descripcion_nuevo_producto"];
            $precio_nuevo_producto = $_POST["precio_nuevo_producto"];

            //Acá, por cada uno de los tres inputs, si uno está vacio, agrega ese error al array de errors
            if($_POST["titulo_nuevo_producto"] == ""){
                $errors[] = "El título debe tener información";
            }

            if($_POST["descripcion_nuevo_producto"] == ""){
                $errors[] = "La descripción debe tener información";
            }

            if($_POST["precio_nuevo_producto"] == ""){
                $errors[] = "El precio debe tener un valor";
            }

            //Si el array está vacio (osea no hay errores en los inputs), se continua con introducir la data a la DB
            if(empty($errors)){
        
                //Cargo la conexión a la Base de Datos desde un archivo externo
                require_once 'basededatos/conexion.php';


                //Realizamos la Query para insertar los productos en la tabla correspondiente
                $sql = "INSERT INTO productos (titulo, descripcion, precio) 
                        VALUES (?,?,?)";

                $stmt = mysqli_prepare($conn, $sql);

                //Si hay error que lo muestre, si es exitoso que muestre el id generado
                if($stmt == false){
                    echo mysqli_error($conn);
                }else{
                    mysqli_stmt_bind_param($stmt, "ssi", $_POST['titulo_nuevo_producto'], $_POST['descripcion_nuevo_producto'], $_POST['precio_nuevo_producto']);

                    if(mysqli_stmt_execute($stmt)){
                        $id = mysqli_insert_id($conn);
                        echo 'ID del producto agregado: '.$id;
                    }else{
                        echo mysqli_stmt_error($stmt);
                    }

                }
            }
        }
    ?>

    <main class="container">
        <div class="row">
        
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
                    <label for="precio_nuevo_producto">Precio del producto</label>
                    <input name="precio_nuevo_producto" type="number" id="precio_nuevo_producto" class="form_input" value="<?=$precio_nuevo_producto;?>">
                </div>

                <div>
                    <label for="descripcion_nuevo_producto">Descripción del producto</label>
                    <textarea name="descripcion_nuevo_producto" id="descripcion_nuevo_producto consulta" cols="30" rows="10" placeholder="Introduzca la descripción..." class="form_input" value="<?=$descripcion_nuevo_producto;?>"></textarea>
                </div>

                <button type="submit" class="form_boton">Agregar</button>

            </form>

        </div>
    </main>

    <?php
            // Acá se carga el footer desde un archivo externo
            include_once('secciones/footer.php');
        ?>

    </div>

    
    <?php //Cargo el CDN de Bootstrap JS desde un archivo externo
        require_once('secciones/bootstrapjs.php'); ?>


</body>