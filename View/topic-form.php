<?php
include 'session.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">

  <h1 class="text-center mt-4">Create Topic</h1>
  <form class="form-group needs-validation" action="../Controller/attempt-create-topic.php" method="POST" novalidate>
    <div class="form-group">
      <label for="exampleDescription">Topic Description (Required)</label>
      <textarea class="form-control" id="description" name="description" placeholder="Topic Description" rows="3" required></textarea>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="exampleAnswerOne">Answer One (Required)</label>
      <input type="text" class="form-control" id="answerOne" name="answerOne" placeholder="Answer One" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="exampleAnswerTwo">Answer Two (Required)</label>
      <input type="text" class="form-control" id="answerTwo" name="answerTwo" placeholder="Answer Two" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="exampleAnswerThree">Answer Three (Optional)</label>
      <input type="text" class="form-control" id="answerThree" name="answerThree" placeholder="Answer Three">
    </div>
    <div class="form-group">
      <label for="exampleAnswerFour">Answer Four (Optional)</label>
      <input type="text" class="form-control" id="answerFour" name="answerFour" placeholder="Answer Four">
    </div>
    <div class="form-group">
      <label for="exampleCorrectAnswer">Correct Answer (Required)</label>
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
      <label for="exampleCategory">Category (Required)</label>
      <input type="text" class="form-control" id="category" name="category" placeholder="Category (e.g. Malware, Phishing.)" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <button type="submit" id="createTopic" name="createTopic" class="btn btn-secondary">Submit</button>
  </form>

</div>

</body>
</html>
