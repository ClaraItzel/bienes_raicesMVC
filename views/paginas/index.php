<main class="contenedor seccion" data-cy="iconos-nosotros">
        <h3 data-cy="heading-nosotros">Más sobre nosostros</h3>
        <div class="iconos__nosotros">
            <div class="icono">
                <img src="/public/build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>
                    Minus incidunt quasi veniam quo doloribus doloremque, odit corrupti iusto voluptatum quis, et pariatur nulla cum est dolor provident ullam adipisci aut.
                </p>
            </div>
            <div class="icono">
                <img src="/public/build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>
                    Minus incidunt quasi veniam quo doloribus doloremque, odit corrupti iusto voluptatum quis, et pariatur nulla cum est dolor provident ullam adipisci aut.
                </p>
            </div>
            <div class="icono">
                <img src="/public/build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>
                    Minus incidunt quasi veniam quo doloribus doloremque, odit corrupti iusto voluptatum quis, et pariatur nulla cum est dolor provident ullam adipisci aut.
                </p>
            </div>
        </div>
    </main>
    <section class="section contenedor" data-cy="bloque-anuncios">
        <h2 data-cy="heading-anuncios">Casas y depas en venta</h2>
        <?php
    
        include 'listado.php' ?>
        <div class="todas alinear_derecha">
            <a href="anuncios" data-cy="ver_todas" class="anuncio__btn--verde">Ver todas</a>
        </div>
    </section>
    <section data-cy="img-contacto" class="img__contacto">
        <h2>Encuentra la clase de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contanto contigo a la brevedad</p>
        <a href="contacto" class="anuncio__btn--block"> Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>
            <article  data-cy="blog" class="blog__entrada">
                <div class="blog__imagen">
                        <picture>
                            <source srcset="/public/build/img/blog1.webp" type="image/webp">
                            <source srcset="/public/build/img/blog1.jpg" type="image/jpg">
                            <img src="/public/build/img/blog1.jpg" alt="Entrada Blog" loading="lazy">
                        </picture>
                </div>            
                <div class="blog__texto">
                    <a href="entrada">
                       <h4>Terraza en el techo de tu casa</h4> 
                        </a>
                    <p>Escrito el: <span> 05/04/2021</span> por <span>Juanito Torombolord</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores meteriales y ahorrando dinero</p>
                </div>    
            </article>
            <article class="blog__entrada">
                <div class="blog__imagen">
                        <picture>
                            <source srcset="/public/build/img/blog2.webp" type="image/webp">
                            <source srcset="/public/build/img/blog2.jpg" type="image/jpg">
                            <img src="/public/build/img/blog2.jpg" alt="Entrada Blog" loading="lazy">
                        </picture>
                </div>            
                <div class="blog__texto">
                    <a href="entrada">
                        <h4>
                           Guía para la decoracion de tu hogar   
                        </h4>
                       </a>
                    <p>Escrito el: <span> 02/04/2021</span> por <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </div>    
            </article>
        </section>
        <section data-cy="testimonial" class="testimoniales">
                <h3>Testimoniales</h3>
                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente manera, muy buena atención y la casa que me ofrecieron cumple con todas mis espectativas.
                    </blockquote>
                    <p>-CG Arriaga</p>
                </div>
        </section>
    </div>
    </section>