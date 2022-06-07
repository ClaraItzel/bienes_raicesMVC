
<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="header-login">Iniciar sesión</h1>
        <?php foreach($errores as $error): ?>
            
            <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
        <?php endforeach; ?>
        <form data-cy="form-login" method="POST" class="form" action="/login">
        <fieldset>
             <legend>Email y Password</legend>
            
             <label for="email"> Email</label>
             <input data-cy="input-email" type="email" placeholder="Ej. correo@correo.com" required id="email" name="email">
             <label for="pass"> Password</label>
             <input data-cy="input-psw" type="password" placeholder="Pon tu password" required id="password" name="password">
            
         </fieldset>
         <input type="submit" value="Iniciar sesión" class="btn anuncio__btn--verde">
        </form>
    </main>