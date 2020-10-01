<?php

class DbConnect{
    private $host = '130.194.7.82';
    private $dbName = 'team112_114_dev';
    private $user = 'team112_114';
    private $pass = 'FUBJvTJ6';

    public function connect()
    {
        try{
            $conn = new PDO('mysql:host=' . $this->host . '; dbName=' . $this->dbName,$this->user,$this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e)
        {
            echo 'Database Error: ' . $e->getMessage();
        }

    }
}




?>