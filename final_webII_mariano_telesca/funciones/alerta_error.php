<?php

function alerta_error($error){

    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$error.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

}

?>