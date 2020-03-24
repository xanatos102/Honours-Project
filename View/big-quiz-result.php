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
    include '../Controller/attempt-retrieve-random-questions.php';
    ?>
</head>
<title>Quiz</title>
<body>
  <div class="container mt-5">
    <div class="jumbotron">
    <h1 class="display-2" style="align-items: center; display:flex;"><img src="images/professor.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Answers</h1>
    <hr class="my-4">

        <?php

        if ($questionCounter = 1){
          $nextAnswer = current($answer);
        }

        foreach ($questionArray as $question) {

          if ($question->correct_answer == $nextAnswer ) {

            $isCorrect = '<h3 style="color:green; text-align:center;">Correct!</h3>';
            // Add 1 to correct answers counter
            $totalCorrect++;

          } else {
            $isCorrect = '<h3 style="color:red; text-align:center;">Incorrect.</h3>';
          }

          echo '<div>
          <h2>Question ' . $questionCounter  . '.</h2>
          <h3>'. $question->description . '</h3>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerOne" value="' . $question->answer_one . '"'; if ($nextAnswer == $question->answer_one) {echo 'checked="checked"';} echo'/>
          <label for="answerOne">' . $question->answer_one . '</label>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerTwo" value="' . $question->answer_two . '"'; if ($nextAnswer == $question->answer_two) {echo 'checked="checked"';} echo'/>
          <label for="answerTwo">' . $question->answer_two . '</label>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerThree" value="' . $question->answer_three . '"'; if ($nextAnswer == $question->answer_three) {echo 'checked="checked"';} echo'/>
          <label for="answerThree">' . $question->answer_three . '</label>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerFour" value="' . $question->answer_four . '"'; if ($nextAnswer == $question->answer_four) {echo 'checked="checked"';} echo'/>
          <label for="answerFour">' . $question->answer_four . '</label></br>';
          echo $isCorrect;
          echo '<blockquote class="blockquote" style="text-align:center;">
          <p class="mb-0">' . $question->tip . '</p>
          <footer class="blockquote-footer">The professor</cite></footer>
          </blockquote>
          <hr class="my-4">';
          $questionCounter++;
          $nextAnswer = next($answer);
          echo '</div>';
        }

        ?>
        <br>

      <?php
      echo '<div id="results">
      <h1 class="display-2" style="align-items: center; display:flex;"><img src="images/trophy.png" alt="trophy" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Results: ' . $totalCorrect . ' / ' . --$questionCounter . '</h1>
      </div>';
       ?>

       <br>
       <p>Please choose a link to return home or retry the quiz.</p>
       <br>
       <div class="row">
         <div class="col-sm-4">
           <a href="index.php" class="btn btn-success btn-lg btn-block">Home</a>
         </div>
         <div class="col-sm-4">
           <?php echo '<a href="big-quiz.php" class="btn btn-success btn-lg btn-block">Retry Quiz</a>';?>
         </div>
       </div>
    </form>
  </div>
</div>
  <?php include 'footer.php'; ?>
</body>
</html>
