<?php

class Database
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "sql_injection";

    public static function connect()
    {
        $conn = new mysqli(
            self::$servername,
            self::$username,
            self::$password,
            self::$dbname
        );

        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>
