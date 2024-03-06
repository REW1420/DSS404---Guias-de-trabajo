<?php

class coordenadas
{

    private $coords = array("x" => 0, "y" => 0);
    function __get($property)
    {
        if (array_key_exists($property, $this->coords)) {
            return $this->coords[$property];
        } else {
            printf("Error: Solo se aceptan coordenadas x y. <br> \n");
        }
    }

    function __set($property, $value)
    {
        if (array_key_exists($property, $this->coords)) {
            $this->coords[$property] = $value;
        } else {
            printf("Error: Solo se aceptan coordenadas x y. <br> \n");
        }
    }
}

?>