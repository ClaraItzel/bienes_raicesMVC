<?php
namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla="vendedores";
    protected static $columnasdb= ['id', 'nombre', 'apellidos', 'telefono'];

    public $id;
    public $nombre;
    public $apellidos;
    public $telefono;

    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    public function validar(){

     
        if(!$this->nombre){
            self::$errores[]= "Debes añadir un nombre";
        }
        if(!$this->apellidos){
            self::$errores[]= "Debes añadir apellidos";
        }
        if(!$this->telefono){
            self::$errores[]= "Debes añadir un teléfono";
        }
        if (!preg_match('/[0-9]{10}/',$this->telefono)) {
            self::$errores[]="Escribe un número de teléfono válido";
        }
        return self::$errores;
    }
}

?>