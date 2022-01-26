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
            <div class="container-fluid">
                <div class="card-subtitle mx-5 fs-3">REPORT OF FURNITURE STATUS</div>
                <div class="table">
                    <table>
                <tr>
                    <td colspan="5">FURNITURE STATUS</td>
                </tr>
                <tr>
                    <th class= 'border-end'>FURNITURE ID</th>
                    <th class= 'border-end'>DATE</th>
                    <th class= 'border-end'>QUANTITY</th>
                    <th class= 'border-end'>STATUS</th>
                    <th class= 'border-end'>EDIT</th>
                    <th class= 'border-end'>DELETE</th>
                </tr>
                <?php

                $query = "SELECT *,'imported' as status from import union select *,'exported' as status from export";
                $return = mysqli_query($conn,$query) or die(mysqli_error($conn));
                $row = mysqli_num_rows($return);
                while($rows = mysqli_fetch_array($return)){
                        echo "<tr>";
                        echo "<td class= 'border-end'>".$rows['firnitureid']."</td>";
                        echo "<td class= 'border-end'>".$rows['importdate']."</td>";
                        echo "<td class= 'border-end'>".$rows['quantity']."</td>";
                        echo "<td class= 'border-end'>".$rows['status']."</td>";
                        echo "<td class= 'border-end'><button class='btn btn-light'><a href ='edit.php?id=".$rows['firnitureid']."'>EDIT</a></button></td>";
                        echo "<td class= 'border-end'><button class='btn btn-danger'><a href ='delete.php?id=".$rows['firnitureid']."'>DELETE</a></button></td>";
                        echo "</tr>";
                    }

                ?>
            </table>
                </div>
            </div>
    </div>
</body>

</html>