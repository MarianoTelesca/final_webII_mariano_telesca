<?php
    // Inicializacion de variables en cero.
    $nombre = "";
    $apellido = "";
    $consulta = "";
    $edad = "";
    $email = "";

    // Traigo el archivo externo que contiene la función para filtrar los datos ingresados desde el formulario 
    require_once('funciones/saneos/saneodatos.php');

    // Se verifica que el metodo de reenvio del formulario sea POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consulta'])) {
        // Se pasa la funcion de filtrado a cada dato ingresado y se los asigna a una variable
        $nombre = saneo_dato_ingresado($_POST["nombre"]);
        $apellido = saneo_dato_ingresado($_POST["apellido"]);
        $consulta = saneo_dato_ingresado($_POST["consulta"]);
        $edad = saneo_dato_ingresado($_POST["edad"]);
        // Traigo de un archivo externo la validación del email ingresado por formulario
        include('funciones/saneos/saneoemail.php');
    
        // En caso de que los valores ya filtrados esten completados, el mail correctamente validado y el check de confirmación chequeado,  se imprime un nuevo cuadro con la información ingresada
        if ((isset($apellido) && $apellido !="")  &&  (isset($nombre) && $nombre !="")
        && (isset($consulta) && $consulta !="")  &&  ($email_valido == true)  &&  (isset($_POST["confirmacion"]))){

            echo '<div class="alert alert-warning alert-dismissible fade show container" role="alert">
                    Su consulta fue enviada. '.$nombre.' '.$apellido.' - '.$msjemail.'. Su consulta: '.$consulta.'. ';
            include_once('funciones/subida_archivo.php');
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        
        } else {
            // En caso de algún error en la validación del IF, imprime que hubo algún error
            echo '<div class="alert alert-warning alert-dismissible fade show container" role="alert">    
                        Su consulta no fue enviada por haber error en los datos. Por favor, reenvie la consulta. ';
                    
                    // Acá con un IF agrega un <p> para dar un poco más de información sobre el error (solo uno, en caso de ser muchos errores)
                    if(!isset($_POST["confirmacion"])){
                        echo 'Debe aceptar los términos y condiciones.';
                    } else if(!(isset($apellido) && $apellido !="")
                            || !(isset($nombre) && $nombre !="")
                            || !(isset($consulta) && $consulta !="")){
                        echo 'Nombre, apellido o consulta están vacios.';        
                    } else if(!$email_valido){
                        echo 'Mail invalido. Formato aceptado: nombre@dominio.com.';
                    }
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        };
    }
?>
