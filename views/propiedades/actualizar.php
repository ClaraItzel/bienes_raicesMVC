

<main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="anuncio__btn--verde">Volver</a>
        <?php foreach ($errores as $error): ?>
        <?php echo '<p class="alerta error">'.$error.'</p>';?>
           <?php endforeach; ?>
        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include __DIR__.'/form.php' ?>
            <input type="submit" class="anuncio__btn" value="Actualizar propiedad">
        </form>
        
</main>