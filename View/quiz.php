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
// inputs had a value="A" etc
        echo
        '<div>
          <h3>Question ' . $questionCounter . '. ' . $quizArray[$i]->description . '</h3>
          <input type="radio" name="choice" id="answerOne" value="' . $quizArray[$i]->id . '" required/>
          <label class="lead" for="answerOne">' . $quizArray[$i]->answer_one . '</label>
          <br>
          <input type="radio" name="choice" id="answerTwo" value="' . $quizArray[$i]->id . '" required/>
          <label class="lead" for="answerTwo">' . $quizArray[$i]->answer_two . '</label>
          <br>
          <input type="radio" name="choice" id="answerThree" value="' . $quizArray[$i]->id . '" required/>
          <label class="lead" for="answerThree">' . $quizArray[$i]->answer_three . '</label>
          <br>
          <input type="radio" name="choice" id="answerFour" value="' . $quizArray[$i]->id . '" required/>
          <label class="lead" for="answerFour">' . $quizArray[$i]->answer_four . '</label>
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
