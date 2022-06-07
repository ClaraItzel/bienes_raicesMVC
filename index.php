<?php 
require_once __DIR__.'/includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PaginasController;
use Controllers\PropiedadController;
use Controllers\VendedoresController;


$router=new Router();

$router->get('/admin',[PropiedadController::class,'index']);
$router->get('/propiedades/crear',[PropiedadController::class,'crear']);
$router->post('/propiedades/crear',[PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'updt']);
$router->post('/propiedades/actualizar',[PropiedadController::class,'updt']);
$router->post('/propiedades/eliminar',[PropiedadController::class,'delete']);
//vendedores
$router->get('/vendedores/crear',[VendedoresController::class,'crear']);
$router->post('/vendedores/crear',[VendedoresController::class,'crear']);
$router->get('/vendedores/actualizar',[VendedoresController::class,'updt']);
$router->post('/vendedores/actualizar',[VendedoresController::class,'updt']);
$router->post('/vendedores/eliminar',[VendedoresController::class,'delete']);
//Pagina principal
$router->get('/',[PaginasController::class,'index']);
$router->get('/nosotros',[PaginasController::class,'nosotros']);
$router->get('/anuncios',[PaginasController::class,'propiedades']);
$router->get('/anuncio',[PaginasController::class,'propiedad']);
$router->get('/propiedad',[PaginasController::class,'propiedad']);
$router->get('/blog',[PaginasController::class,'blog']);
$router->get('/entrada',[PaginasController::class,'entrada']);
$router->get('/contacto',[PaginasController::class,'contacto']);
$router->post('/contacto',[PaginasController::class,'contacto']);
 
//login y autenticacion
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);
$router->comprobandoRutas();
?>