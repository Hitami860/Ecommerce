<?php

require_once("./classe/users.php");

class db
{
    public  $db;


    public function connecte()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', 'root');
            return $this->db;
        } catch (PDOException $e) {
            $error = fopen('error.log', 'w');
            $txt = $e . "\n";
            fwrite($error, $txt);
            throw new Exception("Error 404");
        }
    }

    public function disconnect()
    {
        $this->db = null;
    }
    
}

