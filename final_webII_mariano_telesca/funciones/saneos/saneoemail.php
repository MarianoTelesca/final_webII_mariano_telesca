<?php

if(isset($_POST['email']) && $_POST['email'] !=""){
    $email_valido = false;
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msjemail = "E-mail: ".$email;
        $email_valido = true;
    }else{
        //$msjemail = "DEBE INGRESAR UN EMAIL VALIDO";
        $email_valido = false;
    }

}else{
    //$msjemail = "DEBE INGRESAR UN EMAIL";
    $email_valido = false;
}



?>