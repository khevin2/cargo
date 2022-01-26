<?php
session_start();
include('conn.php');
if($_SESSION['loggedin'] != 1) header('location:login.php?next=dashboard');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="navbar-nav col-sm-3">
            <!-- NAVIGATION  -->
            <h3 class="p-3 border bg-light m-1">
                <?php  echo strtoupper($_SESSION['user']);  ?>
            </h3>
            <ul class="list-group">
                <li class="nav-link my-3 mx-2 card px-4 py-3"><a href="dashboard.php">DASHBOARD</a></li>
                <li class="nav-link my-3 mx-2 card px-5 py-3"><a href="export.php">EXPORT</a></li>
                <li class="nav-link my-3 mx-2 card px-5 py-3"><a href="import.php">IMPORT</a></li>
                <li class="nav-link my-3 mx-2 card px-5 py-3"><a href="report.php">REPORT</a></li>
                <li id="logout" class="nav-link my-3 mx-2 card px-5 py-3 rounded-pill"><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div class="card me-1 col-sm-8 my-2">
            <!-- CONTENT  -->
            <div class="card-title border bg-light p-4 mt-2 ">CARGO LTD.</div>
            <div class="card-body">
                CARGO Ltd is a public bonded warehouse located in Kigali City, Kicukiro District. The company
                has been handling most Imports and Exports of furniture such as Tables, Chairs, Beds and
                Dressers). It also provides transit facilities for all cargo passing through Rwanda to the neighboring
                countries.
            </div>
        </div>
        </div>
        

    </div>
</body>

</html>