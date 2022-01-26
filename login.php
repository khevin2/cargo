<?php
session_start();
include('conn.php');

if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM manager WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($rows == 1){
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $row['username'];
        header('location:dashboard.php');
        // echo $_SESSION['loggedin'];
        // echo $_SESSION['user'];
    }
    else{
        header('location:login.php?invalid=true');
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="card align-items-center justify-content-center m-5 py-5 px-1">
            <?php
        if(isset($_GET['invalid'])&& $_GET['invalid'] == true) include('invalid.php');
        ?>
            <h2 class="logo">LOGIN</h2>
             <form action="" method="POST">
            <div class="form-group">
                <label for="username">USERNAME</label>
                <input type="text" name="user" class="form-control my-1" id="username">
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" name="pass" id="password" class="form-control my-1">
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-3 mx-5">LOGIN</button>
        </form>
        <div class="logo">CARGO LTD.</div> </div>
        
    </div>
</body>

</html>