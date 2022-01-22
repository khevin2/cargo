<?php

include('conn.php');
 $id = $_GET['id'];

 $query = "DELETE FROM import WHERE firnitureid = '$id';";
 $query .="DELETE FROM export where firnitureid = '$id';";
 $query .= "DELETE FROM furniture WHERE firnitureid = '$id'";
 $return = mysqli_multi_query($conn,$query) or die(mysqli_error($conn));
 if($result == true) header('location:report.php?success=true');
 else header('location:report.php?success=false');



?>