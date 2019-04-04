<?php

    require_once '../classes/bookDAO.php';
    $bookdao = new BookAccessObject;
    $isbn = $_GET['ISBN'];
    $status = $_GET['status'];
    $bookdao->changeStatBooks($isbn, $status);
    header('Location: book-retrieve.php');
?>