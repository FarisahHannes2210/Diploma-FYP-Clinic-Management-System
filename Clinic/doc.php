<?php
include ('connect.php');


  // $DOCT_ID = $_GET['DOCT_ID'];

  // $id    = $_GET['id'];
  $sql = "SELECT * FROM document WHERE DOCT_ID= 19 ";
  // $sql = "SELECT id, firstname, lastname FROM MyGuests";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
      echo "id: " . $row["DOCT_BLOB"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();

 ?>
