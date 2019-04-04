<?php
    require_once '../classes/borrowerDAO.php';
    $borrowerdao = new BorrowerAccessObject;
    $password = $borrowerdao->generatePassword();

    if(isset($_POST['add'])){
        $name = $_POST['fullname'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $result = $borrowerdao->addBorrower($name, $address, $dob, $username, $password, $status);

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
    <title>Add Borrower</title>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System</h1>
    </div>
    <div class="container mt-3 p-3 justify-content-center">
        <h4 class="display-4">Add a Borrower <a href="borrower-retrieve.php" role="button" class="btn btn-info">View List Borrowers</a> </h4>
        <form action="" method="post">
            <div class="row p-3">
                <label for="" class="col-sm-2 p-2">Borrower Fullname:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="fullname" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Borrower Address:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="address" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Borrower Date of Birth:</label>
                <div class="col-sm-10 p-2">
                    <input type="date" name="dob" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Borrower Username:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="username" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Borrower Password:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="password" id="" class="form-control" value="<?php echo $password; ?>" required>
                </div>
                <label for="" class="col-sm-2 p-2">Borrower Status:</label>
                <div class="col-sm-10 p-2">
                   <select name="status" id="" class="form-control">
                        <option value="N">New</option>
                        <option value="R">Regular</option>
                        <option value="B">Banned</option>
                   </select>
                </div>
            </div>
            <input type="submit" value="Add" name="add" class="btn btn-outline-success mx-auto d-block">
        </form>
    </div>
</body>
</html>