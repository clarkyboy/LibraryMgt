<?php
    
    require_once 'connect_service.php';
    class BorrowerAccessObject extends Database {

        
        public function addBorrower($name, $address, $dob, $username, $password, $status){
            $dateToday = date('Y-m-d');
            $sql = "INSERT INTO borrower (`borrower_name`, `borrower_address`, `borrower_dob`, `borrower_uname`, `borrower_password`, `borrower_date_added`, `borrower_status`)
                   VALUES ('$name', '$address', '$dob', '$username', '$password', '$dateToday', '$status')";
            $result = $this->conn->query($sql);
            return $result;
        }
        public function generatePassword(){
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 16; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }
        public function getBorrowers(){
            $sql = "SELECT * FROM borrower";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        public function banBorrower($id, $status){
            $sql = "UPDATE borrower SET borrower_status = '$status' WHERE borrower_id = '$id'";
            $result = $this->conn->query($sql);
        }
        public function liftBan($id, $status){
            $sql = "UPDATE borrower SET borrower_penalty_count = 0, borrower_status = '$status' WHERE borrower_id = '$id'";
            $result = $this->conn->query($sql);
        }


    }

?>