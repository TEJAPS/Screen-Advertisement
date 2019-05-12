<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
include('./assets/connection.php');

if (mysqli_query($con,"SELECT count(*) from `user` where `Name` like '$username' and `Password` like '$password'")->fetch_assoc()['count(*)'] > 0) {
    $_SESSION["status"] = "valid";
    echo $_SESSION["status"];
    echo "<script> alert('login successful'); 
    window.location.href='./index.php';
    </script>";
} else {
    $_SESSION["status"] = "Invalid";
    echo "<script> alert('login falied'); 
    window.location.href='./index.php';
    </script>";
}
?>