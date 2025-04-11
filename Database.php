<?php
class Database
{
    private $dsn = 'mysql:host=localhost;dbname=techart_test';
    private $username = 'root';
    private $password = '';

    private static $db;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    public function query($sql)
    {
        $query = $this->pdo->prepare($sql);

        $query->execute();

        return $query;
    }

    public function getAll($query)
{
    return $query->fetchAll(PDO::FETCH_OBJ);
}
}
