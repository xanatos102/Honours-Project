<?php
/*
    Description: Admin login

    Author: Aaron Hay
 */
?>
<html>
<head>
    <?php
      include 'session.php';
      include 'header.php';
    ?>
<title>Admin Login</title>
</head>
<body>

<div class="container mt-5">
<div class="jumbotron">
  <h1 class="display-3" style="color:black;"><span style="align-items: center; display:flex;"><img src="images/login.png" alt="lock" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Admin Login</span></h1>

  <?php
  //Error Reporting for the users
  if(isset($_GET['error']))
  {
    $error = $_GET['error'];
    echo $error;
  }
  ?>

    <form class="form-group needs-validation" action="../Controller/attempt-login.php" method="POST" novalidate>
      <div class="form-group">
        <label for="exampleUsername">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        <div class="invalid-feedback">
          You cannot Leave This field Empty.
        </div>
      </div>
      <div class="form-group">
        <label for="examplePassword">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <div class="invalid-feedback">
          You cannot Leave This field Empty.
        </div>
      </div>
      <button type="submit" id="adminlogin" name="adminLogin" class="btn btn-success">Log In</button>
    </form>
</div>
</div>
<!-- <footer> -->
      <?php include 'footer.php'; ?>
<!-- </footer> -->
</div><!-- end of container-->
<?php
require '../Controller/field-validation.js';
include '../Controller/cookie-consent.php';
?>
</body>
</html>
