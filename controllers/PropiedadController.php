<?php 
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Imge;

class PropiedadController{
    public static function index(Router $router){
        $propiedades= Propiedad::all();
        $vendedores= Vendedor::all();
        $mensaje= $_GET["registrado"] ?? null; //Busca este valor y si no lo encuentra le asigna null
       $router->render('propiedades/admin',[
           'propiedades'=> $propiedades,
           'mensaje'=>$mensaje,
           'vendedores'=>$vendedores
       ]);
    }
    public static function crear(Router $router){
        $propiedad= new Propiedad;
        $vendedores= Vendedor::all();
        //Arreglo con msj de error
        $errores=Propiedad::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad= new Propiedad($_POST['propiedad']);
            //subiendo archivos
           
         
            //Generar un nombre unico a las imagenes
            $nombreImagen= md5( uniqid( rand(), true )).'.jpg';
              //Asignar files a una variable
                $img=$_FILES['propiedad']["tmp_name"];

                //Realiza un resize a la imagen con intervetion
                if ($img['imagen']) {
                $imagen= Imge::make($img['imagen'])->fit(800,600);
                //Subida de archivos a la BD setteando la img
                $propiedad->setImagen($nombreImagen);
                }
               
            $errores= $propiedad->validar();
        
            
        
        if (empty($errores)) {
            
           
               /*Primero creamos una carpeta */
        
               if(!is_dir(CARPETA_IMAGENES)){
                  mkdir(CARPETA_IMAGENES); 
               }
           //Guarda la imagen en el servidor
           $imagen->save( CARPETA_IMAGENES .$nombreImagen);
               //GUarda en bd
          $resultado= $propiedad->guardar(); 
         
        }
        
        }
       $router->render('propiedades/crear',[
        'propiedad'=> $propiedad,
        'vendedores'=>$vendedores,
        'errores'=>$errores
       ]);
    }
public static function updt(Router $router){
        $id = validandoORedireccionando('/admin');
        $propiedad= Propiedad::find($id);
        $vendedores= Vendedor::all();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
        //Asignar atributos
        $args= $_POST['propiedad']; 
        $propiedad->sincronizar($args);
        $errores=$propiedad->validar();
        //Generar un nombre unico a las imagenes
            $nombreImagen= md5( uniqid( rand(), true )).'.jpg';
        //Asignar files a una variable
        $img=$_FILES['propiedad']["tmp_name"];

        //Realiza un resize a la imagen con intervetion
        if ($img['imagen']) {
        $imagen= Imge::make($img['imagen'])->fit(800,600);
        //Subida de archivos a la BD setteando la img
        $propiedad->setImagen($nombreImagen);

        }

        if (empty($errores)) {
            //Almacenar imagen
            if (!empty($img['imagen'])) {
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);
            }
            //insertar en la bd
            $resultado=$propiedad->guardar();
        }

    }
        //Arreglo con msj de error
        $errores=Propiedad::getErrores();
        $router->render('propiedades/actualizar',[
            'propiedad'=> $propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
           ]);
    }
    public static function delete(){
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id= $_POST['id'];
            $id= filter_var($id,FILTER_VALIDATE_INT);
            if ($id) {
                $tipo= $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad= Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }

} 

?>