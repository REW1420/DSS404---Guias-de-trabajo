<?php

class bankAccount
{


    private static $numberAccount = 0;
    protected $idcuenta;
    private $owner;
    private $operacion;
    private $balance = 0.0;

    function openAccount($owner, $operacion, $amount)
    {
        $this->idcuenta = ++self::$numberAccount;
        $this->owner = $owner;
        $this->operacion = $operacion;
        $this->balance = $amount;

        $comprobante = "\n<table class=\"responstable\"> \n";
        $comprobante .= "<tr>\n<td>Numero de cuenta: </td>\n";
        $comprobante .= "<td>" . self::$numberAccount . "</td>\n</tr>\n";
        $comprobante .= "<tr>\n<td>Propietario: </td>\n";
        $comprobante .= "<td>" . $this->owner . "</td>\n</tr>\n";
        $comprobante .= "<tr>\n<td>Operacion: </td>\n";
        $comprobante .= "<td>" . mb_convert_case(
            $this->operacion,
            MB_CASE_TITLE,
            "UFT-8"
        ) . "</td>\n</tr>\n";
        $comprobante .= "<tr>\n<td>Saldo inicial: </td>\n";
        $comprobante .= "<td>$ " . number_format($this->balance, 2, '.', '. ') . "</td>\n</tr>\n";
        $comprobante .= "</table>";
        echo $comprobante;
    }

    function makeDeposit($amount, $operacion, $saldo = 250)
    {

        $this->operacion = $operacion;
        $this->balance = $saldo;
        $this->balance += $saldo;

        $comprobante = "\<table class=\"responsetable\">";
        $comprobante .= "\t<tr>\n\t\t<td> Saldo inicial: </td>\n";
        $comprobante .= "\t\t<td>\$" . number_format($saldo, 2, '.', '.') . "</td>\n\t</tr>\n";
        $comprobante .= "<tr>\n<td>Operacion: </td>\n";
        $comprobante .= "<td>" . mb_convert_case($this->operacion, MB_CASE_TITLE, "UFT-8") . "</td>\n</tr>\n";
        $comprobante .= "<tr>\n<td>Cantidad depositada: </td>\n";
        $comprobante .= "<td>$ " . number_format($amount, 2, '.', '. ') . "</td>\n</tr>\n";
        $comprobante .= "<tr>\n<td>Nuevo saldo: </td>\n";
        $comprobante .= "<td>$ " . number_format($this->balance, 2, '.', '. ') . "</td>\n</tr>\n";
        $comprobante .= "</table>";
        echo $comprobante;
    }

    function makeWithdrawal($amount, $operacion, $saldo = 250)
    {
        $this->operacion = $operacion;
        $this->balance = $saldo;
        $saldoinicial = $this->balance;
        $this->balance -= $amount;

        if ($this->balance > 0) {
            $comprobante = "\<table class=\"responsetable\">";
            $comprobante .= "\t<tr>\n\t\t<td> Saldo inicial: </td>\n";
            $comprobante .= "\t\t<td>\$" . number_format($saldo, 2, '.', '.') . "</td>\n\t</tr>\n";
            $comprobante .= "<tr>\n<td>Operacion: </td>\n";
            $comprobante .= "<td>" . mb_convert_case($this->operacion, MB_CASE_TITLE, "UFT-8") . "</td>\n</tr>\n";
            $comprobante .= "<tr>\n<td>Cantidad retirada: </td>\n";
            $comprobante .= "<td>$ " . number_format($amount, 2, '.', '. ') . "</td>\n</tr>\n";
            $comprobante .= "<tr>\n<td>Nuevo saldo: </td>\n";
            $comprobante .= "<td>$ " . number_format($this->balance, 2, '.', '. ') . "</td>\n</tr>\n";
            $comprobante .= "</table>";
            echo $comprobante;
        } else {
            $comprobante = "\n<table class=\"responsetable\">\n";
            $comprobante .= "\t<tr>\n\t\t<td>Aviso: </td>\n";
            $comprobante .= "\t\t>td>Su cuenta presenta fondos insuficientes.</td>\n\t</tr>\n";
            $comprobante .= "</table>\n";


        }
        echo $comprobante;
    }

    function getBalance()
    {
        return $this->balance;
    }
}


?>