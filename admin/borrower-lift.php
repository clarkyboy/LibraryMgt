<?php
session_start();
require '../classes/borrowerDAO.php';
$borrowerdao = new BorrowerAccessObject;
$id = $_GET['id'];
$status = $_GET['status'];
$borrowerdao->liftBan($id, $status);
header('Location: borrower-retrieve.php');

?>