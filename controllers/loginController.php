<?php 
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){
        $errores=[];
        if ($_SERVER['REQUEST_METHOD']==='POST') {
           
            $auth= new Admin($_POST);

            $errores=$auth->validar();
     
            if (empty($errores)) {
               $result= $auth->existeUsuario();
               if (!$result) {
                   $errores= Admin::getErrores();
               }else{
                   //VerificandoPaswword
                  $autenticado= $auth->verificandoPSW($result);
                  if ($autenticado) {
                      //autenticando el user.
                      $auth->autenticando();
                  }else{
                    $errores= Admin::getErrores();
                  }
               }
            }
          
        }

        $router->render('auth/login',[
            'errores'=>$errores
        ]);
    }
    public static function logout(){
        session_start();
      
        $_SESSION=[];
        header('Location: /');
    }
}

?>