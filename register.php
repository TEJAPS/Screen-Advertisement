<?php
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$contact = $_POST["contact"];
include('./assets/connection.php');
if (mysqli_query($con,"INSERT INTO `user` ( `Name`, `Password`, `Phone`) VALUES ('$username','$password','$contact')")) {
    echo "<script> alert('User Create Successfully \n Pleas Login to Continue'); 
    window.location.href='./index.php';
    </script>";
} else {
    echo "<script> alert('User Registration Failed \n Please try again'); 
    window.location.href='./index.php';
    </script>";
}
?>