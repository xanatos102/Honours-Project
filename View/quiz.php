<?php
/*
    Description: Quiz to test users knowledge
    Author: Aaron Hay
*/
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'session.php';
    include 'header.php';
    include '../Controller/retrieve-questions.php';

    $questionCounter = 1;

    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">
    <?php echo '<form action="quiz-result.php?topic=' . $topic . '&id=' . $topicId . '" method="post" id="quiz">'; ?>
      <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor2.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Malware Questions</h1>
        <hr>
          <?php foreach ($questionArray as $question){

          echo '<h1>Question ' . $questionCounter  . '.</h1>
                <h2>'. $question['description'] . '</h2>
                <br>
                <input type="radio" name="answer[' . $question['id'] . ']" value="' . $question['answer_one'] . '" required />
                <label for="question-1-answers-A">' . $question['answer_one'] . '</label>
                <br>
                <input type="radio" name="answer[' . $question['id'] . ']" value="' . $question['answer_two'] . '" required />
                <label for="question-1-answers-B">' . $question['answer_two'] . '</label>
                <br>
                <input type="radio" name="answer[' . $question['id'] . ']" value="' . $question['answer_three'] . '" required />
                <label for="question-1-answers-C">' . $question['answer_three'] . '</label>
                <br>
                <input type="radio" name="answer[' . $question['id'] . ']" value="' . $question['answer_four'] . '" required />
                <label for="question-1-answers-D">' . $question['answer_four'] . '</label>
                <hr>';
                $questionCounter++;
          } ?>

      </br>
      <button type="submit" name="submitAnswers" class="btn btn-success btn-lg">Submit Quiz</button>
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
