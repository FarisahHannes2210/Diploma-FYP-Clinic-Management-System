<?php
   include('connect.php');
?>
<html>

   <head>
      <?php include('header.php');?>
      <title>Medical Certificate</title>
      <link rel="stylesheet" href="style.css">
      <style>
      body {background-color: #969A97;}
      </style>
   </head>
   <body id="body">
     <?php
     $APP_ID = $_REQUEST['APP_ID'];
       // $APP_ID = $_SESSION['APP_ID'];

     // $query = $conn->query("SELECT * FROM appointment WHERE APP_ID='".$_SESSION['APP_ID']."'") ;
     $query = $conn->query("SELECT * FROM employee NATURAL JOIN appointment NATURAL JOIN patient WHERE APP_ID = '$APP_ID'");

     while($fetch = $query->fetch_assoc()){

      ?>

<div class="container">
  <div class="col-md-12 d-flex justify-content-center">
    <div class="col-md-6 ">
      <br>
      <h3 id="myHeader">Medical Certificate</h3>
      <form method="post" action="Generate_MC_patient.php">

        <input type="hidden" name="APP_ID" value="<?php echo $fetch['APP_ID']; ?>">
        <input type="hidden" name="EMP_ID" value="<?php echo $fetch['EMP_ID']; ?>">
        <input type="hidden" name="PAT_ID" value="<?php echo $fetch['PAT_ID']; ?>">

        <label>Patient Fullname</label>
        <input type="text" name="PAT_NAME" class="form-control" value="<?php echo $fetch["PAT_NAME"]; ?>" readonly>

        <label>Patient Address</label>
        <textarea name="PAT_ADDRESS" class="form-control" value="<?php echo $fetch["PAT_ADDRESS"]; ?>" readonly><?php echo $fetch["PAT_ADDRESS"]; ?></textarea>

        <label>Appointment Date</label>
        <input type="datetime-local" name="END_TIME" class="form-control" value="<?php echo $fetch["END_TIME"]; ?>"readonly>

        <label>Diagnosis or Doctor Notes</label>
        <textarea name="APP_DETAIL" value="<?php echo $fetch["APP_DETAIL"]; ?>" class="form-control" readonly><?php echo $fetch["APP_DETAIL"]; ?></textarea>

        <label>day/s</label>
        <input type="number" name="day" class="form-control" required>

        <label>Doctor Name</label>
        <input type="text" name="EMP_FULLNAME" value="<?php echo $fetch["EMP_FULLNAME"]; ?>"  class="form-control" readonly>

         <?php  }  ?>

        <br>
        <input type="submit" name="create" class="btn btn-success btn-block form-control" value="Generate Medical Certificate">
        <!-- <button type="submit" name="create" class="btn btn-success btn-block">Generate PDF</button> -->
        <!-- <button type="submit" class="btn btn-success btn-block">Generate PDF</button> -->
      </form>

    </div>
  </div>
</div>




   </body>

</html>
