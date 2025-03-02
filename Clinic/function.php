<!-- //function.php -->
<?php
session_start();
include('connect.php');

//add employee (employee.php)
if (isset($_POST['add_emp_btn'])){
 register();
}

function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $EMP_FULLNAME,  $EMP_USERNAME, $EMP_EMAIL, $EMP_PHONE, $EMP_POS, $EMP_PASSWORD;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	// $errors   = array();

	$EMP_FULLNAME =$_POST['EMP_FULLNAME'];
	$EMP_USERNAME =$_POST['EMP_USERNAME'];
	$EMP_PASSWORD =$_POST['EMP_PASSWORD'];
	$EMP_EMAIL =$_POST['EMP_EMAIL'];
	$EMP_PHONE =$_POST['EMP_PHONE'];
	$EMP_POS = $_POST['EMP_POS'];
	$chk="";

	foreach($EMP_POS as $chk1)
		 {
				$chk .= $chk1;
		 }

	$sql = "INSERT INTO employee (EMP_FULLNAME, EMP_USERNAME, EMP_PASSWORD,EMP_EMAIL, EMP_PHONE, EMP_POS) VALUES ('$EMP_FULLNAME', '$EMP_USERNAME', '$EMP_PASSWORD','$EMP_EMAIL','$EMP_PHONE','$chk')";

	$result = mysqli_query($conn,$sql);

	// header("location: employee.php");

	if ($result) {

		?><script>alert("Employee Created.")</script>'";<?php
		header('Location:employee.php?success=userCreated');
		// exit;
	}else {

		?><script>alert("Employee Not Created.")</script>'";<?php
		// header('Location:registration.php?error=userNotCreated');
		// exit;
	}
}

// escape string
function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}


// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}


function login(){
global $conn, $EMP_USERNAME;

// grap form values
	$EMP_USERNAME = e($_POST['EMP_USERNAME']);
	$EMP_PASSWORD = e($_POST['EMP_PASSWORD']);

	$query = "SELECT * FROM employee WHERE EMP_USERNAME ='$EMP_USERNAME' AND EMP_PASSWORD ='$EMP_PASSWORD' LIMIT 1";
	$results = mysqli_query($conn, $query);

	if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['EMP_POS'] == 'admin') {

				$_SESSION['employee'] = $EMP_USERNAME;
				//$_SESSION['success']  = "You are now logged in";
				header('location: dashboardadmin.php');
			}else{
				$_SESSION['employee'] = $EMP_USERNAME;
				//$_SESSION['success']  = "You are now logged in";


				echo "<meta http-equiv=\"refresh\" content=\" 1;URL=dashboard.php\">";
			}
		}
		// else
		// {
		// 	array_push( "Incorrect username or password");
		// }

}




//update_profile (profile.php)
if (isset($_POST['update_profile_btn'])) {

  $EMP_USERNAME=$_SESSION['employee'];

	// $EMP_ID =$_POST["EMP_ID"];
	$EMP_FULLNAME =$_POST["EMP_FULLNAME"];
	// $EMP_USERNAME =$_POST["EMP_USERNAME"];
	$EMP_PASSWORD =$_POST["EMP_PASSWORD"];
	$EMP_EMAIL =$_POST["EMP_EMAIL"];
	$EMP_PHONE =$_POST["EMP_PHONE"];



  $conn->query("UPDATE employee SET EMP_FULLNAME ='$EMP_FULLNAME', EMP_PASSWORD = '$EMP_PASSWORD', EMP_EMAIL = '$EMP_EMAIL', EMP_PHONE = '$EMP_PHONE' WHERE EMP_USERNAME = '".$_SESSION['employee']."'");

	// $conn->query("UPDATE employee SET EMP_FULLNAME ='$EMP_FULLNAME', EMP_USERNAME = '$EMP_USERNAME', EMP_PASSWORD = '$EMP_PASSWORD', EMP_EMAIL = '$EMP_EMAIL', EMP_PHONE = '$EMP_PHONE' WHERE EMP_ID = '".$_SESSION['employee']."'");
	// $results = mysqli_query($conn, $sql);
  //
	// if ($results) {
  //
	//  echo "<script>alert('UPDATED.')</script>";
     header('Location:profile.php');

		 // <!-- // exit; -->
     	// }
//       else {
//
// echo "<script>alert('User Not UPDATED.')</script>";
// header('Location:profile.php');


}

 ?>
