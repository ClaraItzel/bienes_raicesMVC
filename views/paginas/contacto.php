<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo_contacto">Contacto</h1>
        <?php 
        if ($mensaje) :
        ?>
        <p class="alerta exito" data-cy="form-alerta"><?php echo $mensaje ?></p>
        <?php endif; ?>
        <picture>
            <source srcset="/public/build/img/destacada3.webp" type="image/webp">
            <source srcset="/public/build/img/destacada3.jpg" type="image/jpg">
            <img src="/public/build/img/destacada3.jpg" alt="formulario" loading="lazy">
        </picture>
        <h3 data-cy="heading-form">Llene el formulario de contacto</h3>
     <form data-cy="form-contacto" class="form" action="/contacto" method="POST">
         <fieldset>
             <legend>Informacion personal</legend>
             <label  for="nombre"> Nombre</label>
             <input data-cy="input-name" type="text" placeholder="Ej. Juan" id="nombre" name="contacto[nombre]" required>
             
            
             <label for="msj"> Mensaje</label>
             <textarea data-cy="txt-msj" id="msj" name="contacto[msj]" required></textarea>
         </fieldset>
         <fieldset>
             <legend>Información sobre la propiedad</legend>
             <label for="opc"> Vende o compra</label>
             <select data-cy="input-opc" id="opc" name="contacto[tipo]" required>
                 <option value="" selected disabled>--Seleccione--</option>
                 <option value="Compra">Compra</option>
                 <option value="Vende">Vende</option>
           
             </select>
             <label for="precio"> Precio o presupuesto</label>
             <input type="number" data-cy="input-precio" required name="contacto[precio]" placeholder="Ej. 500,000" min="1" id="precio">
         </fieldset>
         <fieldset>
             <legend>
                 Información sobre la propiedad
             </legend>
             <p>¿Cómo desea ser contactado?</p>
             <div class="contacto">
                 <label for="contactar__tel">Teléfono</label>
                 <input data-cy="input-radio" name="contacto[contacto]" type="radio" value="telefono" id="contacto__tel" required>

                <label for="contactar__mail">Email</label>
                 <input data-cy="input-radio" name="contacto[contacto]" type="radio" value="Email" id="contacto__mail" required>
             </div>
             <div id="contacto"></div>
         
         </fieldset>
         <input type="submit" class="anuncio__btn--verde" value="Enviar">
     </form>
    </main>