<!-- employee.php -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include("connect.php"); ?>
  <head>
    <?php include("headeradmin.php"); ?>
    <meta charset="utf-8">
    <title>Employee</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {background-color: #969A97;}
    </style>
  </head>
  <body id="body">
  <?php
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn,$sql);
     ?>
    <div class="container">
      <center><h3 id="myHeader">Employee Details</h3></center>
      <br>

      <div class="col-md-12 d-flex justify-content-center">

        <div class="col-md-8">
          <div class="col-md-11">

          <!-- //table bijj -->
          <table id = "table" class = "table table-bordered">
            <thead>
              <tr>
                <th>Employee FullName</th>
                <th>Employee UserName</th>
                <th>Employee Phone</th>
                <th>Patient Email</th>
                <th>Employee Position</th>
                <th colspan="1">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = $result->fetch_array()){?>
                <tr>
                  <td><?php echo $row["EMP_FULLNAME"]; ?></td>
                  <td><?php echo $row["EMP_USERNAME"]; ?></td>
                  <td><?php echo $row["EMP_EMAIL"];?></td>
                  <td><?php echo $row["EMP_PHONE"];?></td>
                  <td><?php echo $row["EMP_POS"];?></td>
                  <td><a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;"
                    href = "func_employee.php?EMP_ID=<?php echo $row['EMP_ID']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
          </div>
        </div>
        <div class = "col-md-4">
          <!-- //add, update shit -->
          <form class="" action="functionadmin.php" method="POST">

            <input type="hidden" name="EMP_ID" value="<?php echo $EMP_ID; ?>">


            <label>Employee FullName</label>
            <input type="text" name="EMP_FULLNAME" class="form-control" required>

            <label>Employee UserName</label>
            <input type="text" name="EMP_USERNAME" class="form-control" required>

            <label>Employee Password</label>
            <input type="text" name="EMP_PASSWORD" class="form-control" required>

            <label>Patient Email</label>
            <input type="email" name="EMP_EMAIL" class="form-control" required>

            <label>Employee Phone</label>
            <input type="number" name="EMP_PHONE" class="form-control" required>

            <label for="">Staff Position</label><br>

            <input type="checkbox" name="EMP_POS[]" onclick="EMP_POS" value="doctor">
            <label for="inputdoctor">Doctor</label><br>

            <input type="checkbox" name="EMP_POS[]" onclick="EMP_POS" value="admin">
            <label for="inputadmin">Admin</label><br>

            <input type="checkbox" name="EMP_POS[]" onclick="EMP_POS" value="pharmacy">
            <label for="inputpharmacy">Pharmacy</label><br>

            <input type="checkbox" name="EMP_POS[]" onclick="EMP_POS" value="staff">
            <label for="inputstaff">Staff</label><br>

            <br>
            <input type="submit" name="add_emp_btn" class="btn btn-info btn-block" value="Add Employee">

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

<script type = "text/javascript">
$(document).ready(function(){
$("#table").DataTable();
});
</script>
</html>
