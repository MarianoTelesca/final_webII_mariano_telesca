<?php

    //Esta función es para poder cambiar el menú superior según el tipo de usuario que inició sesión
    function alerta_exitosa($texto, $id){
        echo '<div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            '.$texto.', ID: '.$id.'
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    }

?>