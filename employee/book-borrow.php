<?php
    session_start();
    require_once '../classes/userDAO.php';
    $userdao = new UserAccessObject;
    $isbn = $_GET['ISBN'];
    if(isset($_POST['borrow'])){
        $start = $_POST['start'];
        // $isbn = $_POST['isbn'];
        $due = $_POST['due'];
        $status = 'P'; // Pending

        $userdao->borrowBook($_SESSION['id'], $isbn, $start, $due, $status);
        header('Location: book-borrowed-list.php');
    }   
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
    <title>Book Borrow</title>
</head>
<body>
<div class="jumbotron">
        <h1>Library Management System <a href="../logout.php?page=1">Logout</a></h1>
    </div>
    <div class="container justify-content-center p-3">
        <h4 class="display-4">Borrow Book: <?php echo $_GET['name'];?></h4>
        <form action="" method="post">
            <div class="row p-2">
                <label for="" class="col-sm-2 p-2">ISBN</label>
                <input type="text" name="isbn" id="" class="form-control" value="<?php echo $isbn;?>" readonly>
                <!-- <label for="" class="col-sm-2 p-2">Book Name</label>
                <input type="text" name="isbn" id="" class="form-control" value="<?php echo $_GET['name'];?>" readonly> -->
                <label for="" class="col-sm-2 p-2">Book Author</label>
                <input type="text" name="author" id="" class="form-control" value="<?php echo $_GET['author'];?>" readonly>
                <label for="" class="col-sm-2 p-2">Start Date</label>
                <input type="date" name="start" id="" class="form-control" value="<?php echo date('Y-m-d');?>">
                <label for="" class="col-sm-2 p-2">Due Date/Return Date</label>
                <input type="date" name="due" id="" class="form-control" value="<?php echo date('Y-m-d');?>">
            </div>
            <div class="text-center mx-auto-d-block">
                <input type="submit" value="Borrow" name="borrow" class="btn btn-outline-primary">
                <a href="book-list.php" role="button" class="btn btn-outline-danger">Cancel</a>
            </div>
            
        </form>
    </div>
</body>
</html>