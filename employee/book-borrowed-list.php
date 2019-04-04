<?php
  session_start();
  require_once '../classes/userDAO.php';

  $userdao = new UserAccessObject;

  $books = $userdao->getBorrowedBooks($_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Book List</title>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System <a href="../logout.php?page=1">Logout</a></h1>
    </div>
    <div class="container mt-3 p-3 justify-content-center">
        <h4 class="display-4">List of Borrowed Books <a href="book-list.php" role="button" class="btn btn-info">View List of All Books</a></h4>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>ISBN</th>
                <th>Name</th>
                <th>Author</th>
                <th>Borrow Start Date</th>
                <th>Borrow Return Date</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    foreach($books as $key=>$values){
                        echo "<tr>";
                                echo "<td>".$values['book_ISBN']."</td>";
                                echo "<td>".$values['book_name']."</td>";
                                echo "<td>".$values['book_author']."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['borrow_start_date']))."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['borrow_due_date']))."</td>";
                                if($values['borrow_status'] == 'P'){
                                    echo "<td> Pending </td>";
                                    echo "<td><small>You can get/return the book once the request is approved</small></td>";
                                }else if($values['borrow_status'] == 'A'){
                                    echo "<td> Approved <small>".$values['borrow_approval_date']."</small></td>";
                                    echo "<td><a href='book-return.php?id=".$values['borrow_id']."&ISBN=".$values['book_ISBN']."' class='btn btn-outline-warning'><i class='fas fa-undo'></i> Return Book</a></td>";
                                }else{
                                    echo "<td> Returned <small>".$values['borrow_return_date']."</small></td>";
                                    echo "<td><small>You successfully returned the book</small></td>";
                                }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>