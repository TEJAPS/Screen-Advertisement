<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name"/>
    <input type="file" name="image"/>
    <input type="text" name="description" />
    <input type="submit" name="submit" value="Upload"/>
</form>

<?php
if(isset($_POST['submit'])){
    // include('./assets/connection.php');
    $con = mysqli_connect("localhost","root","Vo0xFlDeauPqbeY5");
    mysqli_select_db($con,"Advertise");
    
    

    $imageName = mysqli_real_escape_string($con,$_FILES["image"]["name"]);
    $imageData = mysqli_real_escape_string($con,file_get_contents($_FILES["image"]["tmp_name"]));
    $imageType = mysqli_real_escape_string($con,$_FILES["image"]["type"]);
    if(substr($imageType,0,5) == "image"){
        echo "Working Code";
    }
    else {
        echo "Only images are allowed";
    }
    $name = $_POST["name"];
$description = $_POST["description"];

if (mysqli_query($con,"INSERT INTO `screen` VALUES (20,'$name','$imageData','$description')")) {
    echo "New record created successfully";
} else {
    echo "Error: <br>" . mysqli_error($con);
}
}




?>

</body>
</html>