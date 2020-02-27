<?php
/*
    Description: Results page for questions annswered by the user
    Author: Aaron Hay
*/
?>

<?php
// Assign selected answers from previous page to new variables

$answer = $_POST['answer'];
$nextAnswer = $answer;
// $answerOne = $answer[0];
// $answerTwo = $answer[1];
// $answerThree = $answer[2];
// $answerFour = $answer[3];
//
//var_dump($answer);

// $answer2 = $_POST['question-2-answers'];
// $answer3 = $_POST['question-3-answers'];
// $answer4 = $_POST['question-4-answers'];
// $answer5 = $_POST['question-5-answers'];
// Counter for correct answers

// $choice = $_POST['choice'];
// var_dump($choice);

$questionCounter = 1;
$totalCorrect = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    // Necessary components from other php files
    include 'session.php';
    include 'header.php';
    include '../Controller/retrieve-questions.php';
    ?>
</head>
<title>Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">
    <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Answers</h1>
    <hr>
        <?php
        if ($questionCounter = 1){
          $nextAnswer = current($answer);
        }
        foreach ($questionArray as $question) {
          echo
          '<div>
            <h3>Question ' . $questionCounter . '. ' . $question['description'] . '</h3>
            <input type="checkbox" name="'. $nextAnswer .'" id="answerOne" value="' . $question['answer_one'] . '" readonly />
            <label class="lead" for="answerOne">' . $question['answer_one'] . '</label>
            <br>
            <input type="checkbox" name="'. $nextAnswer .'" id="answerTwo" value="' . $question['answer_two'] . '" />
            <label class="lead" for="answerTwo">' . $question['answer_two'] . '</label>
            <br>
            <input type="checkbox" name="'. $nextAnswer .'" id="answerThree" value="' . $question['answer_three'] . '" />
            <label class="lead" for="answerThree">' . $question['answer_three'] . '</label>
            <br>
            <input type="checkbox" name="'. $nextAnswer .'" id="answerFour" value="' . $question['answer_four'] . '" />
            <label class="lead" for="answerFour">' . $question['answer_four'] . '</label></br>';

            //var_dump($nextAnswer);
            $questionCounter++;
            if ($question['correct_answer'] == $nextAnswer ) {

              echo '<p style="color:green">Correct!</p>';
              // Add 1 to correct answers counter
              $totalCorrect++;

            } else {
              echo "Wrong";
              //var_dump($nextAnswer);
            }

          $nextAnswer = next($answer);
          echo '</div>
          <br>';


        }
        //var_dump($quizArray);
        // Check if selected answer matches correct answer stored in the database
        ?>
        <hr>
        <br>

      <?php
      echo '<div id="results">
      <h1 class="display-2" style="align-items: center; display:flex;"><img src="images/trophy.png" alt="trophy" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Results: ' . $totalCorrect . ' / ' . --$questionCounter . '</h1>
      </div>';
       ?>

       <br>
       <p class="lead">Please choose a link to return home, retry the quiz, or have a read through the section again.</p>
       <div class="row">
         <div class="col-sm-4">
           <a href="index.php" class="btn btn-success btn-lg btn-block">Home</a>
         </div>
         <div class="col-sm-4">
           <a href="quiz.php" class="btn btn-success btn-lg btn-block">Retry Quiz</a>
         </div>
         <div class="col-sm-4">
           <a href="malwareInfo.php" class="btn btn-success btn-lg btn-block">Read more on Malware</a>
         </div>
       </div>
    </form>
</div>
  <?php include 'footer.php'; ?>
</body>
</html>
