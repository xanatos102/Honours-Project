<?php
/*
    Description: Form that allows admins to add new questions to quizes

    Author: Aaron Hay
 */
include 'session.php';

if(!isset($_SESSION['username']))
{
  // Customer has tried to access this page
  header("Location: index.php?error=ACCESS DENIED");
}

?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
    include '../Controller/attempt-retrieve-all-topics.php';
?>
<!-- </head> -->
<title>Question Form</title>
<body>

<div class="container mt-5">
  <div class="jumbotron">
  <h1 class="display-3">New Question Form</h1>
  <form class="form-group needs-validation" action="../Controller/attempt-create-question.php" method="POST" novalidate>
    <div class="form-group">
      <label for="description">Question Description:</label>
      <textarea class="form-control" id="description" name="description" placeholder="Question Description" rows="3" required></textarea>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerOne">Answer #1:</label>
      <input type="text" class="form-control" id="answerOne" name="answerOne" placeholder="Answer One" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerTwo">Answer #2:</label>
      <input type="text" class="form-control" id="answerTwo" name="answerTwo" placeholder="Answer Two" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerThree">Answer #3:</label>
      <input type="text" class="form-control" id="answerThree" name="answerThree" placeholder="Answer Three">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerFour">Answer #4:</label>
      <input type="text" class="form-control" id="answerFour" name="answerFour" placeholder="Answer Four">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="correctAnswer">Correct Answer:</label>
      <input type="text" class="form-control" id="correctAnswer" name="correctAnswer" placeholder="Copy and paste answer here">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="topic">Topic: (Required)</label>
      <select class="custom-select" name="topic">
        <option selected>Choose topic...</option>
      <?php for ($i=0; $i < sizeof($topicArray); $i++){
        echo "<option value='".$topicArray[$i]->title."'>".$topicArray[$i]->title."</option>";
      }?>
      </select>
    </div>
    <div class="form-group">
      <label for="tip">Tip: (Required)</label>
      <textarea class="form-control" id="tip" name="tip" placeholder="Some flavour text like a hint to the correct answer or a fact (e.g. Did you know oranges are orange?)" rows="3" required></textarea>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <button type="submit" id="submit_question" name="submit_question" class="btn btn-success">Submit</button>
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
