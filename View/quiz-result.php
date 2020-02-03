<?php
/*
    Description: Results page for questions annswered by the user
    Author: Aaron Hay
*/
?>

<?php
// Assign selected answers from previous page to new variables
// $answerOne = $_POST['answerOne'];
// $answerTwo = $_POST['answerTwo'];
// $answerThree = $_POST['answerThree'];
// $answerFour = $_POST['answerFour'];
//
// var_dump($answerOne);
// var_dump($answerTwo);
// var_dump($answerThree);
// var_dump($answerFour);
// $answer2 = $_POST['question-2-answers'];
// $answer3 = $_POST['question-3-answers'];
// $answer4 = $_POST['question-4-answers'];
// $answer5 = $_POST['question-5-answers'];
// Counter for correct answers

$choice = $_POST['choice'];
var_dump($choice);

$questionCounter = 1;
$totalCorrect = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    // Necessary components from other php files
    include 'header.php';
    include '../Controller/retrieve-questions.php';
    ?>
</head>
<title>Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">
    <form action="quiz_result.php" method="post" id="quiz">
      <div>
        <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Answers</h1>
        <hr>
        <?php
        for ($i=0 ; $i < sizeof($quizArray) ; $i++){
          echo
          '<div>
            <h3>Question ' . $questionCounter . '. ' . $quizArray[$i]->description . '</h3>
            <input type="radio" name="answer" id="answerOne" required/>
            <label class="lead" for="answerOne">' . $quizArray[$i]->answer_one . '</label>
            <br>
            <input type="radio" name="answer" id="answerTwo" required/>
            <label class="lead" for="answerTwo">' . $quizArray[$i]->answer_two . '</label>
            <br>
            <input type="radio" name="answer" id="answerThree" required/>
            <label class="lead" for="answerThree">' . $quizArray[$i]->answer_three . '</label>
            <br>
            <input type="radio" name="answer" id="answerFour" required/>
            <label class="lead" for="answerFour">' . $quizArray[$i]->answer_four . '</label>
          </div>
          <br>';
          if ($quizArray[$i]->correct_answer == $choice)
          {
            echo "correct";
            // Add 1 to correct answers counter
            $totalCorrect++;
          } else {
            echo "Wrong";
          }
        }
        //var_dump($quizArray);
        // Check if selected answer matches correct answer stored in the database

          ?>
         <hr>
      </div>
      <br>

      <?php
      echo "<div id='results'>
      <h1 class='display-2' style='align-items: center; display:flex;'><img src='images/trophy.png' alt='trophy' style='width: 1.2em; height: 1.2em; margin-right: 0.25em;'/>Results: " . $totalCorrect . " / 5</h1>
      </div>";
       ?>

       <br>
       <p class="lead">Please choose a link to return home, retry the quiz, or have a read through the Malware section again.</p>
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
