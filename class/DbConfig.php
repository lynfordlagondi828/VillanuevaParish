<?php
class DbConfig{

    private $conn;

    function __construct()
    {
        

    }

    function DB_CONNECT(){
        
        $this->conn = new PDO("mysql:host=localhost;dbname=villanueva_parish","root","");
        return $this->conn;
    }
}