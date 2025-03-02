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

<div class="container">
  <div class="col-md-12 d-flex justify-content-center">
    <div class="col-md-6 ">
      <br>
      <h3 id="myHeader">Medical Certificate</h3>
      <form method="post" action="Generate.php">

        <label>Patient Fullname</label>
        <input type="text" name="name" class="form-control" required>

        <label>Patient Address</label>
        <textarea name="address" class="form-control" required></textarea>

        <label>Appointment Date</label>
        <input type="date" name="date" class="form-control" required>

        <label>Diagnosis or Doctor Notes</label>
        <textarea name="diagnosis" class="form-control" required></textarea>

        <label>day/s</label>
        <input type="text" name="day" class="form-control" required>

        <label>Doctor Name</label>
        <input type="text" name="emp_fullname" class="form-control" required>

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
