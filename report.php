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
            <table>
                <tr>
                    <td colspan="5">FURNITURE STATUS</td>
                </tr>
                <tr>
                    <td>FURNITURE ID</td>
                    <td>DATE</td>
                    <td>QUANTITY</td>
                    <td>STATUS</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                <?php

                $query = "SELECT *,'imported' as status from import union select *,'exported' as status from export";
                $return = mysqli_query($conn,$query) or die(mysqli_error($conn));
                $row = mysqli_num_rows($return);
                while($rows = mysqli_fetch_array($return)){
                        echo "<tr>";
                        echo "<td>".$rows['firnitureid']."</td>";
                        echo "<td>".$rows['importdate']."</td>";
                        echo "<td>".$rows['quantity']."</td>";
                        echo "<td>".$rows['status']."</td>";
                        echo "<td><button><a href ='edit.php?id=".$rows['firnitureid']."'>EDIT</a></button></td>";
                        echo "<td><button><a href ='delete.php?id=".$rows['firnitureid']."'>DELETE</a></button></td>";
                        echo "</tr>";
                    }

                ?>
            </table>
        </div>

    </div>
    CYUSA KHEVEN
</body>

</html>