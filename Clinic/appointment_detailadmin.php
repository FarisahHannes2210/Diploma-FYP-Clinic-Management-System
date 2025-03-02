<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Appointment Details</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <?php include('headeradmin.php');
          include('connect.php');
          ?>
  </head>
  <body id="body">
    <script type="text/javascript">

    $(function(){
    $("#copy").on("click", function(){
        $(".options option:selected").each(function(){
           $("#textarea2").append('<option selected>'+$(this).text()+'</option>');
            $('option:selected', "#textarea").remove();
        });
    });
    $("#remove").on("click", function(){
        $(".remove option:selected").each(function(){
           $("#textarea").append('<option>'+$(this).text()+'</option>');
            $('option:selected', "#textarea2").remove();
        });
    });
   });
    </script>

    <div class="container">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-11">
           <center><h3 id="myHeader">Appointment Details</h3></center>

            <?php

            $APP_ID = $_REQUEST['APP_ID'];
              // $APP_ID = $_SESSION['APP_ID'];

            // $query = $conn->query("SELECT * FROM appointment WHERE APP_ID='".$_SESSION['APP_ID']."'") ;
            $query = $conn->query("SELECT * FROM employee NATURAL JOIN appointment NATURAL JOIN patient WHERE APP_ID = '$APP_ID'");


            while($fetch = $query->fetch_assoc()){

             ?>

             <form class="" method="POST" action="admin_func_appointment.php?APP_ID=<?php echo $fetch['APP_ID']?>">

             <input type="hidden" name="APP_ID" value="<?php echo $fetch['APP_ID']; ?>">
             <input type="hidden" name="EMP_ID" value="<?php echo $fetch['EMP_ID']; ?>">
             <input type="hidden" name="PAT_ID" value="<?php echo $fetch['PAT_ID']; ?>">

            <label>Patient Name</label>
            <input type="text" name="PAT_NAME" value="<?php echo $fetch["PAT_NAME"]; ?>" class="form-control" readonly>

            <label>Start Appointment</label>
            <input type="datetime-local" name="START_TIME"  value="<?php echo $fetch["START_TIME"]; ?>" class="form-control" readonly>

              <label>End Appointment</label>
             <input type="datetime-local" name="END_TIME" value="<?php echo $fetch["END_TIME"]; ?>"  class="form-control" required>

             <div class="row">
             <div class="col-md-5">

               <label>List of Medicine</label><br>
               <select  multiple="multiple"  id="textarea"  class="options form-control" >

                 <?php
                 $sql = "SELECT * FROM `med_inventory`";
                 $all_meds = mysqli_query($conn,$sql);

                 while ($fetch = mysqli_fetch_array($all_meds,MYSQLI_ASSOC)):; ?>

                 <option value="<?php echo $fetch["MED_NAME"];?>"><?php echo $fetch["MED_NAME"];?></option>

                 <?php
                 endwhile;
                 // While loop must be terminated
                 ?>
                 </select>

             </div>
             <div class="col-md-2">
               <br>
               <input type="button"  class="btn btn-primary form-control" id="copy"  value="Copy >>"> <br><br>
               <input type="button" class="btn btn-warning form-control" id="remove"  value="<< Remove">
               <!-- <button class="form-control" id="copy">Copy</button>
               <button class="form-control" id="remove">Remove</button> -->
               <!-- <input id="copyBtn" class="form-control" type="button" value="Copy >>" /> <br>
               <input type="button" class="form-control" value="Clear" onclick="javascript:eraseText();"> -->
               <!-- <button  class="form-control" id="test">Copy</button> -->
               <!-- <button type="button" class="form-control"  id="test" name="button">Copy >> </button> -->
               <!-- <input type="button" class="form-control" id="test" value="Copy"> -->

             </div>

             <div class="col-md-5">
               <label>Medicine</label>

               <!-- <select  multiple="multiple"  id="textarea2"  class=" options form-control" ></select> -->

               <!-- <select id="textarea2" multiple class="remove form-control"></select> -->

               <select id="textarea2" multiple class="remove form-control" name="APP_MED[]"></select>
                <!-- <textarea name="APP_MED" id="textarea2" rows="3" class="form-control" readonly ></textarea> -->

               <!-- <textarea name="APP_MED" id="output" rows="3" class="form-control" readonly ></textarea> -->

             </div>
            </div>
             <br>
             <label>Doctor Notes</label>
             <textarea name="APP_DETAIL" class="form-control"  required></textarea>

             <br>
<?php  }  ?>

             <input type="submit" onclick="dateTime()" name="update_app_btn" class="btn btn-success btn-block form-control" value="Update Appointment Detail">

</form>

        </div>
      </div>
    </div>
  </body>


</html>
