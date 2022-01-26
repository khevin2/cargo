<?php
session_start();
require_once('conn.php');
if($_SESSION['loggedin'] != 1) header('location:login.php?next=dashboard');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPORT</title>
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
            <div class="container-md">
                <div class="card-subtitle mx-5 fs-3">IMPORT</div>
                <form action="" method="post" class="border p-3">
                     <div class="row justify-content-center align-items-center ">
                        <div class="col">
                            <label for="id">ID </label>
                            <input type="text" name="funid" id="id"></div>
                        <div class="col">
                            <label for="name">NAME </label> 
                            <input type="text" name="name" id="name"></div>
                    </div>
                    <div class="row justify-content-center align-items-center my-2">
                        <div class="col">
                            <label for="owner">OWNER</label>  
                            <input type="text" name="owner" id="owner"></div>
                        <div class="col">
                            <label for="date">DATE</label>  
                            <input type="date" name="date" id="date"></div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col">
                            <label for="quantity">QUANTITY</label>  
                            <input type="number" name="quantity" id="quantuty"></div>
                        <div class="col"><input type="submit" value="GO" name='submit'></div>
                    </div>
                </form>

                <div class="table">
                    <?php 
                    
                    $query = "SELECT i.firnitureid AS furid, f.furniturename AS furname, i.importdate, i.quantity FROM import i, furniture f where i.firnitureid = f.firnitureid";
                    $return = mysqli_query($conn,$query) or die(mysqli_error($conn));
                    $row = mysqli_num_rows($return);
                    echo "<table>";
                    echo "<tr>
                    <th class = 'border-end'>FURNITURE ID</th>
                    <th class = 'border-end'>FURNITURE NAME</th>
                    <th class = 'border-end'>IMPORT DATE</th>
                    <th class = 'border-end'>QUANTITY</th>
                    </tr>
                    ";
                    while($rows = mysqli_fetch_array($return)){
                        echo "<tr>";
                        echo "<td class= 'border-end'>".$rows['furid']."</td>";
                        echo "<td class = 'border-end'>".$rows['furname']."</td>";
                        echo "<td class = 'border-end'>".$rows['importdate']."</td>";
                        echo "<td class = 'border-end'>".$rows['quantity']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";


                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<?php


if(isset($_POST['submit'])){
    $id = $_POST['funid'];
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO `furniture`(`firnitureid`, `furniturename`, `furnitureowner`) VALUES ('$id','$name','$owner'); ";
    $sql .= "INSERT INTO `import` (`firnitureid`, `importdate`, `quantity`) VALUES ('$id', '$date', '$quantity')";
    $result = mysqli_multi_query($conn, $sql) or die(mysqli_error($conn));
    if($result == true) header('location:import.php?error=false');
    else header('location:import.php?error=true');
}


?>