<?php

    require_once '../classes/adminDAO.php';
    $admindao = new AdminAccessObject;
    $isbn = $_GET['ISBN'];
    $id = $_GET['borrow_id'];
    $status = $_GET['status'];
    $admindao->updateBorrowedBooks($isbn, $id, $status);
    header('Location: borrow-retrieve.php');
?>