
<?php 
session_start();
if(isset($_SESSION["status"])){} else $_SESSION["status"]="invalid";
    
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
      <link rel="stylesheet" href="./index.css"/>
   </head>
   <?php  
    if($_SESSION["status"]=="invalid")
      include('./assets/header.php');      
      else
      include('./assets/loggedHeader.php');
   ?>
   <body class="body">
      <div class="container">
      <div class="table-responsive">
         <table class="table" disable>
            <?php
               include('./assets/connection.php');
               
               $count = 1;
               for ($x = 0; $x < 7; $x++) {
               ?>
            <tr class="d-flex">
               <?php
                  for ($y = 0; $y < 3; $y++) {
                      $id    = $count++;
                      $query = mysqli_query($con, "SELECT * from `screen` WHERE `SNO`='$id'");
                      while ($row = mysqli_fetch_assoc($query)) {
                          $name        = $row["Name"];
                          $imageData   = $row["Image"];
                          $description = $row["Description"];
                  ?>
               <td class="col-4">
                  <div class="card" id="<?php
                     echo $id;
                     ?>">
                     <?php
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Card image" style="width:100%,height:100%"/>';
                        ?>
                     <div class="card-body">
                        <h4 class="card-title"><?php
                           echo $name;
                           ?></h4>
                        <p class="card-text"><?php
                           echo $description;
                           ?></p>
                        <form action="./showProfile.php" method="POST">
                           <input hidden type="text" name="snoid" value="<?php
                              echo $id;
                              ?>"/>
                           <button type="submit" href="" class="btn btn-primary stretched-link">See Profile</button>
                        </form>
                     </div>
                  </div>
               </td>
               <?php
                  } //while
                  } //for inner for loop  
                  ?>
            </tr>
            <?php
               }
               ?>
         </table>
      </div>
      </div>
   </body>
   <?php
      include("./assets/footer.php");
      ?>
</html>