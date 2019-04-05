<?php

    require_once 'connect_service.php';

    class AdminAccessObject extends Database{

        public function login($username, $password){
            $sql = "SELECT * FROM `admin` WHERE admin_uname = '$username' AND admin_pass = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function getAllBorrowedBooks(){
            $sql = "SELECT * FROM borrow JOIN book on borrow.book_ISBN = book.book_ISBN
                    JOIN borrower ON borrow.borrower_id = borrower.borrower_id WHERE borrow.borrow_status != 'R'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        public function getReturnedBooks(){
            $sql = "SELECT * FROM borrow JOIN book on borrow.book_ISBN = book.book_ISBN
                    JOIN borrower ON borrow.borrower_id = borrower.borrower_id WHERE borrow.borrow_status = 'R'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function updateBorrowedBooks($isbn, $id, $status){
            $date = date('Y-m-d');
            $sql = "UPDATE borrow SET borrow_approval_date = '$date', borrow_status = '$status' WHERE borrow_id = '$id'";
            $result = $this->conn->query($sql);


            $sql2 = "UPDATE book SET book_borrow_status = '$status' WHERE book_ISBN = '$isbn'";
            $another = $this->conn->query($sql2);
        }

    }

?>