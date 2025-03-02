<?php
include('connect.php');
include('headeradmin.php');



$APP_ID = $_REQUEST['APP_ID'];
$TOTAL_COST = $_POST['TOTAL_COST'];
$AMOUNT_PAID = $_POST['AMOUNT_PAID'];
// $END_TIME = $_POST['END_TIME'];
// $APP_DETAIL = $_POST['APP_DETAIL'];


$sql = "UPDATE appointment SET TOTAL_COST = '$TOTAL_COST', AMOUNT_PAID = '$AMOUNT_PAID' WHERE APP_ID = $APP_ID";
$result = mysqli_query($conn,$sql);


// header('Location:dashboard.php');

      header('Location:archive_appointmentadmin.php');



 ?>
