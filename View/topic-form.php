<?php
include 'session.php';
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
?>
<!-- </head> -->
<title>Topic Form</title>
<body>

<div class="container">
  <h1 class="text-center mt-4">Add New Topic</h1>
  <form class="form-group needs-validation" action="../Controller/attempt-create-question.php" method="POST" novalidate>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" value="<?php echo $firstName . ' ' . $lastName; ?>" name="author" readonly/>
    </div>
    <button type="submit" id="submit_topic" name="submit_topic" class="btn btn-secondary">Submit</button>
  </form>

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
<!-- </footer> -->
    <?php include 'footer.php'; ?>
<!-- </footer> -->

<!-- javascript -->
<?php
require '../Controller/bootstrap-script.php';
require '../Controller/field-validation.js';
?>
</body>
</html>
