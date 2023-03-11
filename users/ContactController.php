<?php

include './core/Database2.php';

class ContactController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database2;
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM contact');

        return $query->fetchAll();
    }

   }
