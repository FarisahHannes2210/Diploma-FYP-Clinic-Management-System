<?php include('connect.php'); ?>
<?php include('headeradmin.php');?>
<html>

   <head>
      <title>Archive Document</title>
      <link rel="stylesheet" href="style.css">
       <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/> -->
      <style>
      body {background-color: #969A97;}
      </style>
   </head>

   <body id="body">
      <h3 id="myHeader">List of documents</h3>
<div class="container">
  <div class="col-md-12 d-flex justify-content-center">
    <div class="col-md-8">
      <div class="col-md-11">

        <?php

              $sql = "SELECT * FROM document";
              $result = mysqli_query($conn,$sql);
         ?>
         <table id = "table" class = "table table-bordered">
           <thead>
             <tr>
               <th>Name</th>
               <th>Type</th>
               <th>Description</th>
               <th>Data</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody><?php
             while ($row = $result->fetch_array()){?>
            <tr>
              <td><?php echo $row["DOCT_NAME"]; ?></td>
              <td><?php echo $row["DOCT_TYPE"]; ?></td>
              <td><?php echo $row["DOCT_DESC"]; ?></td>
              <td><a target="_blank" class = "btn btn-primary" href="<?php echo $row["DOCT_FILE_PATH"]?>">View Document</a></td>
              <td><a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href="admin_func_documents.php?deldoc=<?php echo $row['DOCT_ID'];?>">Delete</a></td>
            </tr>
          <?php } ?>
         </table>
      </div>
    </div>
    <div class="col-md-4">
      <form enctype="multipart/form-data" action="admin_func_documents.php" method="POST">

          <input type="hidden" name="DOCT_ID" value="<?php echo $DOCT_ID; ?>">

        <label for=" ">Document/Patient Name: </label>
        <input type="text" name="DOCT_NAME" class="form-control" required>

        <br>

        <label for=""> Document Type: </label>
        <select name="DOCT_TYPE" class="form-control" required>
          <option value="Medical Record" >Medical Record</option>
          <option value="Medical Certificate">Medical Certificate</option>
          <option value="Medical Insurance">Medical Insurance</option>
          <option value="General Document">General Document</option>
          <option value="Invoice">Invoice</option>
        </select>
        <br>

        <label>Description: </label>
        <textarea name="DOCT_DESC" class="form-control" required></textarea>
        <br>

        <label for="">Insert Document: </label>
        <input type="file" name="DOCT_FILE_PATH" class="form-control" required>
        <br>
        <input type="submit" name="add_doct_btn" class="btn btn-success btn-block form-control" value="Upload Document">

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

 <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

</html>
