<?php
include('connect.php');


if (isset($_POST["create"])){

  $name = $_POST["name"];
  $address = $_POST['address'];
  $date = $_POST['date'];
  $diagnosis = $_POST['diagnosis'];
  $day = $_POST['day'];
  $emp_fullname = $_POST['emp_fullname'];

?>


<center>
  <h1>Medical Certificate</h1>
  <br>
  <h3>
    <p>Min Clinic</p>
    <p>Jalan Ss21/56b, Damansara Utama,</p>
    <p>47400, Petaling Jaya, Selangor, Malaysia.</p>
  </h3>
</center>

<p>To Whom It May Concern:</p>

<p>     THIS IS TO CERTIFY that <b><?php echo $name ?> </b> of <b><?php echo $address ?> </b>
   was examined and treated at the Min Clinic on <b><?php echo $date ?></b> with the following diagnosis:</p>

<p><?php echo $diagnosis; ?></p>

<?php echo "And would need medical attention for " . $day; ?>
<?php echo " day/s barring completion."; ?>

<br>
<br>
<?php echo "Medical certificate issed by:"; ?> <br>
<?php echo "    ";  echo "Doctor's Name: ". $emp_fullname; ?> <br>
<?php echo "    "; echo "Date: " . $date; ?>

<br><br><br>
<footer><?php echo "Note: This is a computer generated certificate hence no signature required."; ?></footer>


  <script>
  function PrintPage() {
  window.print();
  }
  document.loaded = function(){

  }
  window.addEventListener('DOMContentLoaded', (event) => {
  PrintPage()
  setTimeout(function(){ window.close() },750)
  });
  </script>
  <?php } ?>
