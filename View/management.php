<?php
include 'session.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
  <?php echo "<p class='mt-4'>Welcome " . $_SESSION['firstName'] . "</p>";?>
  <p>Please select an option below.</p>
  <a href="topic-form.php" class="btn btn-success btn-lg">Create New Topic</a>
</div>

</body>
</html>
