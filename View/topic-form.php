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

<?php echo '<div class="container mt-5">
  <div class="jumbotron">
  <h1 class="text-center mt-4">Add New Topic</h1>

  <form class="form-group needs-validation" action="../Controller/attempt-create-topic.php" method="POST" enctype="multipart/form-data" novalidate>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" placeholder="Title" name="title" />
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" value="'.$firstName . ' ' . $lastName.'" name="author" readonly/>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon01">Headline Image</span>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image_link" aria-describedby="inputGroupFileAddon01" required>
        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
      </div>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon02">Topic Content</span>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile02" name="file_link" aria-describedby="inputGroupFileAddon02" required>
        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
      </div>
    </div>
    <button type="submit" name="submit_topic" class="btn btn-success">Submit</button>
  </form>'; ?>

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
</div>
<!-- </footer> -->
    <?php include 'footer.php'; ?>
<!-- </footer> -->

<!-- javascript -->
<?php
require '../Controller/bootstrap-script.php';
require '../Controller/field-validation.js';
?>

<!-- Script to show file name in Bootstrap file input  -->
<script>
  $('.custom-file input').change(function (e) {
       var files = [];
       for (var i = 0; i < $(this)[0].files.length; i++) {
           files.push($(this)[0].files[i].name);
       }
       $(this).next('.custom-file-label').text(files.join(', '));
   });
</script>
</body>
</html>
