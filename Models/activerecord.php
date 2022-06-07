<?php 
namespace Model;

class ActiveRecord{
    //Creando conexion a BD
    protected static $db;
    protected static $tabla="";
    protected static $columnasdb= [];
    //Errores
    protected static $errores = [];



     //Definiendo conexion a la bd
     public static function setDb($database){
        self::$db= $database;
    }
    public function guardar(){
        if (!is_null($this->id) ) {
           $this->updt();
        }else{
            $this->crear();
        }
    }
    
    public function crear(){
        //sanitizando datos
        $atributos= $this->sanitizarDatos();

    //insertar en la bd
    $query ="INSERT INTO ".static::$tabla." (";
    $query.=join(', ',array_keys( $atributos));
    $query.= " ) Values('";
    $query.=join("' , '",array_values( $atributos));
    $query.="' ) ";

 
       $resultado= self::$db->query($query);
       if ($resultado) {
        header('Location:/admin?registrado=1');
        } 
    }
    //identifica las entradas de la bd
    public function atributos(){
        $atributos= [];
        foreach(static::$columnasdb as $col){
            if ($col=== 'id') continue;
                $atributos[$col]= $this->$col;
            
           
        }
        return $atributos;
    }
    public function updt(){
       //sanitizando datos
       $atributos= $this->sanitizarDatos();

       $valores= [];

       foreach($atributos as $key=>$val){
           $valores[]="{$key}='{$val}'";
       }
       $query= "UPDATE ".static::$tabla." SET ";
       $query.=join(',',$valores);
       $query.=" WHERE id ='".self::$db->escape_string($this->id)."'";
       $query.=" LIMIT 1";
      $resultado=self::$db->query($query);
      
    if ($resultado) {
        //Se redirecciona al usuario
         header('location: /admin?msj=registadoCorrectamente&registrado=2');
     }
    }
    //Borrando un registro
    public function eliminar(){
           //Elimina la propiedad de la db
           $query= "DELETE FROM ".static::$tabla." WHERE id= ".self::$db->escape_string($this->id)." LIMIT 1";
           $resultado= self::$db->query($query);
           if ($resultado):
            $this->borrarImagen();
            header('location: /admin?registrado=3');
           endif;
        
    }
   public function sanitizarDatos(){
    $atributos= $this->atributos();
    $sanitizado=[];
    foreach($atributos as $key => $value){
        $sanitizado[$key]= self::$db->escape_string($value);
    }
    return $sanitizado;
   }

   //Validacion
   public static function getErrores(){
       return static::$errores;
   }

   //Subiendo imagenes con la libreria intervetion Image
   public function setImagen($imagen){
       //Eliminando imagen anterior
       if (!is_null($this->id)) {
           $this->borrarImagen();
       }
       //Asignar al atributo el nombre de la imagen
       if (isset($imagen)) {
           $this->imagen= $imagen;
       }
   }
   public function borrarImagen(){
     //Comprobar si existe el archivo
     $existeArch= file_exists(CARPETA_IMAGENES . $this->imagen);
     if ($existeArch) {
       
         unlink(CARPETA_IMAGENES . $this->imagen);
     }
   }
   public function validar(){
    static::$errores=[];
    return static::$errores;
   }
   //listando propiedades
   public static function all(){
   $query= "SELECT * FROM ".static::$tabla;
    $result= self::consultarSQL($query);
    return $result;
   }
   //Obteniendo numero determinado de registros
   public static function get($cantidad){
    $query= "SELECT * FROM ".static::$tabla . " LIMIT ".$cantidad;
     $result= self::consultarSQL($query);
     return $result;
    }
   //Buscando propiedad por si ID o registro
   public static function find($id){
    $query="SELECT * FROM ".static::$tabla." WHERE id=".$id;
    $result= self::consultarSQL($query);
    return array_shift($result);
   }
   public static function consultarSQL($query){
    //Consultando bd
    $resultado= self::$db->query($query);
    //iterando
    $array=[];
    while($registro = $resultado->fetch_assoc()):
        $array[]=static::crearObj($registro);
    endwhile;
    //liberar memoria
    $resultado->free();
    //retornar result
    return $array;
       }
   protected static function crearObj($registro){
    $obj= new static;

    foreach($registro as $key => $val){
       if (property_exists( $obj, $key )) {
           $obj->$key = $val;
       }
       
    }
        return $obj;
    }
    //SICRONIZA EL OBJETO CON LOS CAMBIOS REALIZADOS POR EL USUARIO
    public function sincronizar($args=[]){
        foreach($args as $key=>$value){
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key= $value;
            }
        }
    }
}
?>