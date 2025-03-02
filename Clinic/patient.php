<?php include("connect.php");
      include("func_patient.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

// <!-- //fetch the record to be updated -->
if (isset($_GET['edit'])) {
  $update = true;
  $PAT_ID = $_GET['edit'];

  $sql = "SELECT * FROM patient WHERE PAT_ID = $PAT_ID";
  $rec = mysqli_query($conn,$sql);

  $record = mysqli_fetch_array($rec);

  $PAT_NAME = $record['PAT_NAME'];
  $PAT_PHONE = $record['PAT_PHONE'];
  $PAT_EMAIL = $record['PAT_EMAIL'];
  $PAT_ADDRESS = $record['PAT_ADDRESS'];
  $PAT_ID = $record['PAT_ID'];

}

?>
  <head>
    <?php include("header.php"); ?>
    <meta charset="utf-8">
    <title>Patient</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {background-color: #969A97;}
    </style>
  </head>
  <body id="body">
    <center><h3 id="myHeader">Patient</h3></center>
    <br>
  <?php
    $sql = "SELECT * FROM patient";
    $result = mysqli_query($conn,$sql);
     ?>
    <div class="container">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-8">
              <div class="col-md-11">
          <!-- //table bijj -->
          <table id = "table" class = "table table-bordered">
            <thead>
              <tr>
                <th>Patient Name</th>
                <th>Patient Phone</th>
                <th>Patient Email</th>
                <th>Patient Address</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = $result->fetch_array()){?>
                <tr>
                  <td><?php echo $row["PAT_NAME"]; ?></td>
                  <td><?php echo $row["PAT_PHONE"]; ?></td>
                  <td><?php echo $row["PAT_EMAIL"]; ?></td>
                  <td><?php echo $row["PAT_ADDRESS"];?></td>
                  <td><a class = "btn btn-primary" href="patient.php?edit=<?php echo $row['PAT_ID'];?>" class="update_pat_btn"><i class = "glyphicon glyphicon-remove"></i>Edit</a></td>
                  <td><a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href="func_patient.php?delpat=<?php echo $row['PAT_ID'];?>" ><i class = "glyphicon glyphicon-remove"></i>Delete</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>
        <div class = "col-md-5">

          <!-- //add, update shit -->
          <form class="" action="func_patient.php" method="POST">

            <input type="hidden" name="PAT_ID" value="<?php echo $PAT_ID; ?>">

              <label>Patient Name</label>
              <input type="text" name="PAT_NAME" value="<?php echo $PAT_NAME; ?>" class="form-control" required>


              <label>Patient Phone</label>
              <input type="number" name="PAT_PHONE" value="<?php echo $PAT_PHONE; ?>" class="form-control" required>


              <label>Patient Email</label>
              <input type="email" name="PAT_EMAIL" value="<?php echo $PAT_EMAIL; ?>" class="form-control" required>


              <label>Patient Address</label>
              <textarea name="PAT_ADDRESS" class="form-control" required><?php echo $PAT_ADDRESS; ?></textarea>


            <br>
              <?php if ($update == false){ ?>
                <input type="submit" name="add_pat_btn" class="btn btn-success btn-block" value="Add Patient">
            <?php } else{ ?>
              <input type="submit" name="update_pat_btn" class="btn btn-info btn-block" value="Update Patient">
            <?php } ?>

          </form>

        </div>
      </div>
    </div>

  </body>

  <script type = "text/javascript">
function confirmationDelete(anchor){
var conf = confirm("Are you sure you want to delete this record?");
if(conf){
window.location = anchor.attr("href");
}
}
</script>
</html>
