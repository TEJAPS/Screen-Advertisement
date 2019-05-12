<?php
include('./assets/connection.php');
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $query = mysqli_query($con,"SELECT * from `screen` WHERE `SNO`='$id'");
    while($row = mysqli_fetch_assoc($query)){
        $name = $row["Name"];
        $imageData = $row["Image"];
        $description = $row["Description"];
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $imageData).'"/>';
        echo $description;
    }
}
else {
    echo "error";
}
?>