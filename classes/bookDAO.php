<?php
    require_once 'connect_service.php'; 

    class BookAccessObject extends Database{
        
        public function addBook($isbn, $bookname, $author, $dateadded, $datepublished, $publisher, $edition, $type, $status){
            $sql = "INSERT INTO book (`book_ISBN`, `book_name`, `book_author`, `book_date_added`, `book_date_published`, `book_publisher`, `book_edition`, `book_type`, `book_status`)
                   VALUES ('$isbn', '$bookname', '$author', '$dateadded', '$datepublished', '$publisher', '$edition', '$type', '$status')";

            $result = $this->conn->query($sql) or die("Connection error: " . $this->conn->error);

            return $result;
        }
       
        public function getBooks(){
            $sql = "SELECT * FROM book ORDER BY book_name";
            $result = $this->conn->query($sql);
            $rows = array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function getOneBook($isbn){
            $sql = "SELECT * FROM book WHERE book_ISBN = '$isbn'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function updateBook($isbn, $bookname, $author, $dateadded, $datepublished, $publisher, $edition, $type, $status){
            $sql = "UPDATE book SET `book_name` = '$bookname', `book_author` = '$author', `book_date_added` = '$dateadded', 
                   `book_date_published` = '$datepublished', `book_publisher` = '$publisher', `book_edition` = '$edition', `book_type` = '$type', `book_status` = '$status' WHERE `book_ISBN` = '$isbn'";
            $result = $this->conn->query($sql);
            return $result;
        }

        public function changeStatBooks($isbn, $status){
            $sql = "UPDATE book SET `book_status` = '$status' WHERE `book_ISBN` = '$isbn'";
            $result = $this->conn->query($sql);
        }
    }


?>