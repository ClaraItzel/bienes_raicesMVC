<?php


define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT']. '/public/imagenes/');
function incluirTemplate(string $nombre, bool $inicio= false){
    include TEMPLATES_URL.'/'.$nombre.'.php';
}
function estaAutenticado() {
    session_start();
     
    if(!isset($_SESSION['login'])){
    header('Location: /bienes_raices');

    }
    
    
}
function debuggeando($param){
    echo'<pre>';
    var_dump($param);
    echo'</pre>';
    exit;
}
//Escapa / Sanitiza el HTML
function s($html) : string{
    $s= htmlspecialchars($html);
    return $s; 
}
//Valindando el tipo de contenido
function validarTipoContenido($tipo){
    $tipos=['vendedor','propiedad'];

    return in_array($tipo,$tipos);
}
//muestra los mensajes

function mostrandoNotificacion($codigo){
    $mensaje="";

    switch($codigo){
        case 1:
            $mensaje="El Registro Ha Sido Creado Correctamente";
            break;
        case 2:
            $mensaje="El Registro ha Sido Actualizado Correctamente";
            break;
        case 3:
            $mensaje="El Registro ha Sido Eliminado Correctamente";
            break;
        default:
        $mensaje= false;
        break;
    }
    return $mensaje;
}
function validandoORedireccionando( string $url){
    $id= filter_var($_GET['id'], FILTER_VALIDATE_INT) ;


    if (!$id) {
        header("location: ${url}");
    }
    return $id;
}