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
    // $quiz = retrieveQuestions();
    // $quizArray = json_decode($quiz);
    // var_dump($quizArray);

    // Count for question numbers
    $questionCounter = 1;

    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">

    <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor2.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Malware Questions</h1>
    <hr>
    <form action="quiz-result.php" method="post" id="quiz">
      <?php
      for ($i=0 ; $i < sizeof($quizArray) ; $i++){

        echo
        '<div>
          <h3>Question ' . $questionCounter . '. ' . $quizArray[$i]->description . '</h3>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" required/>
          <label class="lead" for="question-1-answers-A">' . $quizArray[$i]->answer_one . '</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" required/>
          <label class="lead" for="question-1-answers-B">' . $quizArray[$i]->answer_two . '</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" required/>
          <label class="lead" for="question-1-answers-C">' . $quizArray[$i]->answer_three . '</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" required/>
          <label class="lead" for="question-1-answers-D">' . $quizArray[$i]->answer_four . '</label>
        </div>
        <br>';
        $questionCounter++;
      }
      ?>
      <button type="submit" name="submitAnswers" class="btn btn-success btn-lg">Submit Answers</button>
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
