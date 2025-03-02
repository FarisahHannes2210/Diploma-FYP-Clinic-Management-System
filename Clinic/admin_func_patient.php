<?php
 include 'connect.php';

 //add patient (patient.php)
 if(isset($_POST['add_pat_btn'])){

 	$PAT_NAME =$_POST['PAT_NAME'];
 	$PAT_PHONE =$_POST['PAT_PHONE'];
 	$PAT_EMAIL =$_POST['PAT_EMAIL'];
 	$PAT_ADDRESS =$_POST['PAT_ADDRESS'];

 	$sql = "INSERT INTO patient (PAT_NAME, PAT_PHONE, PAT_EMAIL, PAT_ADDRESS) VALUES ('$PAT_NAME','$PAT_PHONE','$PAT_EMAIL','$PAT_ADDRESS')";
 	$result = mysqli_query($conn,$sql);
 	header('location: patientadmin.php'); //redirect to patient.php after inserting

 	if ($result) {
 		?>echo "'<script>alert("Patient added.")</script>'";<?php
 		echo "<meta http-equiv=\"refresh\"content=\"2;URL=patientadmin.php\">";
 		// exit;
 	}else {
 		?>echo "'<script>alert("Patient not added.")</script>'";<?php
 		echo "<meta http-equiv=\"refresh\"content=\"2;URL=patientadmin.php\">";
 		// exit;
 	}
 }


 //initializes variables for patient.php
 $PAT_NAME = "";
 $PAT_PHONE = "";
 $PAT_EMAIL = "";
 $PAT_ADDRESS = "";
 $PAT_ID = 0;
 $update = false;

 //update patient (patient.php)
 if (isset($_POST['update_pat_btn'])) {

   $PAT_NAME = $_POST['PAT_NAME'];
   $PAT_PHONE = $_POST['PAT_PHONE'];
   $PAT_EMAIL = $_POST['PAT_EMAIL'];
   $PAT_ADDRESS = $_POST['PAT_ADDRESS'];
   $PAT_ID = $_POST['PAT_ID'];


 	// $PAT_NAME = mysqli_real_escape_string($_POST['PAT_NAME']);
 	// $PAT_PHONE = mysqli_real_escape_string($_POST['PAT_PHONE']);
 	// $PAT_EMAIL = mysqli_real_escape_string($_POST['PAT_EMAIL']);
 	// $PAT_ADDRESS = mysqli_real_escape_string($_POST['PAT_ADDRESS']);
 	// $PAT_ID = mysqli_real_escape_string($_POST['PAT_ID']);

 	$sql = "UPDATE patient SET PAT_NAME ='$PAT_NAME', PAT_PHONE = '$PAT_PHONE', PAT_EMAIL = '$PAT_EMAIL', PAT_ADDRESS = '$PAT_ADDRESS'
  WHERE PAT_ID =$PAT_ID";
 	$results = mysqli_query($conn, $sql);

 	header("location: patientadmin.php");

 }


 // delete patient(patient.php)
 if (isset($_GET['delpat'])){

  $PAT_ID = $_GET['delpat'];

  $sql = "DELETE FROM patient WHERE PAT_ID = '".$_GET['delpat']."' ";
  $results = mysqli_query($conn,$sql);
  // header('location: patient.php');

  if ($results) {
    // code...
    echo "deleted.";
    header('location: patientadmin.php');
  }else {
    echo "not deleted.";

 }
 }



 ?>
