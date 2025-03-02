<?php
 include 'connect.php';

//add med inventory (inventory.php)
if(isset($_POST['add_med_btn'])){

	$MED_NAME =$_POST['MED_NAME'];
	$MED_DESC =$_POST['MED_DESC'];
	$DOSAGE_FORM=$_POST['DOSAGE_FORM'];
	$chk="";

	foreach($DOSAGE_FORM as $chk1)
	   {
	      $chk .= $chk1.",";
	   }

		$sql = "INSERT INTO med_inventory (MED_NAME, MED_DESC, DOSAGE_FORM) VALUES ('$MED_NAME','$MED_DESC','$chk')";
	 	$result = mysqli_query($conn,$sql);

	if($result==1)
	   { ?>

       <script>alert("Medicine added.")</script>
		<?php echo " <meta http-equiv=\"refresh\"content=\"2;URL=inventoryadmin.php\">";
	 // exit;
	   }
	else
	   {  ?>
			 <script>alert("Medicine not added.")</script>
	    <?php echo "<meta http-equiv=\"refresh\"content=\"2;URL=inventoryadmin.php\">";
	 // exit;
	   }
	}   ?>

<?php

//initializes variables for patient.php
$MED_NAME =" ";
$MED_DESC =" ";
$DOSAGE_FORM= " ";
// $DOSAGE_FORM=$_POST['DOSAGE_FORM'];
$chk="";
$MED_ID =0;
$update = false;

//update med inventory
if (isset($_POST['update_med_btn'])) {

	$MED_ID = $_POST['MED_ID'];
	$MED_NAME =$_POST['MED_NAME'];
	$MED_DESC =$_POST['MED_DESC'];
	$DOSAGE_FORM=$_POST['DOSAGE_FORM'];
	$chk="";

	foreach($DOSAGE_FORM as $chk1)
		 {
				$chk .= $chk1.",";
		 }

		 $sql = "UPDATE med_inventory SET MED_NAME = '$MED_NAME', MED_DESC = '$MED_DESC', DOSAGE_FORM = '$chk' WHERE MED_ID = $MED_ID";
		 // echo $sql;exit;
		$result = mysqli_query($conn,$sql);

		header("location: inventoryadmin.php");

}


// delete employee(employee.php)
if (isset($_GET['delmed'])){

	// $EMP_ID = $_GET["delemp"];
	$MED_ID = $_GET['delmed'];
	// $EMP_ID = $_GET['delemp'];


	$sql = "DELETE FROM med_inventory WHERE MED_ID = $MED_ID";
	$results = mysqli_query($conn,$sql);
	// header('location: patient.php');

	if ($results) {
		// code...
		echo "deleted.";
		header('location: inventoryadmin.php');
	}else {
		echo "not deleted.";

	}
}




 ?>
