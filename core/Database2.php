<?php

class Database2
{
    public $pdo;

    public function __construct()
    {
        try{
    
            $link = new PDO('mysql:host=localhost;dbname=webgr4', 'root', '');
            $this->pdo = $link;
        }catch(PDOException $e) {
            die('DIE'. $e->getMessage());
        }
    }
}
?>
