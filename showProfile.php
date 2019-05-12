<?php
session_start();

if(isset($_POST["snoid"]) && $_SESSION["status"] == "valid")
{ $id = $_POST["snoid"]; $_SESSION["snoid"]=$id;}
else
{ $id = $_SESSION["snoid"];  }

include('./assets/connection.php');


if( $_SESSION["status"] == "invalid")
echo "<script>window.location.href='./index.php'
alert('Please Login First'); </script>";

?>

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
<?php include('./assets/loggedHeader.php'); ?>
<body>
    <?php
    $query = mysqli_query($con,"SELECT * from `screen` WHERE `SNO`='$id'");
    while($row = mysqli_fetch_assoc($query)){
        $name = $row["Name"];
    $imageData = $row["Image"];
    $description = $row["Description"];
    }//while loop
    ?>
<div class="container">    
    <form action="updateContent.php" method="POST" >
        <input type="text" hidden name="snoid" value="<?php echo $id ?>"/>
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" value="<?php echo $name; ?>"/>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input class="form-control" type="text" id="description" name="description" value="<?php echo $description; ?>"/>
        </div>
        <input type="submit" name="submit" value="Update" class="btn btn-primary" />
    </form>
    <br/>
    <form action="updateImage.php" method="POST" enctype="multipart/form-data">
        <input type="text" hidden name="snoid" value="<?php echo $id ?>"/>
        <div>
        <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $imageData).'" alt="Card image" style="width:100%"/>'; ?>
        </div>
        <!-- <button> <label for="image">Select file if you want to upload new one</label> </button> -->
        <div class="form-group">
            <label for="image">Select file if you want to upload new one</label>
            <input type="file" required id="image"  name="image" />
        </div>
        <br/>
        <input class="btn btn-primary" type="submit" name="submit" value="Upload"/>
    </form>
</div>
</body>
</html>