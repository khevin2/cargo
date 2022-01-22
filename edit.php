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
            <fieldset>
                <legend>EDIT FURNITURE</legend>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td colspan="5">EDIT FURNITURE</td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>
                                <input type="text" name="id" id="" readonly
                                    value="<?php echo $rows['firnitureid'];  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td>
                                <input type="text" name="name" id="" value="<?php  echo $rows['furniturename'];  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>OWNER</td>
                            <td>
                                <input type="text" name="owner" id="" value="<?php  echo $rows['furnitureowner'];   ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="EDIT">
                            </td>
                        </tr>
                    </table>
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