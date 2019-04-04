<?php
    require_once '../classes/borrowerDAO.php';
    $borrowerdao = new BorrowerAccessObject;
    $borrower = $borrowerdao->getBorrowers();
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
    <title>List of Borrowers</title>
    <style>
        /* .trN{
            border: 1px solid red;
        } */
    </style>
</head>
<body>
    <div class="jumbotron">
        <h1>Library Management System</h1>
    </div>
    <div class="container p-3 justify-content-center">
        <h4 class="display-4">List of Borrowers</h4>
        <a href="borrower-insert.php" role="button" class="btn btn-outline-primary m-3"><i class="fas fa-plus"></i> Add Borrower</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>Name</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Username</th>
                <th>Penalty Count</th>
                <th>Member Since</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    foreach ($borrower as $key => $value) {
                        if($value['borrower_status'] == 'N'){
                            echo "<tr class='trN'>";
                                echo "<td>".$value['borrower_name']."</td>";
                                echo "<td>".$value['borrower_address']."</td>";
                                echo "<td>".date('F j, Y', strtotime($value['borrower_dob']))."</td>";
                                echo "<td>".$value['borrower_uname']."</td>";
                                echo "<td>".$value['borrower_penalty_count']."</td>";
                                echo "<td>".date('F j, Y', strtotime($value['borrower_date_added']))."</td>";
                                echo "<td>New</td>";
                                // echo "<td><a href='borrower-update.php?ISBN=".$value['borrower_id']."' class='btn btn-outline-warning disabled'><i class='fas fa-edit'></i></a></td>";
                                if($value['borrower_penalty_count'] >= 3){
                                    echo "<td><a href='borrower-ban.php?id=".$value['borrower_id']."&status=B' class='btn btn-outline-danger'><i class='fas fa-times'></i> Ban Borrower</a></td>";
                                }
                                else{
                                    echo "<td><small>Ban User if Penalty count is greater than or equal to 3</small></td>";
                                }
                            echo "</tr>";
                           
                        }elseif($value['borrower_status'] == 'B'){
                            echo "<tr class='trN'>";
                                echo "<td>".$value['borrower_name']."</td>";
                                echo "<td>".$value['borrower_address']."</td>";
                                echo "<td>".date('F j, y', strtotime($value['borrower_dob']))."</td>";
                                echo "<td>".$value['borrower_uname']."</td>";
                                echo "<td>".$value['borrower_penalty_count']."</td>";
                                echo "<td>".date('F j, Y', strtotime($value['borrower_date_added']))."</td>";
                                echo "<td>Banned</td>";
                                // echo "<td><a href='borrower-update.php?ISBN=".$value['borrower_id']."' class='btn btn-outline-warning disabled'><i class='fas fa-edit'></i></a></td>";
                                echo "<td><a href='borrower-lift.php?id=".$value['borrower_id']."&status=R' class='btn btn-outline-success'><i class='fas fa-hand-holding-heart'></i> Lift Ban</a></td>";
                            echo "</tr>";
                        }
                        else{
                            echo "<tr>";
                                echo "<td>".$value['borrower_name']."</td>";
                                echo "<td>".$value['borrower_address']."</td>";
                                echo "<td>".date('F j, Y', strtotime($value['borrower_dob']))."</td>";
                                echo "<td>".$value['borrower_uname']."</td>";
                                echo "<td>".$value['borrower_penalty_count']."</td>";
                                echo "<td>".date('F j, Y', strtotime($value['borrower_date_added']))."</td>";
                                echo "<td>Regular</td>";
                                // echo "<td><a href='borrower-update.php?ISBN=".$value['borrower_id']."' class='btn btn-outline-warning'><i class='fas fa-edit'></i></a></td>";
                                if($value['borrower_penalty_count'] >= 3){
                                    echo "<td><a href='borrower-ban.php?id=".$value['borrower_id']."&status=B' class='btn btn-outline-danger'><i class='fas fa-times'></i> Ban Borrower</a></td>";
                                }else{
                                    echo "<td><small>Ban User if Penalty count is greater than or equal to 3</small></td>";
                                }
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>