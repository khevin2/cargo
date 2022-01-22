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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login">
        <form action="" method="POST">
            <?php
        if(isset($_GET['invalid'])) include('invalid.php');
        ?>
            <h2>LOGIN</h2>
            <table>
                <tr>
                    <td>USERNAME</td>
                    <TD>
                        <input type="text" name="user" id="">
                    </TD>
                </tr>
                <tr>
                    <td>
                        PASSWORD
                    </td>
                    <td>
                        <input type="password" name="pass" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan=2>
                        <input type="submit" name="submit" id="" value="LOGIN">
                    </td>
                </tr>
            </table>
        </form>
        <div class="logo">CARGO LTD.</div>
    </div>
</body>

</html>