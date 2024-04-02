<?php

class bankAccount
{
    private $csvFile = 'accounts.csv';

    function openAccount($owner, $operacion, $amount)
    {
        if ($this->checkDuplicateOwner($owner)) {
            echo "<p>Error: Ya existe una cuenta con el propietario '$owner'.</p>";
            return;
        }

        $data = [$this->getNextAccountNumber(), $owner, $amount];
        $this->writeToCSV($data);

        $this->displayConfirmation($data);
    }

    function makeDeposit($owner, $amount)
    {
        $account = $this->findAccountByOwner($owner);
        if ($account === false) {
            echo "<p>Error: No se encontró una cuenta asociada al propietario '$owner'.</p>";
            return;
        }

        $account[2] += $amount;
        $this->updateAccount($account);

        $this->displayDepositConfirmation($account, $amount);
    }

    function makeWithdrawal($owner, $amount)
    {
        $account = $this->findAccountByOwner($owner);
        if ($account === false) {
            echo "<p>Error: No se encontró una cuenta asociada al propietario '$owner'.</p>";
            return;
        }

        if ($account[2] < $amount) {
            echo "<p>Error: Fondos insuficientes para realizar el retiro.</p>";
            return;
        }

        $account[2] -= $amount;
        $this->updateAccount($account);

        $this->displayWithdrawalConfirmation($account, $amount);
    }

    private function getNextAccountNumber()
    {
        $accounts = $this->readCSV();
        $nextAccountNumber = count($accounts) + 1;
        return $nextAccountNumber;
    }

    private function checkDuplicateOwner($owner)
    {
        $accounts = $this->readCSV();
        foreach ($accounts as $account) {
            if ($account[1] === $owner) {
                return true;
            }
        }
        return false;
    }

    private function findAccountByOwner($owner)
    {
        $accounts = $this->readCSV();
        foreach ($accounts as $account) {
            if ($account[1] === $owner) {
                return $account;
            }
        }
        return false;
    }

    private function updateAccount($account)
    {
        $accounts = $this->readCSV();
        foreach ($accounts as &$acc) {
            if ($acc[0] === $account[0]) {
                $acc = $account;
                break;
            }
        }
        $this->writeArrayToCSV($accounts);
    }

    private function writeToCSV($data)
    {
        $file = fopen($this->csvFile, 'a');
        fputcsv($file, $data);
        fclose($file);
    }

    private function readCSV()
    {
        $accounts = [];
        if (($handle = fopen($this->csvFile, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $accounts[] = $data;
            }
            fclose($handle);
        }
        return $accounts;
    }

    private function writeArrayToCSV($data)
    {
        $file = fopen($this->csvFile, 'w');
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }

    private function displayConfirmation($account)
    {
        echo "<p>Se ha abierto una nueva cuenta:</p>";
        echo "<ul>";
        echo "<li>Número de cuenta: {$account[0]}</li>";
        echo "<li>Propietario: {$account[1]}</li>";
        echo "<li>Saldo inicial: {$account[2]}</li>";
        echo "</ul>";
    }

    private function displayDepositConfirmation($account, $amount)
    {
        echo "<p>Se ha realizado un depósito en la cuenta:</p>";
        echo "<ul>";
        echo "<li>Número de cuenta: {$account[0]}</li>";
        echo "<li>Propietario: {$account[1]}</li>";
        echo "<li>Cantidad depositada: $amount</li>";
        echo "<li>Saldo actual: {$account[2]}</li>";
        echo "</ul>";
    }

    private function displayWithdrawalConfirmation($account, $amount)
    {
        echo "<p>Se ha realizado un retiro en la cuenta:</p>";
        echo "<ul>";
        echo "<li>Número de cuenta: {$account[0]}</li>";
        echo "<li>Propietario: {$account[1]}</li>";
        echo "<li>Cantidad retirada: $amount</li>";
        echo "<li>Saldo actual: {$account[2]}</li>";
        echo "</ul>";
    }
}


?>
