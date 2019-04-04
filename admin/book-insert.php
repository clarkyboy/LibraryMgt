<?php
    require_once '../classes/bookDAO.php';
    $bookdao = new BookAccessObject;
    if(isset($_POST['save'])){
        $isbn = $_POST['isbn'];
        $bookname = $_POST['bookname'];
        $author = $_POST['author'];
        $dateadded = $_POST['dateadded'];
        $datepublished = $_POST['datepublished'];
        $publisher = $_POST['publisher'];
        $edition = $_POST['edition'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $result = $bookdao->addBook($isbn, $bookname, $author, $dateadded, $datepublished, $publisher, $edition, $type, $status);

        if($result){
            echo "Successfully added Book ISBN: ".$isbn;
        }else{
            echo "error!";
        }
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
    <title>Book Insert</title>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System</h1>
    </div>
    <div class="container mt-3 justify-content-center p-3">
        <h4 class="display-4">Add a Book <a href="book-retrieve.php" role="button" class="btn btn-info">View List Books</a> </h4>
        <form action="" method="post">
            <div class="row p-3">
                <label for="" class="col-sm-2 p-2">Book ISBN:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="isbn" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Book Name:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="bookname" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Book Author:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="author" id="" class="form-control" required>
                </div> 
                <label for="" class="col-sm-2 p-2">Book Date Added:</label>
                <div class="col-sm-10 p-2">
                    <input type="date" name="dateadded" id="" value="<?php echo date('Y-m-d');?>" class="form-control" required>
                </div> 
                <label for="" class="col-sm-2 p-2">Book Date Published:</label>
                <div class="col-sm-10 p-2">
                    <input type="date" name="datepublished" id="" class="form-control" required>
                </div> 
                <label for="" class="col-sm-2 p-2">Book Publisher:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="publisher" id="" class="form-control" required>
                </div>
                <label for="" class="col-sm-2 p-2">Book Edition:</label>
                <div class="col-sm-10 p-2">
                    <select name="edition" id="" class="form-control" required>
                        <option value="1st Edition">1st Edition</option>
                        <option value="2nd Edition">2nd Edition</option>
                        <option value="3rd Edition">3rd Edition</option>
                        <option value="Special Edition">Special Edition</option>
                        <option value="Full Volume">Full Volume</option>
                    </select>
                </div>
                <label for="" class="col-sm-2 p-2">Book Type:</label>
                <div class="col-sm-10 p-2">
                    <select name="type" id="" class="form-control" required>
                        <option value="Science Fiction">Science Fiction</option>
                        <option value="Romance">Romance</option>
                        <option value="Trivia and Discovery">Trivia and Discovery</option>
                        <option value="Law">Law</option>
                        <option value="Computer">Computer</option>
                        <option value="Language">Language</option>
                    </select>
                </div>
                <label for="" class="col-sm-2 p-2">Book Status:</label>
                <div class="col-sm-10 p-2">
                    <select name="status" id="" class="form-control" required>
                        <option value="U">Usable</option>
                        <option value="S">Slightly Usable</option>
                        <option value="N">Not Usable</option>
                    </select>
                </div> 
            </div>
             <input type="submit" value="Save" name="save" class="btn btn-outline-success mx-auto d-block">                
        </form>
    </div>
</body>
</html>