<?php
   include('connect.php');
?>
<html>

   <head>
      <title>Updated Appointment </title>
      <link rel="stylesheet" href="style.css">
      <style>
      body {

        background-color: #969A97;
      }
      </style>
      <?php include('header.php'); ?>
   </head>
   <body id="body">
     <h3 id="myHeader">Archive Appointment</h3>
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
                   <th>Total Cost</th>
                   <th>Amount Paid</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>  <?php

                       // $sql = "SELECT * FROM appointment,patient, employee
                       // where appointment.pat_id = appointment.pat_id
                       // and appointment.emp_id = employee.emp_id";

                       $sql = "  SELECT * FROM appointment NATURAL JOIN employee NATURAL JOIN patient WHERE AMOUNT_PAID IS NOT NULL";
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
                  <td><?php echo $fetch["TOTAL_COST"];?></td>
                  <td><?php echo $fetch["AMOUNT_PAID"];?></td>
                  <td><a name = 'generate_invoice_btn' class = "btn btn-info"  href="invoice.php?APP_ID=<?php echo $fetch['APP_ID'];?>"><i class = "glyphicon glyphicon-edit"></i>Generate Invoice</a>
                      <a name = 'generate_invoice_btn' class = "btn btn-primary"  href="mc_patient.php?APP_ID=<?php echo $fetch['APP_ID'];?>"><i class = "glyphicon glyphicon-edit"></i>Generate MC</a></td>
                </tr>
              <?php }
             // } ?>
             </table>

          </div>
        </div>
      </div>


   </body>

</html>
