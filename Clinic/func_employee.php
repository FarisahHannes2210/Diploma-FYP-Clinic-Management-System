<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

<?php
// session_start();
include ('functionadmin.php');

	$EMP_ID = $_REQUEST['EMP_ID'];


	$sqldoc = " SELECT * FROM appointment WHERE EMP_ID = '$EMP_ID' AND START_TIME is NOT NULL AND END_TIME is NULL";
	$DOCTOR = mysqli_query($conn,$sqldoc);

	  while ($row = $DOCTOR->fetch_array()){


				if ($EMP_ID === $row['EMP_ID']) { ?>

					<script>alert("This employee have an appointment with a patient.")</script>'";


				 <?php
			 		header('Location: ' . $_SERVER['HTTP_REFERER']);

				}
				else { ?> <?php

					$sql = "DELETE FROM employee WHERE EMP_ID = '$EMP_ID'";
					$results = mysqli_query($conn,$sql);
					// header('location: patient.php');

					if($conn->query($sql)){

					// echo "<script>alert('Are you sure want to remove this booking?')</script>";
					echo "<meta http-equiv=\"refresh\"content=\"1;URL=employee.php\">";
					}
					else{
					echo"<script>alert('Error deleting item:".$conn->error;"')</script>";
					}

			}

		}


	  ?>





 	</body>
 </html>
