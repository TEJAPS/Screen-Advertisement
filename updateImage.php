<?php
session_start();

include('./assets/connection.php');
    $id = $_POST["snoid"];
    $imageName = mysqli_real_escape_string($con,$_FILES["image"]["name"]);
    $imageData = mysqli_real_escape_string($con,file_get_contents($_FILES["image"]["tmp_name"]));
    $imageType = mysqli_real_escape_string($con,$_FILES["image"]["type"]);
    if(substr($imageType,0,5) == "image"){    }
    else {
        echo "Only images are allowed";
    }
    
if (mysqli_query($con,"UPDATE `screen` SET `Image`='$imageData' WHERE `Sno`= '$id'")){} else {
    echo "Error: <br>" . mysqli_error($con); }
    $_SESSION["snoid"]= $id;
?>
<script> window.location.href = "http://localhost:8080/posters/showProfile.php"; </script>
