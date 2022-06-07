<div class="contenedor__anuncios">
    <?php foreach($propiedades as $propiedad): ?>
            <div class="anuncio">
                <picture>
                   <img src="/public/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio1" loading="lazy">
                <picture>
                <div class="anuncio__contenido">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p class="anuncio_altura"><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"> $<?php echo $propiedad->precio; ?></p>
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
                     <a data-cy="enlace-anuncios" class="anuncio__btn" href="anuncio?id=<?php echo $propiedad->id; ?>">Ver Propiedad</a>
                </div><!--Contenido anuncio-->
            </div>  <!--Anuncio-->
            <?php endforeach;?>
        </div><!--Contenedor Anuncio-->