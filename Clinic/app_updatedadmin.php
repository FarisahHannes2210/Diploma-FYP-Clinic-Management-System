<?php
   include('connect.php');
?>
<html>

   <head>
      <title>Updated Appointment </title>
      <link rel="stylesheet" href="style.css">
      <style>
      body {

        /* background-image: url("https://c0.wallpaperflare.com/preview/386/354/385/analysis-hospital-doctor-medical.jpg") */
        background-color: #969A97;
      }
      </style>
      <?php include('headeradmin.php'); ?>
   </head>
   <body id="body">
      <h3 id="myHeader">Pay Medical Fee</h3>
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
                   <th>End Appointment</th>
                   <th>Appointment Details</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>  <?php

                       // $sql = "SELECT * FROM appointment,patient, employee
                       // where appointment.pat_id = appointment.pat_id
                       // and appointment.emp_id = employee.emp_id";

                       $sql = "  SELECT * FROM appointment NATURAL JOIN employee NATURAL JOIN patient WHERE APP_DETAIL is NOT NULL AND TOTAL_COST IS NULL ORDER BY END_TIME DESC";
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
                  <td><?php echo $fetch["END_TIME"];?></td>
                  <td><?php echo $fetch["APP_DETAIL"];?></td>
                  <td><center><a name = 'payment_btn' class = "btn btn-warning"  href="paymentadmin.php?APP_ID=<?php echo $fetch['APP_ID'];?>"><i class = "glyphicon glyphicon-edit"></i>Pay Fee</a></center></td>
                </tr>
              <?php }
             // } ?>
             </table>

          </div>
        </div>
      </div>


   </body>

</html>
