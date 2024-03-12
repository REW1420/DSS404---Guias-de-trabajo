<?php 

class auto {
    private $marca;
    private $modelo;
    private $color;
    private $image;

    function __construct($marca = "Honda",$modelo="Civic", $color="Rojo",$image ="imga/hondacivic.jgp"){
        $this-> marca = $marca;
        $this-> modelo = $modelo;
        $this-> color = $color;
        $this-> image = $image;

    }

    function mostrar() {

        $tabla = "<table style=\"width:200;border:rige 5px rgb(200,50,150)\">\n";
        $tabla .= "<caption> Compra un " . $this->marca . "</caption>";
        $tabla .= "<tr>\n<td style=\"width:35%\">MARCA</td>\n";
        $tabla .= "<td>\n<td style=\"width:35%\">" . $this->marca . "</td>\n";
        $tabla .= "<td rowspan=\"3\" style=\"width:35%\"><img src=\"" . $this->image . "\"> </td></tr>";
        
        $tabla .= "<tr>\n<td style=\"width:35%\">MODELO</td>\n";
        $tabla .= "<td>\n<td style=\"width:35%\">" . $this->modelo . "</td>\n";

        
        $tabla .= "<tr>\n<td style=\"width:35%\">COLOR</td>\n";
        $tabla .= "<td>\n<td style=\"width:35%\">" . $this->color . "</td>\n";
        echo $tabla;
        
    }
}

?>