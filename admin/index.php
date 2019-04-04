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
    <title>Welcome Page</title>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System</h1>
    </div>
    <div class="container justify-content-center">
        <h4 class="display-3 text-center">Welcome to the Admin Side</h4>
        <p class="lead text-center">Please choose from the ffg.</p>
        <div class="row">
            <div class="col-4">
                <a href="book-retrieve.php" class="btn btn-primary p-5 w-100 h-100"><i class="fas fa-book-open p-3" style="font-size:100px;"></i> <br><p class="lead" style="font-size:20px;">Book Management</p></a>
            </div>
            <div class="col-4">
            <a href="borrower-retrieve.php" class="btn btn-success p-5 w-100 h-100"><i class="fas fa-users p-3" style="font-size:100px;"></i> <br><p class="lead" style="font-size:20px;">Borrower Management</p></a>
            </div>
            <div class="col-4">
            <a href="borrow-retrieve.php" class="btn btn-secondary p-5 w-100 h-100"><i class="fas fa-shopping-cart p-3" style="font-size:100px;"></i> <br><p class="lead" style="font-size:20px;">Borrowed Books Management</p></a>
            </div>
        </div>
    </div>
</body>
</html>