<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
?>
<!-- </head> -->
<title>Question Form</title>
<body>

<div class="container">

  <h1 class="text-center mt-4">Add Question</h1>
  <form class="form-group needs-validation" action="../Controller/attempt-create-question.php" method="POST" novalidate>
    <div class="form-group">
      <label for="description">Question Description (Required)</label>
      <textarea class="form-control" id="description" name="description" placeholder="Question Description" rows="3" required></textarea>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerOne">Answer One (Required)</label>
      <input type="text" class="form-control" id="answerOne" name="answerOne" placeholder="Answer One" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerTwo">Answer Two (Required)</label>
      <input type="text" class="form-control" id="answerTwo" name="answerTwo" placeholder="Answer Two" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerThree">Answer Three (Optional)</label>
      <input type="text" class="form-control" id="answerThree" name="answerThree" placeholder="Answer Three">
    </div>
    <div class="form-group">
      <label for="answerFour">Answer Four (Optional)</label>
      <input type="text" class="form-control" id="answerFour" name="answerFour" placeholder="Answer Four">
    </div>
    <div class="form-group">
      <label for="correctAnswer">Correct Answer (Required)</label>
      <select class="form-control" id="correctAnswer" name="correctAnswer" required>
        <option selected>Choose...</option>
        <option>Answer One</option>
        <option>Answer Two</option>
        <option>Answer Three</option>
        <option>Answer Four</option>
        <div class="invalid-feedback">
          You cannot Leave This field Empty.
        </div>
      </select>
    </div>
    <div class="form-group">
      <label for="topic">Topic (Required)</label>
      <input type="text" class="form-control" id="topic" name="topic" placeholder="Topic (e.g. Malware, Phishing.)" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <button type="submit" id="submitQuestion" name="submitQuestion" class="btn btn-secondary">Submit</button>
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
