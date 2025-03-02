<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include 'function.php';
      include("header.php"); ?>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {background-color: #969A97;}
    </style>
  </head>
  <body id="body">
    <div class="container">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-6">
          <center><h3 id="myHeader">Update Profile</h3></center>
          <form class="" action="function.php" method="POST">
            <input type="hidden" name="EMP_USERNAME" value="<?php echo $fetch['EMP_USERNAME']; ?>">
            <?php



            ?><?php

            // $updateprofile = true;
            // $EMP_ID=$_REQUEST['EMP_ID'];

            $EMP_USERNAME=$_SESSION['employee'];

//             $userid=$_REQUEST['user_id'];
// $query = $db->query("SELECT * FROM user WHERE user_id = '$userid'") or die(mysqli_error());
// $fetch = $query->fetch_array();

$query = $conn->query("SELECT * FROM employee WHERE EMP_USERNAME='".$_SESSION['employee']."'") ;


            // $sql = "SELECT * FROM employee WHERE EMP_USERNAME ='$EMP_USERNAME'";
            // $query = $conn->query($sql) or die(mysqli_error());
            // $gotResult = $query->fetch_array();

            while($fetch = $query->fetch_assoc()){ ?>

              <label>FullName </label>
              <input type="text" name="EMP_FULLNAME" value="<?php echo $fetch['EMP_FULLNAME']; ?>" class="form-control" required>

              <label>Username </label>
              <input type="text" name="EMP_USERNAME" value="<?php echo $fetch['EMP_USERNAME']; ?>" class="form-control" disabled>

              <label>Password </label>
              <input type="text" name="EMP_PASSWORD" value="<?php echo $fetch['EMP_PASSWORD']; ?>" class="form-control" required>

              <label>Email </label>
              <input type="email" name="EMP_EMAIL" value="<?php echo $fetch['EMP_EMAIL']; ?>" class="form-control" required>

              <label>Phone </label>
              <input type="number" name="EMP_PHONE" value="<?php echo $fetch['EMP_PHONE']; ?>" class="form-control" required>



      <?php  }  ?>

            <br>
            <input type="submit" name="update_profile_btn" class="btn btn-warning form-control" value="Update">

<?php

 ?>



                  <?php
                ?>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
