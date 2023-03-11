<?php
try{
    $pdo = new PDO("mysql:host=localhost:3306;dbname=webgr4", "root" , "");    
}catch(PDOException $pdo){
    die("Unsuccessful connection");
}
