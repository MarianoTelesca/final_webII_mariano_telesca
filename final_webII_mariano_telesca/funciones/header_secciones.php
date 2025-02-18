<?php

    function header_secciones($secciones){
        foreach($secciones as $seccion => $archivo){
        echo '
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccion.'</a>
        </li>';
        };
    }

?>