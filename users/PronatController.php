<?php

include './core/Database1.php';

class PronatController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database1;
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM pronat');

        return $query->fetchAll();
    }

}
