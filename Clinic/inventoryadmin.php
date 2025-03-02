<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include("connect.php");
      include("admin_func_med.php");?>

  <?php
// <!-- //fetch the record to be updated -->
if (isset($_GET['mededit'])) {
  $update = true;
  $MED_ID = $_GET['mededit'];

  $sql = "SELECT * FROM med_inventory WHERE MED_ID = $MED_ID";
  $rec = mysqli_query($conn,$sql);

  $record = mysqli_fetch_array($rec);

  $MED_NAME =$record['MED_NAME'];
  $MED_DESC =$record['MED_DESC'];
  $DOSAGE_FORM=$record['DOSAGE_FORM'];
  $MED_ID = $record['MED_ID'];
  // $chk="";
  //
  // foreach($DOSAGE_FORM as $chk1)
  //    {
  //       $chk .= $chk1.",";
  //    }

  if(!empty($DOSAGE_FORM)){
    $array_dosage = explode(",", $DOSAGE_FORM);
  }

}

   ?>
  <head>
    <?php include("headeradmin.php"); ?>
    <meta charset="utf-8">
    <title>Med Inventory</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {background-color: #969A97;}
    </style>
  </head>
  <body id="body">
  <?php
    $sql = "SELECT * FROM med_inventory GROUP BY MED_NAME";
    $result = mysqli_query($conn,$sql);
     ?>
    <div class="container">

      <center><h3 id="myHeader">Med Inventory</h3></center>
      <br>

      <div class="col-md-12 d-flex justify-content-center">

        <div class="col-md-8">
          <div class="col-md-11">
              <!-- //table  -->
            <table id = "table" class = "table table-bordered">
              <thead>
                <tr>
                  <th>Medicine Name</th>
                  <th>Description</th>
                  <th>Dosage Form</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>

              <?php
              while ($row = $result->fetch_array()){?>
                <tr>
                  <td><?php echo $row["MED_NAME"]; ?></td>
                  <td><?php echo $row["MED_DESC"]; ?></td>
                  <td><?php echo $row["DOSAGE_FORM"]; ?></td>
                  <td><a class = "btn btn-primary" href="inventoryadmin.php?mededit=<?php echo $row['MED_ID'];?>"><i class = "glyphicon glyphicon-remove">Edit</a></td>
                  <td><a  class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href="admin_func_med.php?delmed=<?php echo $row['MED_ID'];?>"><i class = "glyphicon glyphicon-remove">Delete</a></td>
                </tr>
              <?php } ?>
            </table>

          </div>
        </div>

        <div class="col-md-4">
          <!-- //add, update shit -->
          <form class="" action="admin_func_med.php" method="POST">

            <input type="hidden" name="MED_ID" value="<?php echo $MED_ID; ?>">

            <label>Medicine Name</label>
            <input type="text" name="MED_NAME" value="<?php echo $MED_NAME; ?>" class="form-control" required>

            <label>Medicine Description</label>
            <textarea name="MED_DESC" class="form-control"><?php echo $MED_DESC; ?></textarea>

            <label>Dosage Form</label><br>
            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="oral" <?php if (!empty($array_dosage) && in_array("oral", $array_dosage)){echo "checked";} ?>>
            <label>Oral</label><br>

            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="injection" <?php if (!empty($array_dosage) && in_array("injection", $array_dosage)){echo "checked";} ?>>
            <label>Injection</label><br>

            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="topical" <?php if (!empty($array_dosage) && in_array("topical", $array_dosage)){echo "checked";} ?>>
            <label>Topical(cream)</label><br>

            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="eye preparation" <?php if (!empty($array_dosage) && in_array("eye preparation", $array_dosage)){echo "checked";} ?>>
            <label>Eye preparation</label><br>

            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="ear preparation" <?php if (!empty($array_dosage) && in_array("ear preparation", $array_dosage)){echo "checked";} ?>>
            <label>Ear preparation</label><br>

            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="inhalation" <?php if (!empty($array_dosage) && in_array("inhalation", $array_dosage)){echo "checked";} ?>>
            <label>Inhalation</label><br>

            <input type="checkbox" name="DOSAGE_FORM[]" onclick="DOSAGE_FORM" value="miscellaneous" <?php if (!empty($array_dosage) && in_array("miscellaneous", $array_dosage)){echo "checked";} ?>>
            <label>Miscellaneous(enema, implant etc)</label><br>

            <br>
            <?php if ($update == false) { ?>
              <input type="submit" name="add_med_btn" class="btn btn-success btn-block" value="Add Medicine">
          <?php  } else{ ?>
                  <input type="submit" name="update_med_btn" class="btn btn-info btn-block" value="Update Medicine">
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
