<?php

    require '../classes/borrowerDAO.php';
    $borrowerdao = new BorrowerAccessObject;
    $id = $_GET['id'];
    $status = $_GET['status'];
    $borrowerdao->banBorrower($id, $status);
    header('Location: borrower-retrieve.php');
?>