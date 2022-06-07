<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index( Router $router){
        $propiedades=Propiedad::get(3);
        $inicio=true;
       $router->render('paginas/index',[
           "propiedades"=>$propiedades,
           "inicio"=>$inicio
       ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[
         
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades=Propiedad::all();
        $router->render('paginas/propiedades',[
            "propiedades"=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){

        $id=validandoORedireccionando('/anuncios');
        $propiedad= Propiedad::find($id);
        $router->render('paginas/anuncio',[
            "propiedad"=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){
        $mensaje= null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas= $_POST['contacto'];
            //Crando instancia de php mailer

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '2f32229621af98';
            $mail->Password = '67c69c5b60a171';

            //Contenido del email

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('claraitzellel@gmail.com','claraitzellel@gmail.com');
            $mail->Subject="Tienes un nuevo mensaje";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet='UTF-8';
            $contenido= '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje </p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre'] .' </p>';
            $contenido .= '<p>Mensaje: '. $respuestas["msj"] .' </p>';
          

            //Enviando de forma condicional
            if ($respuestas['contacto']==='telefono') {
                $contenido .= '<p>Este usuario prefiere ser contactado por: Teléfono </p>';
                $contenido .= '<p>Disponibilidad: '. $respuestas["fecha"] .' en el horario '.$respuestas["hora"].' </p>';
            }else{
                $contenido .= '<p>Este usuario prefiere ser contactado por: Email </p>';
                $contenido .= '<p>Email: '. $respuestas["email"] .' </p>';
            }
            $contenido .= '<p>Telefono: '. $respuestas["telefono"] .' </p>';
            $contenido .= '<p>Vende o compra: '. $respuestas["tipo"] .' </p>';
            $contenido .= '<p>Precio o presupuesto: $'. $respuestas["precio"] .' </p>';
            $contenido .= '<p>Este usuario prefiere ser contactado por: '. $respuestas["contacto"] .' </p>';
           
            $contenido .= '</html>';
            $mail->Body= $contenido;
            $mail->AltBody="Esto es texto alternativo sin HTML";
            //Enviando email
            if( $mail->send()){
                $mensaje='mensaje enviando correctamente';
            }else{
               $mensaje='El mensaje no se pudo mandar';
            }

        }
      $router->render('paginas/contacto',[
       'mensaje'=>$mensaje

      ]);
    }

}
?>
