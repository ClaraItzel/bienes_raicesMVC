

<main class="contenedor seccion">
        <h1>Crear</h1>
        <?php foreach ($errores as $error): ?>
        <?php echo '<p class="alerta error">'.$error.'</p>';?>
           <?php endforeach; ?>
           <a href="/admin" class="anuncio__btn--verde">Volver</a>
        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include __DIR__.'/form.php' ?>
            <input type="submit" class="anuncio__btn" value="Crear propiedad">
        </form>
        
</main>