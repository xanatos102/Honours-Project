<?php
/*
    Description: Admin page for managing site content.

    Author: Aaron Hay
 */
include 'session.php';

if(!isset($_SESSION['username']))
{
  // Customer has tried to access this page
  header("Location: index.php?error=ACCESS DENIED");
}

include 'header.php';

?>
<title>Content Management</title>
<!DOCTYPE html>
<html>
<body>

<div class="container mt-5">
  <div class="jumbotron">
    <?php echo '<h1 class="display-3">Welcome ' . $_SESSION['firstName'] . '</h1>';?>
    <p class="lead">This is your admin management page. To add a new question or update an existing one, please select an option from the Quiz Management portion of the page. To add a new topic or update an exisiting one, please select an option from the Topic Management portion of the page.</p>
    <hr class="my-4">
    <p>Please select an option below:</p>
    <h2>Quiz Management</h2>
    <div class="row">
      <div class="col-sm-6">
        <a href="question-form.php" class="btn btn-success btn-lg btn-block">Add Question</a>
      </div>
      <div class="col-sm-6">
        <a href="update-question.php" class="btn btn-success btn-lg btn-block">Update Question</a>
      </div>
    </div>
    <br>
    <h2>Topic Management</h2>
    <div class="row">
      <div class="col-sm-6">
        <a href="topic-form.php" class="btn btn-primary btn-lg btn-block">Create New Topic</a>
      </div>
      <div class="col-sm-6">
        <a href="update-topic.php" class="btn btn-primary btn-lg btn-block">Update Topic</a>
      </div>
    </div>
    <a class="btn btn-secondary btn-lg btn-block mt-5" href="../Controller/attempt-logout.php" role="button">Logout</a>
  </div>
</div>

</body>
</html>
