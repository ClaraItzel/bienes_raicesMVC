
<main class="contenedor seccion">
        <h1>Administrador de bienes raíces</h1>
        <?php 
        if (isset($mensaje)) {
            $mensaje= mostrandoNotificacion(intval($mensaje));
            if (!empty($mensaje)) : ?>
               <p class="alerta exito">
                   <?php echo s($mensaje); ?>
            </p>
               <?php      
            endif;
        }
            
        ?>
        
        <a href="/propiedades/crear" class="anuncio__btn--block">Nueva propiedad</a>
        <a href="/vendedores/crear" class="anuncio__btn--block">Nuevo vendedor</a>
        <h2>Propiedades</h2>
        <div class="tabla">
        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

            </thead>
            <tbody> <!--Se muestran resultados -->
            <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    
                        <td class="propiedades__num"><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td><img src="../../public/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de <?php echo $propiedad->titulo; ?>"></td>
                        <td class="center"> $<?php echo $propiedad->precio; ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                                <input type="hidden" name="id" id="id" value="<?php echo $propiedad->id ?>">
                                <input type="hidden" name="tipo" id="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="btn__block--rojo">
                            </form>
                           
                            <a href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="btn__block--amarillo">Actualizar</a>
                        </td>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                   
                    <th>Acciones</th>
                </tr>

            </thead>
            <tbody> <!--Se muestran resultados -->
            <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    
                        <td class="propiedades__num"><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre." ".$vendedor->apellidos; ?></td>
                        <td class="center"> <?php echo $vendedor->telefono; ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">
                                <input type="hidden" name="id" id="id" value="<?php echo $vendedor->id ?>">
                                <input type="hidden" name="tipo" id="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="btn__block--rojo">
                            </form>
                           
                            <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="btn__block--amarillo">Actualizar</a>
                        </td>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
        </div>
        
    </main>
