<?php

// En esta funcion se ingresa por parametro los datos ingresados por el form para sanearlos
function saneo_dato_ingresado($dato) {
  $dato = trim($dato); 
  $dato = stripslashes($dato);
  $dato = htmlspecialchars($dato);
  return $dato;
}

?>