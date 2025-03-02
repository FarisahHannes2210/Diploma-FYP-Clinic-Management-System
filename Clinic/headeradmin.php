<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <style>
  #myHeader {
  background-color: #DCC7BE;
  color: black;
  padding:10px;
  text-align: center;
  }

#MenuItems{
  font-size: 5px;
}


  </style>
<center>
  <nav>
  <ul id='MenuItems' >
    <li><a href="dashboardadmin.php">Dashboard</a></li>
    <li><a href="patientadmin.php">Patient</a></li>
    <li><a href="book_appointmentadmin.php">Book Appointment</a></li>
    <li><a href="app_updatedadmin.php">Pay Appointment Fee</a></li>
    <li><a href="archive_appointmentadmin.php">Archive Appointment</a></li>
    <li><a href="inventoryadmin.php">Med Inventory</a></li>
    <li><a href="documentsadmin.php">Documents</a></li>
    <li><a href="medcertadmin.php">Generate MC</a></li>
    <li><a href="employee.php">Employee</a></li>
    <li><a href="profileadmin.php">Profile</a></li>
    <li><a href="logout.php?logout='1'" onclick="return confirm('Are you sure you want to log out?');">Log Out</a></li>
    </ul>
    </nav>
  </center>
  </body>
</html>
