<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo-anuncio"><?php echo $propiedad->titulo;?></h1>
        
            <img src="/public/imagenes/<?php echo $propiedad->imagen; ?>" alt="Casa en frente del bosque" loading="lazy">
        
        <div class="propiedadTxt">
            <p class="precio">$<?php echo $propiedad->precio; ?></p>
            <ul class="anuncio__iconos">
                <li>
                    <picture>
                        <source srcset="/public/build/img/wc.webp" type="image/webp">
                        <source srcset="/public/build/img/wc.jpg" type="image/jpg">
                        <img src="/public/build/img/wc.jpg" alt="Cantidad de baños" loading="lazy">
                    </picture>
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
            
                <li>
                    <picture>
                        <source srcset="/public/build/img/coche.webp" type="image/webp">
                        <source srcset="/public/build/img/coche.jpg" type="image/jpg">
                        <img src="/public/build/img/coche.jpg" alt="Cantidad de estacionamientos" loading="lazy">
                    </picture>
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
              
                <li>
                    <picture>
                        <source srcset="/public/build/img/cama.webp" type="image/webp">
                        <source srcset="/public/build/img/cama.jpg" type="image/jpg">
                        <img src="/public/build/img/cama.jpg" alt="Cantidad de dormitorios" loading="lazy">
                    </picture>
                   <p><?php echo $propiedad->habitaciones; ?></p> 
                </li>
             </ul>
             <?php echo $propiedad->descripcion; ?>
        </div>
    </main>