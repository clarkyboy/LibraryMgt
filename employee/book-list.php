<?php
  require_once '../classes/userDAO.php';

  $userdao = new UserAccessObject;

  $books = $userdao->getBorrowableBooks();

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
    <div class="container mt-3 justify-content-center">
        <h4 class="display-4">List of Books</h4>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>ISBN</th>
                <th>Name</th>
                <th>Author</th>
                <th>Date Added</th>
                <th>Date Published</th>
                <th>Publisher</th>
                <th>Edition</th>
                <th>Genre/Type</th>
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
                                echo "<td>".date('F j, Y', strtotime($values['book_date_added']))."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_published']))."</td>";
                                echo "<td>".$values['book_publisher']."</td>";
                                echo "<td>".$values['book_edition']."</td>";
                                echo "<td>".$values['book_type']."</td>";
                                if($values['book_status'] == 'U'){
                                    echo "<td> Usable </td>";
                                }else{
                                    echo "<td> Slightly Usable </td>";
                                }
                                echo "<td><a href='book-borrow.php?ISBN=".$values['book_ISBN']."&name=".$values['book_name']."&author=".$values['book_author']."' class='btn btn-outline-success'><i class='fas fa-shopping-cart'></i> Borrow</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>