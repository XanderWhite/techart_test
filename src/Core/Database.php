<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $db;
    private $pdo;

    public function __construct()
    {
        $dbconfig = require __DIR__ . '/../../config/database.php';

        try {
            $this->pdo = new PDO(
                'mysql:host=' . $dbconfig['host'] .
                    ';dbname=' . $dbconfig['dbname'],
                $dbconfig['username'],
                $dbconfig['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getDb()
    {
        if (!isset(self::$db)) {
            self::$db = new Database();
        }
        return self::$db;
    }

    public function query($sql, $params = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($params);

        return $query;
    }

    public function getAll($sql, $params = array())
    {
        $query  = $this->query($sql, $params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOne($sql, $params = array())
    {
        $query  = $this->query($sql, $params);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
