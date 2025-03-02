<?php
 // session_start();

//(MySQLi Procedural)
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="clinic";

// Connect database
$conn = mysqli_connect($servername, $username, $password,$dbname);
if($conn)
{
  // echo "database connected successfully";
}
else {
  echo "database not connected ";
}

?>
