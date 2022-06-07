<?php 

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($inicio)) {
    $inicio=false;    
}
$auth= $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../public/build/css/app.css">
</head>
<body>
    <header class="header  <?php echo $inicio  ?'inicio':''; ?>">
        <div class="contenedor contenido_header">
            <div class="barra">
                <div class="barra__flex">
                    <a class="barra__img" href="/">
                       <img src="../public/build/img/logo.svg"   alt="logotipo de bienes raíces">
                   </a>
                   <div class="mobile__img">
                       <img src="../public/build/img/barras.svg" alt="">
                   </div>
                </div>
                  
                   <div class="derecha">
                       <img src="../public/build/img/dark-mode.svg" alt="" class="darkmode">
                       <nav data-cy="nav-header" class="navegacion">
                       <a href="nosotros">Nosotros</a>
                       <a href="anuncios">Anuncios</a>
                       <a href="blog">Blog</a>
                       <a href="contacto">Contacto</a>
                    <?php if($auth): ?>
                        <a href="/logout">Log Out</a>
                    <?php endif; ?>
                    </nav>
                    
                   </div>

            </div><!--Cierre de la barra-->
            <?php 

                echo $inicio ? '<h1 data-cy="heading-sitio"> Venta de casa y departamentos de lujo </h1>' :'';

            ?>
        </div>
    </header>
    <?php echo $contenido ;?>

    <footer class="footer seccion">
        <div class="contenedor contenedor_footer">
            <nav data-cy="nav-footer" class="navegacion">
                <a href="nosotros">Nosotros</a>
                <a href="anuncios">Anuncios</a>
                <a href="blog">Blog</a>
                <a href="contacto">Contacto</a>
            </nav>
            <?php $fecha = date('Y') ?>
       <p class="copy"> Todos los derechos reservados <?php echo $fecha ?> &copy</p>

        </div>
        
    </footer>
    <script src="/public/build/js/bundle.min.js"></script>
</body>
</html>