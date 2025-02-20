<?php
    include_once('funciones/alerta_exitosa.php');

    // Inicializacion de variables en cero.
    $nombre_consulta = "";
    $apellido_consulta = "";
    $email_consulta = "";
    $tema_consulta = "";
    $consulta = "";

    // Traigo el archivo externo que contiene la función para filtrar los datos ingresados desde el formulario 
    require_once('funciones/saneos/saneo_datos.php');

    // Se verifica que el metodo de reenvio del formulario sea POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consulta'])) {
        // Se pasa la funcion de filtrado a cada dato ingresado y se los asigna a una variable
        $nombre_consulta = saneo_dato_ingresado($_POST["nombre_consulta"]);
        $apellido_consulta = saneo_dato_ingresado($_POST["apellido_consulta"]);
        include('funciones/saneos/saneo_email.php');
        $tema_consulta = $_POST["tema_consulta"];
        $consulta = saneo_dato_ingresado($_POST["consulta"]);        
        
        // En caso de que los valores ya filtrados esten completados, el mail correctamente validado y el check de confirmación chequeado,  se imprime un nuevo cuadro con la información ingresada
        if ((isset($apellido_consulta) && $apellido_consulta !="")  &&  (isset($nombre_consulta) && $nombre_consulta !="")
        && (isset($consulta) && $consulta !="")  &&  ($email_valido == true)  &&  (isset($_POST["confirmacion_consulta"]))){
        
            //Cargo la conexión a la Base de Datos desde un archivo externo
            require_once 'basededatos/conexion.php';

            //Realizamos la Query para insertar la consulta en su tabla 
            $sql = "INSERT INTO consultas (nombre, apellido, mail, tema, consulta, resuelta) 
                    VALUES (?,?,?,?,?,false)";

            $stmt = mysqli_prepare($conn, $sql);
            
            //Si hay error que lo muestre, si es exitoso que muestre el id generado
            if($stmt == false){
                echo mysqli_error($conn);
            }else{
                mysqli_stmt_bind_param($stmt, "sssss", $nombre_consulta, $apellido_consulta, $email_consulta, $tema_consulta, $consulta);
            
                if(mysqli_stmt_execute($stmt)){
                    $id = mysqli_insert_id($conn);
                    //Traigo la función importada de la alerta exitosa
                    alerta_exitosa("Consulta agregada. ".$consulta." será devuelta al mail ".$email_consulta, $id);
                }else{
                    echo mysqli_stmt_error($stmt);
                }
            }
        
        } else {
            // En caso de algún error en la validación del IF, imprime que hubo algún error
            echo '<div class="alert alert-warning alert-dismissible fade show container" role="alert">    
                        Su consulta no fue enviada por haber error en los datos. Por favor, reenvie la consulta. ';
                    
                    // Acá con un IF agrega un <p> para dar un poco más de información sobre el error (solo uno, en caso de ser muchos errores)
                    if(!isset($_POST["confirmacion_consulta"])){
                        echo 'Debe aceptar los términos y condiciones.';
                    } else if(!(isset($apellido_consulta) && $apellido_consulta !="")
                            || !(isset($nombre_consulta) && $nombre_consulta !="")
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
