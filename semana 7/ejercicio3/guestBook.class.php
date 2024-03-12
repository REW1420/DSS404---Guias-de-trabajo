<?php

class GuestBook
{

    protected $name;
    protected $address;
    protected $phone;
    protected $birthday;
    private $file;

    // Métodos para escritura de las propiedades
    function setName($name)
    {
        $this->name = $name;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    function setFile($file)
    {
        $this->file = $file;
    }

    // Métodos para lectura de las propiedades
    function getName()
    {
        return $this->name;
    }

    function getAddress()
    {
        return $this->address;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getBirthday()
    {
        return $this->birthday;
    }

    function getFile()
    {
        return $this->file;
    }

    function showGuest()
    {
        echo "<div id=\"showGuest\">";
        echo "Nombre: $this->name<br>";
        echo "Dirección: $this->address<br>";
        echo "Teléfono: $this->phone<br>";
        echo "Cumpleaños: $this->birthday<br>";
        echo "</div>";
    }

    function saveGuest()
    {
        $outputString = $this->name . "\n" . $this->address . "\n" . $this->phone . ":" . $this->birthday . "\n";
        $dir = dirname(__DIR__) . "/guest";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $path = $dir . "/" . $this->file;
        $fh = fopen($path, "ab");
        if (!$fh) {
            return;
        }
        fwrite($fh, $outputString);
        fclose($fh);
        echo "<h3>Datos salvados en la ruta indicada $path</h3>";
    }
}

?>
