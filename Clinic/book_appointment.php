<?php
include("connect.php");
include 'header.php';

// Get all the categories from category table
$sql = "SELECT * FROM `patient`";
$all_patient = mysqli_query($conn,$sql);

$sql2 = "SELECT * FROM `employee` WHERE EMP_POS = 'doctor'";
$all_employee = mysqli_query($conn,$sql2);


if(isset($_POST['submit']))
{
// Store the Product name in a "name" variable
// $name = mysqli_real_escape_string($con,$_POST['PAT_ID']);

// Store the Category ID in a "id" variable
$PAT_ID = mysqli_real_escape_string($conn,$_POST['PAT_NAME']);

$EMP_ID = mysqli_real_escape_string($conn,$_POST['EMP_FULLNAME']);

$START_TIME = mysqli_real_escape_string($conn,$_POST['START_TIME']);

// $END_TIME = mysqli_real_escape_string($conn,$_POST['END_TIME']);

// Creating an insert query using SQL syntax and
// storing it in a variable.
$sql_insert = "INSERT INTO `appointment`( EMP_ID, PAT_ID,START_TIME, END_TIME) VALUES ('$EMP_ID','$PAT_ID','$START_TIME',NULL)";

// The following code attempts to execute the SQL query
// if the query executes with no errors
// a javascript alert message is displayed
// which says the data is inserted successfully
if(mysqli_query($conn,$sql_insert))
{
  	// echo "appointment added.";
echo '<script>alert("Appointment added successfully")</script>';
header('Location:dashboard.php?success=appointmentCreated');
}
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {background-color: #969A97;}
    </style>
  </head>

            <body id="body">
                <center><h3 id="myHeader">Book Appointment</h3></center>
                <br>
                <div class="container">
                  <div class="col-md-12 d-flex justify-content-center">
                    <div class="col-md-6">

                      <form method="post">

                        <label>Patient Name</label><br>
                        <select class="form-control" name="PAT_NAME">
                        <?php
                        // use a while loop to fetch data
                        // from the $all_categories variable
                        // and individually display as an option
                        while ($fetch = mysqli_fetch_array(
                        $all_patient,MYSQLI_ASSOC)):;
                        ?>
                        <option value="<?php echo $fetch["PAT_ID"];
                        // The value we usually set is the primary key
                        ?>">
                        <?php echo $fetch["PAT_NAME"];
                        // To show the category name to the user
                        ?>
                        </option>


                        <?php
                        endwhile;
                        // While loop must be terminated
                        ?>
                        </select>
                        <br>

                        <label>Doctor In Charge</label><br>
                        <select class="form-control" name="EMP_FULLNAME">
                        <?php
                        // $EMP_FULLNAME=$_REQUEST["EMP_FULLNAME"];
                        // use a while loop to fetch data
                        // from the $all_categories variable
                        // and individually display as an option
                        while ($data = mysqli_fetch_array(
                        $all_employee,MYSQLI_ASSOC)):;
                        ?>
                        <option value="<?php echo $data["EMP_ID"];?>"><?php echo $data["EMP_FULLNAME"];?></option>
                        <!-- // The value we usually set is the primary key -->

                        <?php
                        endwhile;
                        // While loop must be terminated
                        ?>
                        </select>
                        <br>
                        <label>Start Appointment</label><br>
                        <input type="datetime-local" name="START_TIME" value="" class="form-control" required>
                        <br>

                        <input type="submit" name="submit" class=" form-control btn btn-success btn-block" value="Book Appointment">
                        <br>


                      </form>
                    </div>
                  </div>
                </div>

              </body>
            </html>
