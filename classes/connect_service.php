<?php

class Database {

    //member variables
    private $servername = "localhost";
    private $username = "root";
    private $password = ""; // mamp users password is root
    private $database = "library";
    /**
     * these member variables are on private so that other files can't access these
     * variables. It is also for security purposes
     */

    public $conn;
    //Constructor
    //this will construct the connection
    public function __construct(){
        //$this variable points at itself
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if($this->conn->connect_error){
            die("Connection Error: ". $this->conn->connect_error);
        }
        return $this->conn;
    }

}




?>