<?php

class Db {
    
    const SERVERNAME    = "localhost";
    const DBNAME        = "offers";
    const USERNAME      = "root";
    const PASS          = "";

    protected $conn;

    public function connectDb(){
        $this->conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASS, self::DBNAME);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }
}