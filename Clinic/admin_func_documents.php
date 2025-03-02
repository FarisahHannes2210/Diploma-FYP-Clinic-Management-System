<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



<?php
include ('connect.php');

if (isset($_POST['add_doct_btn'])) {

  $folder = "file/";		//nama folder utk simpan gambar2 yg diupload
  $file = $folder . basename($_FILES["DOCT_FILE_PATH"]["name"]);	//utk sambungkan nama file dgn folder


  $fileType = pathinfo($file, PATHINFO_EXTENSION);

  if($fileType != "docx" && $fileType != "pdf" && $fileType != "doc") {
    echo "<script>alert('Invalid File Type!'); window.history.go(-1);</script>";
    exit();
  }

  //upload the file
  if (!move_uploaded_file($_FILES["DOCT_FILE_PATH"]["tmp_name"], $file)) {
    echo "<script>alert('Upload File Failed!'); window.history.go(-1);</script>";
    exit();
  }

	// echo "<script>alert('File ". htmlspecialchars( basename( $_FILES["DOCT_FILE_PATH"]["name"])). " has been uploaded.');</script>";
	$DOCT_NAME = $_POST['DOCT_NAME'];
	$DOCT_TYPE = $_POST['DOCT_TYPE'];
	$DOCT_DESC = $_POST['DOCT_DESC'];
		// $datecheckout = $_POST['checkdate_out'];
		// $details = $_POST['details'];

  $sql = "INSERT INTO document (DOCT_NAME, DOCT_FILE_PATH, DOCT_TYPE,DOCT_DESC) VALUES ('$DOCT_NAME','$file','$DOCT_TYPE','$DOCT_DESC')";

	// $sql="INSERT INTO `room` (room_type, room_price,room_image,checkin,checkout, details) VALUES('$type', '$price', '$file','$datecheckin','$datecheckout','$details')" or die("error inserting data");
	if(!mysqli_query($conn,$sql)){
		echo "<script>alert('File Upload Failed!'); window.history.go(-1);</script>";
	} else{
	   echo "<script>alert('File Upload Successfully!'); window.location.href='documentsadmin.php';</script>";
  }
// } else {
//   echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
//   echo"<script>window.history.back();</script>";
// }

}

if(isset($_GET['DOCT_ID'])){
  // code...

  $DOCT_ID = $_GET['DOCT_ID'];

  // $id    = $_GET['id'];
  // $sql = "SELECT DOCT_BLOB FROM document WHERE DOCT_ID = '$DOCT_ID'";
  $query = "SELECT * FROM document WHERE DOCT_ID = '$DOCT_ID'";
  // $result = $conn->query($sql);
  $result = mysqli_query($conn,$query) or die('Error, query failed');
  // $row =  fetch_assoc($result);
  // $row =  fetch_array($result);
  $row =  mysqli_fetch_row($result);
  // $row =  mysqli_fetch_array($result);
  // $row =  mysqli_fetch_assoc($result);
  $content = $row['DOCT_BLOB'];
  // var_dump($row['DOCT_BLOB']);
  // header('Content-type: ' . $content . '');
  header('Content-type: application/pdf');
  // header('Content-Disposition: inline; filename ="' . $row["DOCT_BLOB"]. '"');
  header('Content-Disposition: inline; filename="' . $content . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  ob_clean();
  ob_flush ();
  // @readfile($content);

  echo $content;


}

// delete employee(employee.php)
if (isset($_GET['deldoc'])){

	// $EMP_ID = $_GET["delemp"];
	$DOCT_ID = $_GET['deldoc'];
	// $EMP_ID = $_GET['delemp'];


	$sql = "DELETE FROM document WHERE DOCT_ID = $DOCT_ID";
	$results = mysqli_query($conn,$sql);
	// header('location: patient.php');

	if ($results) {
		// code...
		echo "deleted.";
		header('location: documentsadmin.php');
	}else {
		echo "not deleted.";

	}
}

 ?>

</body>
</html>
