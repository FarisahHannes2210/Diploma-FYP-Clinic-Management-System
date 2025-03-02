<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>


		<?php
		include ('connect.php');


		//book appointment (book_appointment.php)
		if(isset($_POST['add_app_btn'])){

				$PAT_ID = $_POST['PAT_ID'];
				$EMP_ID = $_POST['EMP_ID'];
				$START_TIME = $_POST['START_TIME'];


				$sql = "INSERT INTO appointment ( EMP_ID,PAT_ID, START_TIME) VALUES ('$EMP_ID','$PAT_ID','$START_TIME')";

				$result = mysqli_query($conn,$sql);

				if ($result) { ?>
				<script>alert("Appointment Booked.")</script>";

					<?php
					header('Location:dashboardadmin.php?success=userCreated');
					// exit;
				}else { ?>

				<script>alert("Appointment not Booked.")</script>
					// header('Location:registration.php?error=userNotCreated');
					// exit; <?php
				}

		}

//update appointment detail
		if(isset($_POST['update_app_btn'])){

			// $PAT_ID = $_POST['PAT_ID'];
			// $EMP_ID = $_POST['EMP_ID'];

			$APP_ID = $_REQUEST['APP_ID'];
			$END_TIME = $_POST['END_TIME'];
			$START_TIME = $_REQUEST['START_TIME'];
			$APP_DETAIL = $_POST['APP_DETAIL'];
			$APP_MED= implode(",",$_POST['APP_MED']);

			$DIFF_TIME = $END_TIME > $START_TIME;

			if ($DIFF_TIME) {
				// code...

			$sql = "UPDATE appointment SET END_TIME = '$END_TIME', APP_MED = '$APP_MED',APP_DETAIL = '$APP_DETAIL' WHERE APP_ID = $APP_ID";

			// echo $sql; exit;

			// $sql = "INSERT INTO appointment ( END_TIME, APP_DETAIL) VALUES ('$END_TIME','$APP_DETAIL') WHEW";

			$result = mysqli_query($conn,$sql);

			if ($result) {

				?>

				<script>alert("Appointment Updated.")</script> <?php
				header('Location:app_updatedadmin.php?success=successfully');
				// exit;
			}else { ?>

			<script>alert("Appointment not updated.")</script>
				// header('Location:registration.php?error=userNotCreated');
				// exit;
				<?php
			}
			}
			else { ?>

				<script  type = "text/javascript">
				function dateTime() {

		alert("DateTime of the end of appointment is not valid.");
		window.location = anchor.attr("<?php  header('Location: ' . $_SERVER['HTTP_REFERER']);  ?>");
		}
		</script>

	<?php      }

		}

		// delete appointment
	  if (isset($_GET['delapp'])){

	   $PAT_ID = $_GET['delapp'];

	   $sql = "DELETE FROM appointment WHERE APP_ID = '".$_GET['delapp']."' ";
	   $results = mysqli_query($conn,$sql);
	   // header('location: patient.php');

	   if ($results) {
	     // code...
	     echo "deleted.";
	     header('location: dashboardadmin.php');
	   }else {
	     echo "not deleted.";

	  }
	  }


		 ?>



	</body>
</html>
