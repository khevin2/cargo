<?php

session_start();
include('conn.php');

if($_SESSION['loggedin'] == true) header('location:dashboard.php');
else header('location:login.php');


?>