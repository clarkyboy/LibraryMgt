<?php
    require_once '../classes/bookDAO.php';
    $isbn = $_GET['ISBN'];
    $bookdao = new BookAccessObject;
    $book = $bookdao->getOneBook($isbn);

    if(isset($_POST['edit'])){
        $isbn = $_POST['isbn'];
        $bookname = $_POST['bookname'];
        $author = $_POST['author'];
        $dateadded = $_POST['dateadded'];
        $datepublished = $_POST['datepublished'];
        $publisher = $_POST['publisher'];
        $edition = $_POST['edition'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $result = $bookdao->updateBook($isbn, $bookname, $author, $dateadded, $datepublished, $publisher, $edition, $type, $status);

        if($result){
           header('Location: book-retrieve.php');
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
        <h1>Library Management System <a href="../logout.php?page=2">Logout</a> </h1>
    </div>
    <div class="container mt-3 justify-content-center p-3">
        <h4 class="display-4">Edit ISBN: <?php echo $isbn; ?></h4>
        <form action="" method="post">
            <div class="row p-3">
                <label for="" class="col-sm-2 p-2">Book ISBN:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="isbn" id="" class="form-control" value="<?php echo $book['book_ISBN']; ?>">
                </div>
                <label for="" class="col-sm-2 p-2">Book Name:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="bookname" id="" class="form-control" value="<?php echo $book['book_name']; ?>">
                </div>
                <label for="" class="col-sm-2 p-2">Book Author:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="author" id="" class="form-control" value="<?php echo $book['book_author']; ?>">
                </div> 
                <label for="" class="col-sm-2 p-2">Book Date Added:</label>
                <div class="col-sm-10 p-2">
                    <input type="date" name="dateadded" id="" value="<?php echo $book['book_date_added']; ?>" class="form-control">
                </div> 
                <label for="" class="col-sm-2 p-2">Book Date Published:</label>
                <div class="col-sm-10 p-2">
                    <input type="date" name="datepublished" id="" class="form-control" value="<?php echo $book['book_date_published']; ?>">
                </div> 
                <label for="" class="col-sm-2 p-2">Book Publisher:</label>
                <div class="col-sm-10 p-2">
                    <input type="text" name="publisher" id="" class="form-control" value="<?php echo $book['book_publisher']; ?>">
                </div>
                <label for="" class="col-sm-2 p-2">Book Edition:</label>
                <div class="col-sm-10 p-2">
                    <select name="edition" id="" class="form-control">
                        <!-- <option value="1st Edition">1st Edition</option>
                        <option value="2nd Edition">2nd Edition</option>
                        <option value="3rd Edition">3rd Edition</option>
                        <option value="Special Edition">Special Edition</option>
                        <option value="Full Volume">Full Volume</option> -->
                        <?php
                            switch($book['book_edition']){
                                case "1st Edition":
                                    echo "<option value='1st Edition' selected>1st Edition</option>";
                                    echo "<option value='2nd Edition'>2nd Edition</option>";
                                    echo "<option value='3rd Edition'>3rd Edition</option>";
                                    echo "<option value='Special Edition'>Special Edition</option>";
                                    echo "<option value='Full Volume'>Full Volume</option>";
                                    break;
                                case "2nd Edition":
                                    echo "<option value='1st Edition'>1st Edition</option>";
                                    echo "<option value='2nd Edition' selected>2nd Edition</option>";
                                    echo "<option value='3rd Edition'>3rd Edition</option>";
                                    echo "<option value='Special Edition'>Special Edition</option>";
                                    echo "<option value='Full Volume'>Full Volume</option>";
                                    break;
                                case "3rd Edition":
                                    echo "<option value='1st Edition'>1st Edition</option>";
                                    echo "<option value='2nd Edition'>2nd Edition</option>";
                                    echo "<option value='3rd Edition' selected>3rd Edition</option>";
                                    echo "<option value='Special Edition'>Special Edition</option>";
                                    echo "<option value='Full Volume'>Full Volume</option>";
                                    break;
                                case "Special Edition":
                                    echo "<option value='1st Edition'>1st Edition</option>";
                                    echo "<option value='2nd Edition'>2nd Edition</option>";
                                    echo "<option value='3rd Edition'>3rd Edition</option>";
                                    echo "<option value='Special Edition' selected>Special Edition</option>";
                                    echo "<option value='Full Volume'>Full Volume</option>";
                                    break;
                                case "Full Volume":
                                    echo "<option value='1st Edition'>1st Edition</option>";
                                    echo "<option value='2nd Edition'>2nd Edition</option>";
                                    echo "<option value='3rd Edition'>3rd Edition</option>";
                                    echo "<option value='Special Edition'>Special Edition</option>";
                                    echo "<option value='Full Volume' selected>Full Volume</option>";
                                    break;
                                default:
                                    echo "No options";
                            }
                        ?>
                    </select>
                </div>
                <label for="" class="col-sm-2 p-2">Book Type:</label>
                <div class="col-sm-10 p-2">
                    <select name="type" id="" class="form-control">
                        <!-- <option value="Science Fiction">Science Fiction</option>
                        <option value="Romance">Romance</option>
                        <option value="Trivia and Discovery">Trivia and Discovery</option>
                        <option value="Law">Law</option>
                        <option value="Computer">Computer</option>
                        <option value="Language">Language</option> -->
                        <?php
                            switch($book['book_type']){
                                case "Science Fiction":
                                    echo "<option value='Science Fiction' selected>Science Fiction</option>";
                                    echo "<option value='Romance'>Romance</option>";
                                    echo "<option value='Trivia and Discovery'>Trivia and Discovery</option>";
                                    echo "<option value='Law'>Law</option>";
                                    echo "<option value='Computer'>Computer</option>";
                                    echo "<option value='Language'>Language</option>";
                                    break;
                                case "Romance":
                                    echo "<option value='Science Fiction'>Science Fiction</option>";
                                    echo "<option value='Romance' selected>Romance</option>";
                                    echo "<option value='Trivia and Discovery'>Trivia and Discovery</option>";
                                    echo "<option value='Law'>Law</option>";
                                    echo "<option value='Computer'>Computer</option>";
                                    echo "<option value='Language'>Language</option>";
                                    break;
                                case "Trivia and Discovery":
                                    echo "<option value='Science Fiction'>Science Fiction</option>";
                                    echo "<option value='Romance'>Romance</option>";
                                    echo "<option value='Trivia and Discovery' selected>Trivia and Discovery</option>";
                                    echo "<option value='Law'>Law</option>";
                                    echo "<option value='Computer'>Computer</option>";
                                    echo "<option value='Language'>Language</option>";
                                    break;
                                case "Law":
                                    echo "<option value='Science Fiction'>Science Fiction</option>";
                                    echo "<option value='Romance'>Romance</option>";
                                    echo "<option value='Trivia and Discovery'>Trivia and Discovery</option>";
                                    echo "<option value='Law' selected>Law</option>";
                                    echo "<option value='Computer'>Computer</option>";
                                    echo "<option value='Language'>Language</option>";
                                    break;
                                case "Computer":
                                    echo "<option value='Science Fiction'>Science Fiction</option>";
                                    echo "<option value='Romance'>Romance</option>";
                                    echo "<option value='Trivia and Discovery'>Trivia and Discovery</option>";
                                    echo "<option value='Law'>Law</option>";
                                    echo "<option value='Computer' selected>Computer</option>";
                                    echo "<option value='Language'>Language</option>";
                                    break;
                                case "Language":
                                    echo "<option value='Science Fiction'>Science Fiction</option>";
                                    echo "<option value='Romance'>Romance</option>";
                                    echo "<option value='Trivia and Discovery'>Trivia and Discovery</option>";
                                    echo "<option value='Law'>Law</option>";
                                    echo "<option value='Computer'>Computer</option>";
                                    echo "<option value='Language' selected>Language</option>";
                                    break;
                                default:
                                    echo "No options";
                            }
                        ?>
                    </select>
                </div>
                <label for="" class="col-sm-2 p-2">Book Status:</label>
                <div class="col-sm-10 p-2">
                    <select name="status" id="" class="form-control">
                        <!-- <option value="U">Usable</option>
                        <option value="S">Slightly Usable</option>
                        <option value="N">Not Usable</option> -->
                        <?php
                            if($book['book_status'] == 'U'){
                                echo "<option value='U' selected>Usable</option>";
                                echo "<option value='S'>Slightly Usable</option>";
                                echo "<option value='N'>Not Usable</option>";
                            }elseif($book['book_status'] == 'S'){
                                echo "<option value='U'>Usable</option>";
                                echo "<option value='S' selected>Slightly Usable</option>";
                                echo "<option value='N'>Not Usable</option>";
                            }else{
                                echo "<option value='U'>Usable</option>";
                                echo "<option value='S'>Slightly Usable</option>";
                                echo "<option value='N' selected>Not Usable</option>";
                            }
                        ?>
                    </select>
                </div> 
            </div>
                <div class="mx-auto d-block">
                    <input type="submit" value="Edit <?php echo $isbn; ?>" name="edit" class="btn btn-outline-warning">
                    <a href="book-retrieve.php" role="button" class="btn btn-outline-danger">Cancel</a>
                </div>             
        </form>
    </div>
</body>
</html>