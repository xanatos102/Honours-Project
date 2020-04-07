<?php
/*
    Description: Form used to register new admin credentials.

    Author: Aaron Hay

*/
include 'session.php';
?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
?>
<!-- </head> -->
<title>Registration</title>
<body>
<!-- Container for the Form -->
    <div class="container">

      <div class="page-header">
        <br>
          <h1 class="text-center mt-4">Registration</h1>
          <hr>
      </div>
<!-- Form -->
        <form class="form-group needs-validation" action="../Controller/attempt-registration.php" method="POST" novalidate>
            <div class="form-group">
              <label for="exampleFirstName">First Name (required)</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
              <div class="invalid-feedback">
                You cannot Leave This field Empty.
              </div>
            </div>
            <div class="form-group">
              <label for="exampleLastName">Last Name (required)</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
              <div class="invalid-feedback">
                You cannot Leave This field Empty.
              </div>
            </div>
            <div class="form-group">
              <label for="exampleUsername">Username (required)</label>
              <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required>
              <div class="invalid-feedback">
                You cannot Leave This field Empty.
              </div>
            </div>
            <div class="form-group">
              <label for="examplePassword">Password (required)</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              <div class="invalid-feedback">
                You cannot Leave This field Empty.
              </div>
            </div>
            <div class="form-group">
              <label for="exampleConfirmPassword">Confirm Password (required)</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
              <div class="invalid-feedback">
                You cannot Leave This field Empty.
              </div>
            </div>
            <button type="submit" id="registerAccount" name="registerAccount" class="btn btn-secondary">Register</button>
        </form>
<!-- End Form -->
<?php
//Error Reporting for the users
if(isset($_GET['error']))
{
  $error = $_GET['error'];
  $error = str_replace(":","</br>", $error);
  echo "<h3 style='color:red;'>$error</h3>";
}
?>
    </div>
<!-- End Form Container -->

<!-- </footer> -->
    <?php include 'footer.php'; ?>
<!-- </footer> -->

<!-- javascript -->
<?php
require '../Controller/bootstrap-script.php';
require '../Controller/field-validation.js';
echo "
</body>
</html>
";
?>
