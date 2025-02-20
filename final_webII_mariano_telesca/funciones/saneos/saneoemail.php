<?php

// Esta función es para validar especificamente el mail ingresado
if(isset($_POST['email_consulta']) && $_POST['email_consulta'] !=""){
    $email_valido = false;
    $email_consulta = trim($_POST['email_consulta']);

    if(filter_var($email_consulta, FILTER_VALIDATE_EMAIL)){
        $email_valido = true;
    }else{
        $email_valido = false;
    }
}else{
    $email_valido = false;
}

?>