<!DOCTYPE html>
<?php
   include('connect.php');
?>
<?php include('header.php'); ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <style>
    body {background-color: #969A97;}
    </style>
    <meta charset="utf-8">
    <title>Appointment Details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel = "stylesheet" type = "text/css" href = "Admin/assets/css/bootstrap.css " />
    <link rel = "stylesheet" type = "text/css" href = "Admin/assets/css/style.css" />
    <link href="Admin/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="Admin/assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  </head>
  <body id="body">

          <!-- # payment -->
          <div class="padding">
              <div class="row">
                  <div class="container-fluid d-flex justify-content-center">

                        <div class="col-md-6">
                          <h3>Payment</h3>

                            <?php

                            $APP_ID = $_REQUEST['APP_ID'];
                              // $APP_ID = $_SESSION['APP_ID'];

                            // $query = $conn->query("SELECT * FROM appointment WHERE APP_ID='".$_SESSION['APP_ID']."'") ;
                            $query = $conn->query("SELECT * FROM employee NATURAL JOIN appointment NATURAL JOIN patient WHERE APP_ID = '$APP_ID'");


                            while($fetch = $query->fetch_assoc()){

                             ?>

                             <form class="" method="POST" action="func_payment.php?APP_ID=<?php echo $fetch['APP_ID']?>">

                             <input type="hidden" name="APP_ID" value="<?php echo $fetch['APP_ID']; ?>">
                             <input type="hidden" name="EMP_ID" value="<?php echo $fetch['EMP_ID']; ?>">
                             <input type="hidden" name="PAT_ID" value="<?php echo $fetch['PAT_ID']; ?>">

                            <label>Patient Name</label>
                            <div class="col-md-11">
                              <input type="text" name="PAT_NAME" value="<?php echo $fetch["PAT_NAME"]; ?>" class="form-control" readonly>
                            </div>

                              <label>Start Appointment</label>
                            <div class="col-md-11">
                              <input type="datetime-local" name="START_TIME"  value="<?php echo $fetch["START_TIME"]; ?>" class="form-control" readonly>
                            </div>

                            <label>End Appointment</label>
                            <div class="col-md-11">
                              <input type="datetime-local" name="END_TIME" value="<?php echo $fetch["END_TIME"]; ?>"  class="form-control" readonly>
                            </div>

                            <label>Appointment Details</label>
                            <div class="col-md-11">
                              <textarea name="APP_DETAIL" value="<?php echo $fetch["APP_DETAIL"]; ?>"  class="form-control"  readonly><?php echo $fetch["APP_DETAIL"]; ?></textarea>
                            </div>

                            <label>Medicine Given</label>
                            <div class="col-md-11">
                              <textarea name="APP_MED" value="<?php echo $fetch["APP_MED"]; ?>"  class="form-control" readonly><?php echo $fetch["APP_MED"]; ?></textarea>
                            </div>

                            <label>Total Cost(RM)</label>
                            <div class="col-md-11">
                              <input type="float" name="TOTAL_COST" value="<?php echo $fetch["TOTAL_COST"]; ?>"  class="form-control" required>
                            </div>

                            <label>Amount Of Paid(RM)</label>
                            <div class="col-md-11">
                              <input type="float" name="AMOUNT_PAID" value="<?php echo $fetch["AMOUNT_PAID"]; ?>"  class="form-control" required>
                            </div>
                            <br>

                            <div class="col-md-11"> <input value="MAKE PAYMENT" type="submit" name="update_payment_btn" class="btn btn-success form-control" > </div>

                           <?php  }  ?>

                        </div>

                                  </form>
                              </div>
                          </div>
                      </div>

              </div>
          </div>
  </body>
</html>
