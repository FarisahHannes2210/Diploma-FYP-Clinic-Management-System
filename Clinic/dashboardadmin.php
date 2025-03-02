<?php
   include('connect.php');
?>
<html>

   <head>

      <title>Dashboard </title>
      <link rel="stylesheet" href="style.css">
      <?php include('headeradmin.php'); ?>
      <style>
      body {background-color: #969A97;}
      </style>
   </head>
   <body id="body">

      <h3 id="myHeader">Admin dashboard</h3>
      <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
          <div class="col-md-11">

             <table  id = "table" class = "table table-bordered">
               <thead>
                 <tr>
                   <th>Appointment ID</th>
                   <th>Doctor in charge</th>
                   <th>Patient Name</th>
                   <th>Start Appointment</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>  <?php

                       // $sql = "SELECT * FROM appointment,patient, employee
                       // where appointment.pat_id = appointment.pat_id
                       // and appointment.emp_id = employee.emp_id";

                       $sql = "  SELECT * FROM appointment NATURAL JOIN employee NATURAL JOIN patient WHERE END_TIME is NULL";
                       // $sql = "SELECT app_id, e.emp_name, p.pat_name, start_time
                       //         FROM patient p JOIN appointment a on p.pat_id = a.pat_id
                       //         join employee e on e.emp_id = a.EMP_ID";

                       $result = mysqli_query($conn,$sql);
                       while ($fetch = $result->fetch_array()){

                  ?>
                <tr>

                  <td><?php echo $fetch["APP_ID"];?></td>
                  <td><?php echo $fetch["EMP_FULLNAME"];?></td>
                  <td><?php echo $fetch["PAT_NAME"];?></td>
                  <td><?php echo $fetch["START_TIME"];?></td>
                  <td><center><a name = 'update_app' class = "btn btn-info"  href="appointment_detailadmin.php?APP_ID=<?php echo $fetch['APP_ID'];?>"><i class = "glyphicon glyphicon-edit"></i>Update Appointment</a>
                  <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href="admin_func_appointment.php?delapp=<?php echo $fetch['APP_ID'];?>"><i class = "glyphicon glyphicon-remove"></i>Cancel Appointment</a></center></td>
                </tr>
              <?php }
             // } ?>
             </table>

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
