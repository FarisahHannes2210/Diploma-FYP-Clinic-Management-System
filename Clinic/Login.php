<!-- login.php -->
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Log In</title>
    <style>
    body {background-color: #969A97;}

    </style>
  </head>
  <body id="body">
<div class="container">
  <div class="md-col-12 d-flex justify-content-center">
    <div class="md-col-6">
      <br>
      <h3 id="myHeader">Min CLinic Management</h3>
      <img src="logi.png" alt="min clinic">

      <form class="form-signin" action="function.php" method="POST">

        <label for="inputusername">UserName</label>
        <input type="text" name="EMP_USERNAME" class="form-control" required>

        <label for="inputpassword">Password</label>
        <input type="password" name="EMP_PASSWORD" class="form-control" required>

        <br>
        <input type="submit" name="login_btn" class="btn btn-primary btn-block form-control" value="Log In">

      </form>
    </div>
  </div>
</div>
  </body>
</html>
