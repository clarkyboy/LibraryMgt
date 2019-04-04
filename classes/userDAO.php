<?php

    require 'connect_service.php';

    class UserAccessObject extends Database{

        public function login($username, $password){
            $sql = "SELECT * FROM borrower WHERE borrower_uname = '$username' AND borrower_password = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function changePass($id, $password){
            $sql = "UPDATE borrower SET borrower_password = '$password', borrower_status='R' WHERE borrower_id = '$id'";
            $result = $this->conn->query($sql);
        }

    }


?>