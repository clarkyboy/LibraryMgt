<?php
    session_start();
    require_once '../classes/userDAO.php';
    $employeedao = new UserAccessObject;
    if(isset($_POST['change'])){
        $id = $_SESSION['id'];
        $password = $_POST['password'];
        $employeedao->changePass($id, $password);
        header('Location: dashboard.php');
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
    <title>Document</title>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System</h1>
    </div>
    <div class="container justify-content-center">
        <h4 class="display-4 text-center">You are required to change password</h4>
        <form action="" method="post">
            <div class="row p-3">
                <label for="" class="col-sm-2 p-2">New Password</label>
                <div class="col-sm-10 p-2">
                    <input type="password" name="username" id="" class="form-control">
                </div>
                <label for="" class="col-sm-2 p-2">Confirm Password</label>
                <div class="col-sm-10 p-2">
                    <input type="password" name="password" id="" class="form-control">
                </div>
            </div>
            <div class="text-center mx-auto d-block">
                <input type="submit" value="Change Password" name="change" class="btn btn-warning">
                <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
           
        </form>
    </div>
</body>
</html>