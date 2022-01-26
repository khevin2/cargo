<?php
session_start();
include('conn.php');
if($_SESSION['loggedin'] != 1) header('location:login.php?next=dashboard');

########
if(isset($_GET['id'])){
    $id = $_GET['id'];
 $query = "SELECT * FROM furniture WHERE firnitureid = '$id'";
 $return = mysqli_query($conn,$query) or die(mysqli_error($conn));
 $row = mysqli_num_rows($return);
 $rows = mysqli_fetch_array($return);

}
########

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
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
            <fieldset>
                <legend>EDIT FURNITURE</legend>
                <form action="" method="POST">
                    <div class="form-group border p-2 my-2">
                        <label for="id">ID</label>
                        <input type="text" name="id" id="" readonly class="form-control my-1"
                                    value="<?php echo $rows['firnitureid'];  ?>">
                    </div>
                    <div class="form-group border p-2 my-2">
                        <label for="name">NAME</label>
                        <input type="text" name="name" id="name" class="form-control my-1"
                                    value="<?php echo $rows['furniturename'];  ?>">
                    </div>
                    <div class="form-group border p-2 my-2">
                        <label for="owner">OWNER</label>
                        <input type="text" name="id" id="owner" class="form-control my-1"
                                    value="<?php echo $rows['furnitureowner'];  ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary my-3 mx-5">EDIT</button>
                </form>
            </fieldset>
        </div>

    </div>
    CYUSA KHEVEN
</body>

</html>

<?php

if(isset($_POST['submit'])){
    // $id = $_POST['id'];
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $sql = "UPDATE furniture SET furniturename = '$name', furnitureowner = '$owner' WHERE firnitureid = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($result == true) header('location:report.php?success=true');
    else header('location:edit.php?error=true');
}


?>