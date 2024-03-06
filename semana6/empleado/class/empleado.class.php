<?php

class empleado
{

    private static $idEmpleado = 0;
    private $id;
    private $nombre;
    private $apellido;
    private $isss;
    private $renta;
    private $afp;
    private $sueldoNominal;
    private $sueldoLiquido;
    private $pagoxhoraextra;

    function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->sueldoLiquido = 0.0;
        $this->pagoxhoraextra = 0.0;
    }

    //Destructor de la clase
    function destruct()
    {
        echo "\n<p class=\"msg\">El salario y descuentos del empleado han sido calculados.</p>\n";
        $backlink = "<a class=\"a-btn\" href=\"sueldoneto.php\">\n";
        $backlink .= "\t<span class=\"a-btn-symbol\">1</span>\n";
        $backlink .= "\t<span class=\"a-btn-text\">Calcular salario </span>\n";
        $backlink .= "\t<span class=\"a-btn-slide-text\">a otro empleado</span>\n";
        $backlink .= "\t<span class=\"a-btn-slide-icon\"></span>\n";
        $backlink .= "</a>\n";
        echo $backlink;
    }
    //Métodos de la clase empleado
    function obtenerSalarioNeto($nombre, $apellido, $salario, $horasextras, $pagoxhoraextra = 0.0)
    {
        $this->id = ++self::$idEmpleado;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sueldoNominal = $salario;
        $this->pagoxhoraextra = $horasextras * $pagoxhoraextra;

        if ($this->pagoxhoraextra > 0) {
            $this->isss = ($salario + $this->pagoxhoraextra) * self::descISSS;
            $this->isss = ($this->isss > 30) ? 30 : $this->isss;
            $this->afp = ($salario + $this->pagoxhoraextra) * self::descAFP;
            $salariocondescuento = $this->sueldoNominal + $this->pagoxhoraextra - ($this->isss + $this->afp);
        } else {
            $this->isss = $salario * self::descISSS;
            $this->isss = ($this->isss > 30) ? 30 : $this->isss;
            $this->afp = $salario * self::descAFP;

            $salariocondescuento = $this->sueldoNominal - ($this->isss + $this->afp);
        }

        if ($salariocondescuento > 2030.10) {
            $this->renta = ($salariocondescuento - 2038.10) * 0.3 + 288.57;

        } elseif ($salariocondescuento > 895.24 && $salariocondescuento < 2038.10) {
            $this->renta = ($salariocondescuento - 895.24) * 0.2 + 68.00;
        } elseif ($salariocondescuento > 472.00 && $salariocondescuento < 895.24) {
            $this->renta = ($salariocondescuento - 472.00) * 0.1 + 17.67;
        } elseif ($salariocondescuento && $salariocondescuento <= 472.00) {
            $this->renta = 0.0;
        }

        $this->sueldoNominal = $salario;
        $this->sueldoliquido = $this->sueldoNominal + $this->pagoxhoraextra - ($this->isss + $this->afp + $this->renta);
        $this->imprimirBoletaPago();
    }

    function imprimirBoletaPago()
    {
        $tabla = "<table class=\"responstable\">\n<tr>\n";
        $tabla .= "<td>Id empleado: </td>\n";
        $tabla .= "<td>" . $this->id . "</td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Nombre empleado: </td>\n";
        $tabla .= "<td>" . $this->nombre . " " . $this->apellido . "</td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Salario nominal: </td>\n";
        $tabla .= "<td>$" . number_format($this->sueldoNominal, 2, '.', '.') . "/td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Salario por horas extras: </td>\n";
        $tabla .= "<td>$" . number_format($this->pagoxhoraextra, 2, '.', '.') . "</td>\n</tr>\n";
        $tabla .= "<tr>\n<td colspan=\"2\">Descuentos</td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Descuento seguro social: </td>\n";
        $tabla .= "<td>$" . number_format($this->isss, 2, '.', '.') . "</td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Descuento AFP: </td>\n";
        $tabla .= "<td>$" . number_format($this->afp, 2, '.', '.') . "</td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Descuento renta: </td>\n";
        $tabla . "<td>$" . number_format($this->renta, 2, '.', '.') . "</td>\n</tr>";
        $tabla .= "<tr>\n<td>Total descuentos: </td>\n";
        $tabla .= "<td>$" . number_format($this->isss + $this->afp + $this->renta, 2, '.', '.') . "</td>\n</tr>\n";
        $tabla .= "<tr>\n<td>Sueldo liquido a pagar: </td>\n";
        $tabla .= "<td>$" . number_format($this->sueldoLiquido, 2, '.', '') . "</td>\n</tr>\n";
        echo $tabla;
    }

}

?>