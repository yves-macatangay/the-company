<?php

class Database {
    private $server = "localhost";
    private $username = "root";
    private $password = "";  //if using MAMP, password = "root"
    private $db_name = "the_company";

    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error){
            die("Error connecting to database: ".$this->conn->connect_error);
        }
    }
}