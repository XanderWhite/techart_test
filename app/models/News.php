<?php

class News
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getDb();
    }

    public function getLast()
    {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
        $q =  $this->db->query($sql);
        return $this->db->getAll($q);
    }

    public function getNews($limit, $offset)
    {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT $limit OFFSET $offset";
        $q =  $this->db->query($sql);
        return $this->db->getAll($q);
    }

    public function getTotalNews()
    {
        $sql = "SELECT COUNT(*) as total FROM news";
        $result = $this->db->query($sql);
        $data = $this->db->getAll($result);
        return (int) $data[0]->total;
    }

    public function getNewsById($id)
    {
        $sql = "SELECT * FROM news WHERE id = '$id'";
        $q =  $this->db->query($sql);
        $data = $this->db->getAll($q);
        return $data[0];
    }
}
