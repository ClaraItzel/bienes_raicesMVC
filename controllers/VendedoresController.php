<?php 
namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedoresController{
    public static function crear(Router $router){ 
        $vendedores=new Vendedor;
        $errores= Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $vendedor= new Vendedor($_POST['vendedor']);

        //Validando que no haya campos vacíos
        $errores=$vendedor->validar();
        //Si no hay errores
        if (empty($errores)) {
            $vendedor->guardar();
        }
        }
        $router->render('vendedores/crear',[
            'vendedor'=>$vendedores,
            'errores'=>$errores
           ]);
    }
    public static function updt(Router $router){
        $id = validandoORedireccionando('/admin');
        $vendedores= Vendedor::find($id);
        $errores= Vendedor::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args= $_POST['vendedor'];
            //Sincronizando objeto en memoria
            $vendedores->sincronizar($args);
            //validacion
            $errores= $vendedores->validar();
            if (empty($errores)) {
                $vendedores->guardar();
            }
        }
        $router->render('vendedores/actualizar',[
            'vendedor'=>$vendedores,
            'errores'=>$errores
           ]);
    } 
    public static function delete(){

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
  

            $id= $_POST['id'];

            $id= filter_var($id,FILTER_VALIDATE_INT);
            if ($id) {
                $tipo= $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                   
                        $vendedor= Vendedor::find($id);
                        $vendedor->eliminar();
                   
                }
            }
       
        
    }
    }
}

?>