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
</head>

<body>
    <div class="container">
        <div class="nav">
            <!-- NAVIGATION  -->
            <h3>
                <?php  echo strtoupper($_SESSION['user']);  ?>
            </h3>
            <ul>
                <li><a href="dashboard.php">DASHBOARD</a></li>
                <li><a href="export.php">EXPORT</a></li>
                <li><a href="import.php">IMPORT</a></li>
                <li><a href="report.php">REPORT</a></li>
                <li id="logout"><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div class="content">
            <!-- CONTENT  -->
            <div class="logo">CARGO LTD.</div>
            <div class="desc">
                CARGO Ltd is a public bonded warehouse located in Kigali City, Kicukiro District. The company
                has been handling most Imports and Exports of furniture such as Tables, Chairs, Beds and
                Dressers). It also provides transit facilities for all cargo passing through Rwanda to the neighboring
                countries.
            </div>
        </div>

    </div>
    CYUSA KHEVEN
</body>

</html>