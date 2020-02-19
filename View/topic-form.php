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

  <?php
  echo '<form class="form-group needs-validation" action="../Controller/attempt-create-topic.php" method="POST" enctype="multipart/form-data" novalidate>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" placeholder="Title" name="title" />
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" value="'.$firstName . ' ' . $lastName.'" name="author" readonly/>
    </div>
    <div class="form-group input-group" form-group-lg>
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend">Headline Image</span>
      </div>
      <input class="btn btn-outline-light" type="file" name="image_link" required>
    </div>
    
    <button type="submit" name="submit_topic" class="btn btn-secondary">Submit</button>
  </form>';

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
