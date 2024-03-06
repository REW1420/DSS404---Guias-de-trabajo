<?php


interface leer
{
    function tieneLibro($titulolibro);
    function leeLibro();
}
//Definiendo la clase abstracta persona

abstract class persona
{

    private static $numPersonas = 0; //número total de personas
    protected $nombre = ''; //Nombre de la persona
    protected $fechaNac = ''; //Fecha de nacimiento de la persona
//Constructor de la clase abstracta persona
    function __construct($nombrePersona = 'sin nombre')
    {
        self::$numPersonas++;
        $this->nombre = $nombrePersona;
    }

    //Método que llevará el control de cuántas veces se ha clonado la clase persona
    function __clone()
    {
        self::$numPersonas++;
    }


    function __destruct()
    {
        self::$numPersonas--;
    }

    function __toString()
    {
        $cadena = 'nombre(' . $this->nombre;
        $cadena .= 'Poblaci&oacute;n(' . self::$numPersonas . ')';
        return $cadena;
    }


    final public static function poblacion()
    {
        return self::$numPersonas;
    }

    final public function asignaNombre($nombreAsignado)
    {
        $this->nombre = $nombreAsignado;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }


    abstract public function ocupacionPrincipal();
}



class empleado extends persona implements leer
{
    //Propiedades de la clase empleado
    private static $idEmpleados = 0; //Número de empleados
    protected $id; //Id del empleado
    private $libro = NULL; //Titulo del libro que está leyendo
//Constructor de la clase empleado
    function construct($nombreEmpleado)
    {
        parent::__construct($nombreEmpleado); //Invocando al constructor de clase padre
        self::$idEmpleados++;
        $this->id = self::$idEmpleados;
    }

    //Destructor de la clase empleado
    function _destruct()
    {
        parent::_destruct();
        self::$idEmpleados--;
    }

    function _clone()
    {
        parent::_clone();
        self::$idEmpleados++;
        $this->id = self::$idEmpleados;
    }
    function _toString()
    {
        $cadena = __CLASS__ - ": id($this->id) nombre($this->nombre)";
        $cadena .= 'poblaci&oacute;n(' . parent::poblacion() . ')';

        if (!empty($this->libro)) {
            $cadena .= $this->leerLibro();
        }
        return $cadena;
    }

    public function ocupacionPrincipal()
    {
        return 'trabajar';
    }

    public function tieneLibro($titulolibro)
    {

        $this->libro = $titulolibro;
    }

    public function leelibro()
    {
        if (empty($this->libro))

            return 'No est&aacute; leyendo ning&uacute;n libro actualmente.;';
        else


            return "Est&aacute; leyendo \"$this->libro\"";
    }
}


//Definiendo la clase estudiante..
//Esta clase implementará también la interface leer
class estudiante extends persona implements leer
{
    //Métodos de la clase abstracta estudiante
    protected $estudios; //Estudios realizados 
    private $libro = NULL; //Titulo de libro que está leyendo

    function __construct($nombreEstudiante, $estudios = "")
    {

        parent::__construct($nombreEstudiante);
        $this->estudios = $estudios;
    }
    function destruct()
    {
        parent::_destruct();
    }

    function _clone()
    {
        parent::_clone();
    }

    public function _toString()
    {
        $cadena = __CLASS__ . ": nombre($this->nombre)";
        $cadena .= "estudios($this->estudios) poblaci&oacute;n(";
        $cadena .= parent::poblacion() . ")<br/>";
        if (!empty($this->libro)) {
            $cadena .= $this->leeLibro();
        }
        return $cadena;
    }


    public function ocupacionPrincipal()
    {
        return "estudiar($this->estudios)";
    }

    public function tieneLibro($titulolibro)
    {
        $this->libro = $titulolibro;
    }

    public function leelibro()
    {
        if (empty($this->libro))
            return 'No est&aacute; leyendo ning&uacute;n libro actualmente.';
        else
            return " est&aacute; leyendo \"$this->libro\"";
    }
}


class bebe extends persona
{
    //Constructor de la clase bebe
    function construct($nombreBebe)
    {
        parent::__construct($nombreBebe);
    }
    //Destructor de la clase bebe.
    function destruct()
    {
        parent::_destruct();
    }
    function clone ()
    {
        parent::_clone();
    }
    public function ocupacionPrincipal()
    {
        return 'Comer y dormir';
    }
}
?>