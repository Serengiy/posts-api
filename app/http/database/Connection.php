<?php
namespace App\Http\Database;

use PDO;
use PDOException;

class Connection
{
    public static function connect()
    {
        $dbHost = 'books_app_db';
        $dbPort = '3306';
        $dbName = 'my_db_application';
        $dbUser = 'root';
        $dbPass = 'root';

        try {
            $db = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}