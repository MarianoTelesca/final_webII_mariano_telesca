<?php
// Acá se define el array con las secciones que se muestran en el footer (no importa el tipo de usuario)
$secciones = ["Inicio" => "index.php", "Tienda" => "tienda.php", "Contacto" => "contacto.php"];
?>

<!-- Acá se carga el footer que será contenido en varias secciones -->

<footer class="container">
    <div class="container">
        <div class="row">
            <div class="col">    
                <ul>
                
                    <?php
                    // Por cada sección definida en el array, se imprime un <li> para mostrar el menú
                    foreach($secciones as $seccion => $archivo){
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="'.$archivo.'">'.$seccion.'</a>
                        </li>';
                    };
                    ?>

                </ul>
            </div>
            <div class="col d-none d-lg-block envios">
                <ul class="envios">  
                <li>Envíos gratuitos en CABA</li>
                <li>Envíos a bajo costo en GCBA</li>
                <li>Envíos al resto del país</li>
                </ul> 
            </div>
            <div class="col">
                <ul class="footer_info">
                <li><a href="https://www.whatsapp.com/"><img src="imagenes/whatsapp.png" alt="Icono de whatsapp" class="footer_iconos" width="512" height="512"></a></li>
                </ul>
            </div>
            <div class="col">
                <ul class="footer_info">
                <li><a href="https://www.instagram.com/"><img src="imagenes/instagram.png" alt="Icono de instagram" class="footer_iconos" width="920" height="920"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p>&copy; <?php echo date("Y"); ?> Página creada con fines estudiantiles.</p>
    </div>
</footer>