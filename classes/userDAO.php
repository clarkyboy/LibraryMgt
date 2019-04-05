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
        public function getBorrowableBooks(){
            $sql = "SELECT * FROM book WHERE book_borrow_status = 'R' AND book_status != 'N'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        public function borrowBook($borrower_id, $isbn, $start, $due, $status){
            $sql = "INSERT INTO borrow (borrower_id, book_ISBN, borrow_start_date, borrow_due_date, borrow_status)
                    VALUES ('$borrower_id', '$isbn', '$start', '$due', '$status')";
            $result = $this->conn->query($sql);

            $sql2 = "UPDATE book SET book_borrow_status = 'B' WHERE book_ISBN = '$isbn'";
            $another = $this->conn->query($sql2);
        }
        public function getBorrowedBooks($id){
            $sql = "SELECT * FROM book JOIN borrow ON book.book_ISBN = borrow.book_ISBN WHERE borrow.borrower_id = '$id'";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function returnBook($id, $isbn){
            $date = date('Y-m-d');
            $sql = "UPDATE borrow SET borrow_return_date = '$date', borrow_status = 'R' WHERE borrow_id = '$id'";
            $result = $this->conn->query($sql);

            $sql2 = "UPDATE book SET book_borrow_status = 'R' WHERE book_ISBN = '$isbn'";
            $another = $this->conn->query($sql2);
        }

        public function getAdmin($id){
            $sql = "SELECT * FROM `admin` WHERE admin_id = '$id'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

    }


?>