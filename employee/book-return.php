<?php

    require_once '../classes/userDAO.php';
    $userdao = new UserAccessObject;
    $id = $_GET['id'];
    $isbn = $_GET['ISBN'];
    $userdao->returnBook($id, $isbn);
    header('Location: book-borrowed-list.php');

?>