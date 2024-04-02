<?php
// Implementación del patrón de diseño Singleton
// con PHP y la extensión MySQLi

class Database
{
    // Instancia única de la clase
    private static $_instance;

    // Propiedades de conexión a la base de datos
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "libros";
    private $_charset = "utf8";

    // Conexión a la base de datos
    private $_connection;

    // Método para obtener la instancia única de la clase
    public static function getInstance()
    {
        // Verificar si ya existe una instancia de la clase
        if (!self::$_instance) {
            // Si no existe, crear una nueva instancia
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor privado para evitar la creación de objetos mediante el operador new
    private function __construct()
    {
        // Crear la conexión a la base de datos
        $this->_connection = new mysqli(
            $this->_host,
            $this->_username,
            $this->_password,
            $this->_database
        );

        // Verificar si hay errores en la conexión
        if ($this->_connection->connect_errno) {
            die ("Falló la conexión a MySQL: (" . $this->_connection->connect_errno . ") " . $this->_connection->connect_error);
        }

        // Establecer el juego de caracteres de la conexión a utf8
        $this->_connection->set_charset($this->_charset);
    }

    // Método privado para evitar la duplicación del objeto conexión
    private function __clone()
    {
    }

    // Método para obtener la conexión a la base de datos
    public function getConnection()
    {
        return $this->_connection;
    }
}
?>
