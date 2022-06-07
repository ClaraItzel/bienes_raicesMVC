<fieldset>
                <legend>Información General</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name='vendedor[nombre]' placeholder="Ej. Juanito" value="<?php echo s($vendedor->nombre); ?>">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name='vendedor[apellidos]' placeholder="Ej. Torombolord" value="<?php echo s($vendedor->apellidos); ?>">
                
</fieldset>
<fieldset>
                <legend>Información Extra</legend>
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name='vendedor[telefono]' placeholder="Ej. +52 55 5555 5555" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>