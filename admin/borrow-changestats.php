<?php
    session_start();
    require_once '../classes/adminDAO.php';
    $admindao = new AdminAccessObject;
    $isbn = $_GET['ISBN'];
    $id = $_GET['borrow_id'];
    $status = $_GET['status'];
    $bookstatus = $_GET['bookstat'];
    $admindao->updateBorrowedBooks($isbn, $id, $_SESSION['id'], $status, $bookstatus);
    header('Location: borrow-retrieve.php');
?>