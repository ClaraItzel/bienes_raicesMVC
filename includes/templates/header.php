<?php 

if (!isset($_SESSION)) {
    session_start();
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
    <link rel="stylesheet" href="/bienes_raices/build/css/app.css">
</head>
<body>
    <header class="header  <?php echo $inicio  ?'inicio':''; ?>">
        <div class="contenedor contenido_header">
            <div class="barra">
                <div class="barra__flex">
                    <a class="barra__img" href="/">
                       <img src="/bienes_raices/build/img/logo.svg"   alt="logotipo de bienes raíces">
                   </a>
                   <div class="mobile__img">
                       <img src="/bienes_raices/build/img/barras.svg" alt="">
                   </div>
                </div>
                  
                   <div class="derecha">
                       <img src="/bienes_raices/build/img/dark-mode.svg" alt="" class="darkmode">
                       <nav class="navegacion">
                       <a href="nosotros">Nosotros</a>
                       <a href="anuncios">Anuncios</a>
                       <a href="blog">Blog</a>
                       <a href="contacto">Contacto</a>
                    <?php if($auth): ?>
                        <a href="cerrarSesion.php">Log Out</a>
                    <?php endif; ?>
                    </nav>
                    
                   </div>

            </div><!--Cierre de la barra-->
            <?php 

                echo $inicio ? '<h1> Venta de casa y departamentos de lujo </h1>' :'';

            ?>
        </div>
    </header>