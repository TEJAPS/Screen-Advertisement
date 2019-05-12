<?php
session_start();
include('./assets/connection.php');
    $id = $_POST["snoid"];
    $name = $_POST["name"];
    $description = $_POST["description"];
if (mysqli_query($con,"UPDATE `screen` SET `Name`='$name',`Description`='$description' WHERE `Sno`= '$id'")){} else {
    echo "Error: <br>" . mysqli_error($con);
}

$_SESSION["snoid"]= $id;
?>
<script> window.location.href = "http://localhost:8080/posters/showProfile.php"; </script>

