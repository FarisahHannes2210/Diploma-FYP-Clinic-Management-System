<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php

    include('connect.php');
    // include('func_appointment.php');
    // include('header.php');

    // if(isset($_POST['generate_invoice_btn'])){

    $APP_ID = $_REQUEST['APP_ID'];

    $sql = "  SELECT * FROM appointment NATURAL JOIN employee NATURAL JOIN patient WHERE APP_ID = $APP_ID";

    $result = mysqli_query($conn,$sql);
    while ($fetch = $result->fetch_array()){

    $PAT_NAME = $fetch['PAT_NAME'];
    $EMP_FULLNAME = $fetch['EMP_FULLNAME'];
    $EMP_EMAIL = $fetch['EMP_EMAIL'];
    $PAT_EMAIL = $fetch['PAT_EMAIL'];
    $END_TIME = $fetch['END_TIME'];
    $APP_DETAIL = $fetch['APP_DETAIL'];
    $AMOUNT_PAID = $fetch['AMOUNT_PAID'];
    $TOTAL_COST = $fetch['TOTAL_COST'];

    $balance =  $fetch['AMOUNT_PAID'] - $fetch['TOTAL_COST'];

    // $total = 100+0+17.5+1+0.2;
//echo number_format((float)$total);  //119
  // echo number_format(round((float)$total,2),2);  //118.50

     ?>
    <title>Generate Invoice</title>
    <link rel="stylesheet" href="styleinvoice.css">
  </head>
  <body>
<div class="receipt-content">
<div class="container bootstrap snippets bootdey">
<div class="row">
<div class="col-md-12">
<div class="invoice-wrapper">
<div class="intro">
Hi <strong><?php echo $PAT_NAME ?></strong>,
This is the receipt for a payment of RM <strong><?php echo $TOTAL_COST ?></strong> for your appointment.
</div>

<div class="payment-info">
<div class="row">
<div class="col-sm-6">
<span>Appointment Id.</span>
<strong><?php echo $APP_ID ?></strong>
</div>
<div class="col-sm-6 text-right">
<span>Payment Date/Time</span>
<strong><?php echo $END_TIME ?></strong>
</div>
</div>
</div>

<div class="payment-details">
<div class="row">
<div class="col-sm-6">
<span>Patient</span>
<strong>
<?php echo $PAT_NAME ?>
</strong>
<p>
<a href="#">
<?php echo $PAT_EMAIL ?>
</a>
</p>
</div>
<div class="col-sm-6 text-right">
<span>Payment To</span>
<strong>
<?php echo $EMP_FULLNAME ?>
</strong>
<p>
<a href="#">
<?php echo $EMP_EMAIL ?>
</a>
</p>
</div>
</div>
</div>

<div class="line-items">
<div class="headers clearfix">
<div class="row">
<div class="col-xs-4">Description</div>

<div class="col-xs-5 text-right">Amount Paid</div>
</div>
</div>
<div class="items">
<div class="row item">
<div class="col-xs-4 desc">
Appointment/Consultations
</div>

<div class="col-xs-5 amount text-right">
<?php echo  $TOTAL_COST ?>
</div>
</div>


</div>
<div class="total text-right">
  <p class="extra-notes">
								<strong>Payment Highlights</strong><br>
                <strong>Total Cost: <?php echo $TOTAL_COST ?></strong>
                <strong>Amount Paid: <?php echo $AMOUNT_PAID ?></strong>
                <strong>Balance: <?php echo $balance ?></strong>

								Thanks for getting an appointment/consultaions with us.
							</p>
<div class="field grand-total">
Total <span><?php echo  $TOTAL_COST ?></span>
</div>
</div>

<!-- <div class="print">
<a href="func_print.php">
<i class="fa fa-print"></i>
Print this receipt
</a> -->
</div>
</div>
</div>

<!-- <div class="footer">
Copyright © 2022. Min CLinic
</div> -->
</div>
</div>
</div>
</div>
<?php } ?>

<script>
function PrintPage() {
window.print();
}
document.loaded = function(){

}
window.addEventListener('DOMContentLoaded', (event) => {
PrintPage()
setTimeout(function(){ window.close() },750)
});
</script>

  </body>
</html>



<!-- -->
