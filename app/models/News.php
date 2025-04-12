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
        $sql = "SELECT * FROM news ORDER BY date DESC";
        $q =  $this->db->query($sql);
        return $this->db->getAll($q);
    }
    public function getLast()
    {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
        $q =  $this->db->query($sql);
        return $this->db->getAll($q);
    }
}
