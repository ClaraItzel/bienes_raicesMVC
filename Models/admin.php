<?php 
namespace Model;
class Admin extends ActiveRecord{
    //base de datos
    protected static $tabla= 'usuarios';
    protected static $columnasDB= ['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args=[])
    {
        $this->id= $args['id'] ?? null;
        $this->email= $args['email'] ?? null;
        $this->password= $args['password'] ?? null;
    }
    public function validar()
    {
        if (empty($this->email)) {
            self::$errores[]='El email es obligatorio';
        }
    {
        if (empty($this->password)) {
            self::$errores[]='El password es obligatorio';
        }
    }
    return self::$errores;
    }
    public function existeUsuario(){
        //Revisando si un usuario existe o no

        $query= "SELECT * FROM ".self::$tabla." WHERE email = '". $this->email."' LIMIT 1"; 
        $result=self::$db->query($query);
        if(!$result->num_rows){
            self::$errores[]='no existe el usuario';
            return;
        }else{
            return $result;
        }
    }
    public function verificandoPSW($result){
        $usuario= $result->fetch_object();
        $autenticado= password_verify($this->password, $usuario->password);

        if (!$autenticado) {
            self::$errores[]='El usuario o la contraeña son incorrectos';
        }
        return $autenticado;
    }
    public function autenticando(){
        session_start();

        //lenando arreglo de sesion 
        $_SESSION['usuario']=$this->email;
        $_SESSION['login']=true;
        header('Location: /admin');
    }
}
?>