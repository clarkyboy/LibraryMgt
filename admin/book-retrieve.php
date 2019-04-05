<?php
    session_start();
    require_once '../classes/bookDAO.php';
    $bookdao = new BookAccessObject;
    $books = $bookdao->getBooks();
    
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
    <title>Book Lists</title>

    <style type="text/css">
        .trN {
            color : red;
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System <a href="../logout.php?page=2">Logout</a></h1>
    </div>
    <div class="container mt-3 justify-content-center">
        <h4 class="display-4">List of Books</h4>
        <a href="book-insert.php" role="button" class="btn btn-outline-primary m-3"><i class="fas fa-plus"></i> Add Book</a>
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
                <th>Borrowed_Status</th>
                <th>Status</th>
                <th colspan="2">Actions</th>
            </thead>
            <tbody>
                <?php
                    foreach($books as $key=>$values){
                        $disabled = "";
                        if($values['book_status'] == 'U'){
                            echo "<tr>";
                                echo "<td>".$values['book_ISBN']."</td>";
                                echo "<td>".$values['book_name']."</td>";
                                echo "<td>".$values['book_author']."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_added']))."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_published']))."</td>";
                                echo "<td>".$values['book_publisher']."</td>";
                                echo "<td>".$values['book_edition']."</td>";
                                echo "<td>".$values['book_type']."</td>";
                                if($values['book_borrow_status'] == 'R'){
                                    echo "<td> Ready for Borrowing </td>";
                                }else{
                                    echo "<td class='text-primary'> Borrowed</td>";
                                    $disabled = "disabled";
                                }
                                echo "<td> Usable </td>";
                                echo "<td><a href='book-update.php?ISBN=".$values['book_ISBN']."' class='btn btn-outline-warning ".$disabled."'><i class='fas fa-edit'></i></a></td>";
                                echo "<td><a href='book-changestats.php?ISBN=".$values['book_ISBN']."&status=N' class='btn btn-outline-danger ".$disabled."'><i class='fas fa-times'></i></a></td>";
                            echo "</tr>";
                        }elseif($values['book_status'] == 'S'){
                            echo "<tr>";
                                echo "<td>".$values['book_ISBN']."</td>";
                                echo "<td>".$values['book_name']."</td>";
                                echo "<td>".$values['book_author']."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_added']))."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_published']))."</td>";
                                echo "<td>".$values['book_publisher']."</td>";
                                echo "<td>".$values['book_edition']."</td>";
                                echo "<td>".$values['book_type']."</td>";
                                if($values['book_borrow_status'] == 'R'){
                                    echo "<td> Ready for Borrowing </td>";
                                }else{
                                    echo "<td class='text-primary'> Borrowed</td>";
                                    $disabled = "disabled";
                                }
                                echo "<td> Slightly Usable </td>";
                                echo "<td><a href='book-update.php?ISBN=".$values['book_ISBN']."' class='btn btn-outline-warning ".$disabled."'><i class='fas fa-edit'></i></a></td>";
                                echo "<td><a href='book-changestats.php?ISBN=".$values['book_ISBN']."&status=N' class='btn btn-outline-danger ".$disabled."'><i class='fas fa-times'></i></a></td>";
                            echo "</tr>";
                        }elseif($values['book_status'] == 'N'){
                            echo "<tr class = 'trN'>";
                                echo "<td>".$values['book_ISBN']."</td>";
                                echo "<td>".$values['book_name']."</td>";
                                echo "<td>".$values['book_author']."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_added']))."</td>";
                                echo "<td>".date('F j, Y', strtotime($values['book_date_published']))."</td>";
                                echo "<td>".$values['book_publisher']."</td>";
                                echo "<td>".$values['book_edition']."</td>";
                                echo "<td>".$values['book_type']."</td>";
                                if($values['book_borrow_status'] == 'R'){
                                    echo "<td> Ready for Borrowing </td>";
                                }else{
                                    echo "<td class='text-primary'> Borrowed</td>";
                                }
                                echo "<td> Not Usable </td>";
                                echo "<td><a href='book-update.php?ISBN=".$values['book_ISBN']."' class='btn btn-outline-warning disabled'><i class='fas fa-edit'></i></a></td>";
                                echo "<td><a href='book-changestats.php?ISBN=".$values['book_ISBN']."&status=S' class='btn btn-outline-success'><i class='fas fa-wrench'></i></a></td>";
                            echo "</tr>";
                        }
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>