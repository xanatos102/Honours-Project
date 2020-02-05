<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
    include '../Controller/attempt-retrieve-question-total.php';
?>
<!-- </head> -->
<title>Question Form</title>
<body>

<div class="container">

  <h1 class="text-center mt-4">Add Question</h1>
  <form class="form-group needs-validation" action="../Controller/attempt-create-question.php" method="POST" novalidate>
    <div class="form-group">
      <label for="question_number">Question Number:</label>
      <input type="number" class="form-control" value="<?php echo $nextQuestionNo; ?>" name="question_number" readonly/>
    </div>
    <div class="form-group">
      <label for="question_text">Question Text: (Required)</label>
      <textarea class="form-control" id="question_text" name="question_text" placeholder="Question text" rows="3" required></textarea>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="choice1">Choice #1: (Required)</label>
      <input type="text" class="form-control" id="choice1" name="choice1" placeholder="Choice one" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="choice2">Choice #2: (Required)</label>
      <input type="text" class="form-control" id="choice2" name="choice2" placeholder="Choice two" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="choice3">Choice #3: </label>
      <input type="text" class="form-control" id="choice3" name="choice3" placeholder="Choice three">
    </div>
    <div class="form-group">
      <label for="choice4">Choice #4: </label>
      <input type="text" class="form-control" id="choice4" name="choice4" placeholder="Choice four">
    </div>
    <div class="form-group">
      <label for="correct_choice">Correct Choice Number: (Required)</label>
      <select class="form-control" id="correct_choice" name="correct_choice" required>
        <option selected>Choose...</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <div class="invalid-feedback">
          You cannot Leave This field Empty.
        </div>
      </select>
    </div>
    <div class="form-group">
      <label for="topic">Topic: (Required)</label>
      <input type="text" class="form-control" id="topic" name="topic" placeholder="Topic (e.g. Malware, Phishing.)" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <button type="submit" id="submit_question" name="submit_question" class="btn btn-secondary">Submit</button>
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
