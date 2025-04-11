<?php

class News
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getDb();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM news";
        $q =  $this->db->query($sql);
        return $this->db->getAll($q);
    }
}
