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
    <title>EXPORT</title>
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
            <div class="main">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td colspan="5">EXPORT</td>
                        </tr>
                        <tr>
                            <td>FUNITURE ID <input type="text" name="funid" id=""></td>
                            <td>FURNITIRE NAME <input type="text" name="name" id=""> </td>
                            <td>FURNITURE OWNER <input type="text" name="owner" id=""> </td>
                            <td>EXPORT DATE <input type="date" name="date" id=""></td>
                            <td> QUANTITY <input type="number" name="quantity" id=""></td>
                        </tr>
                        <tr>
                            <td colspan="5"><input type="submit" value="GO" name='submit'></td>
                        </tr>
                    </table>
                </form>

                <div class="table">
                    <?php 
                    
                    $query = "SELECT e.firnitureid AS furid, f.furniturename AS furname, e.exportdate, e.quantity FROM export e, furniture f where e.firnitureid = f.firnitureid";
                    $return = mysqli_query($conn,$query) or die(mysqli_error($conn));
                    $row = mysqli_num_rows($return);
                    echo "<table>";
                    echo "<tr>
                    <td>FURNITURE ID</td>
                    <td>FURNITURE NAME</td>
                    <td>IMPORT DATE</td>
                    <td>QUANTITY</td>
                    </tr>
                    ";
                    while($rows = mysqli_fetch_array($return)){
                        echo "<tr>";
                        echo "<td>".$rows['furid']."</td>";
                        echo "<td>".$rows['furname']."</td>";
                        echo "<td>".$rows['exportdate']."</td>";
                        echo "<td>".$rows['quantity']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";


                    ?>
                </div>
            </div>
        </div>

    </div>
    CYUSA KHEVEN
</body>

</html>

<?php


if(isset($_POST['submit'])){
    $id = $_POST['funid'];
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $sql = " INSERT INTO `furniture`(`firnitureid`, `furniturename`, `furnitureowner`) VALUES ('$id','$name','$owner') ;";
    $sql .= "INSERT INTO `export` (`firnitureid`, `exportdate`, `quantity`) VALUES ('$id', '$date', '$quantity') ";
    $result = mysqli_multi_query($conn, $sql) or die(mysqli_error($conn));
    if($result == true) header('location:export.php?error=false');
    else header('location:export.php?error=true');
}


?>