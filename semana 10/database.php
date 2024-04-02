<?php

class Database
{
    private static $dbName = 'tienda';
    private static $dbHost = 'localhost';
    private static $dbUserName = 'root';
    private static $dbUserPassword = '';
    private static $dbChartset = 'utf8';
    private static $cont = null;

    public function __construct()
    {
        die ('Init function not allowed');

    }

    public static function connect()
    {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO(
                    "mysql:host=" . self::$dbHost . ";" .
                    "dbname=" . self::$dbName . ";" .
                    "charset=" . self::$dbChartset,
                    self::$dbUserName,
                    self::$dbUserPassword
                );

            } catch (PDOException $ex) {
                die ($ex->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}