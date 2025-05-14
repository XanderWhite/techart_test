<?php

namespace App\Models;

use App\Core\Database;

class News
{
    private $db;

    public function __construct()
    {
        $this->db =  Database::getDb();
    }

    public function getLast()
    {
        return $this->getNews(1)[0];
    }

    public function getNews($limit, $offset = 0)
    {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT ? OFFSET ?";
        return $this->db->getAll($sql, [$limit, $offset]);
    }

    public function getTotalNews()
    {
        $sql = "SELECT COUNT(*) as total FROM news";
        return $this->db->getOne($sql)->total;
    }

    public function getNewsById($id)
    {
        $sql = "SELECT * FROM news WHERE id = ?";
        return $this->db->getOne($sql, [$id]);
    }
}
