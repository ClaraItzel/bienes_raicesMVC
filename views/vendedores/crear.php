<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>
        <a href="/admin" class="anuncio__btn--verde">Volver</a>
        <?php foreach ($errores as $error): ?>
        <?php echo '<p class="alerta error">'.$error.'</p>';?>
           <?php endforeach; ?>
        <form class="form" method="POST">
            <?php include __DIR__.'/form.php' ?>
            <input type="submit" class="anuncio__btn" value="Dar de alta">
        </form>
</main>