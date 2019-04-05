<?php
    session_start();
    require_once '../classes/adminDAO.php';
    $bookdao = new AdminAccessObject;
    $books = $bookdao->getAllBorrowedBooks();
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
        <h1>Library Management System <a href="../logout.php?page=2">Logout</a> </h1>
    </div>
    <div class="container mt-3 justify-content-center">
        <h4 class="display-4">Borrowed Books Approval/Denial</h4>
        <a href="borrow-returned-list.php" role="button" class="btn btn-outline-primary m-3">View Books Returned</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>Book ISBN</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Date Borrowed</th>
                <th>Due Date</th>
                <th>Borrower Name</th>
                <th>Approved By</th>
                <th>Status</th>
                <th colspan="2">Actions</th>
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
                            echo "<td>".$values['borrower_name']."</td>";
                            if($values['admin_id'] != null){
                                echo "<td>".$bookdao->getAdmin($values['admin_id'])['admin_name']."</td>";
                            }else{
                                echo "<td> -- </td>";
                            }
                            if($values['borrow_status'] == 'A'){
                                echo "<td> Approved </td>";
                                echo "<td><a href='borrow-changestats.php?ISBN=".$values['book_ISBN']." &borrow_id= ".$values['borrow_id']."&status=P&bookstat=R' class='btn btn-outline-danger'><i class='fas fa-times'></i> Cancel</a></td>";
                            }elseif($values['borrow_status'] == 'R'){
                                echo "<td> Returned </td>";
                                echo "<td><small>Date Returned: ".date('F j, Y', strtotime($values['borrow_return_date']))."</small></td>";
                            }
                            else{
                                echo "<td> Pending </td>";
                                echo "<td><a href='borrow-changestats.php?ISBN=".$values['book_ISBN']." &borrow_id= ".$values['borrow_id']."&status=A&bookstat=B' class='btn btn-outline-success'><i class='fas fa-check'></i> Approve</a></td>";
                            }
                            //echo "<td><a href='book-update.php?ISBN=".$values['book_ISBN']."' class='btn btn-outline-warning'><i class='fas fa-edit'></i></a></td>";
                            
                        echo "</tr>";
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>