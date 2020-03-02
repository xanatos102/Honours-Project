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

          if ($question['correct_answer'] == $nextAnswer ) {

            $isCorrect = '<h3 style="color:green; text-align:center;">Correct!</h3>';
            // Add 1 to correct answers counter
            $totalCorrect++;

          } else {
            $isCorrect = '<h3 style="color:red; text-align:center;">Incorrect.</h3>';
          }

          echo
          '<div>
          <h1>Question ' . $questionCounter  . '.</h1>
          <h2>'. $question['description'] . '</h2>
          <input type="radio" name="'. $nextAnswer .'" id="answerOne" value="' . $question['answer_one'] . '" readonly />
          <label class="lead" for="answerOne">' . $question['answer_one'] . '</label>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerTwo" value="' . $question['answer_two'] . '" />
          <label class="lead" for="answerTwo">' . $question['answer_two'] . '</label>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerThree" value="' . $question['answer_three'] . '" />
          <label class="lead" for="answerThree">' . $question['answer_three'] . '</label>
          <br>
          <input type="radio" name="'. $nextAnswer .'" id="answerFour" value="' . $question['answer_four'] . '" />
          <label class="lead" for="answerFour">' . $question['answer_four'] . '</label></br>';
          echo $isCorrect;
          echo '<blockquote class="blockquote" style="text-align:center;">
          <p class="mb-0">' . $question['tip'] . '</p>
          <footer class="blockquote-footer">The professor</cite></footer>
          </blockquote>
          <hr>';
          $questionCounter++;

          $nextAnswer = next($answer);
          echo '</div>
          ';
        }
        //var_dump($quizArray);
        // Check if selected answer matches correct answer stored in the database
        ?>
        <br>

      <?php
      echo '<div id="results">
      <h1 class="display-2" style="align-items: center; display:flex;"><img src="images/trophy.png" alt="trophy" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Results: ' . $totalCorrect . ' / ' . --$questionCounter . '</h1>
      </div>';
       ?>

       <br>
       <p class="lead">Please choose a link to return home, retry the quiz, or have a read through the <?php echo $question['topic']; ?> section again.</p>
       <div class="row">
         <div class="col-sm-4">
           <a href="index.php" class="btn btn-success btn-lg btn-block">Home</a>
         </div>
         <div class="col-sm-4">
           <a href="quiz.php" class="btn btn-success btn-lg btn-block">Retry Quiz</a>
         </div>
         <div class="col-sm-4">
           <?php echo'<a href="topic.php?'. $topic .'&id='. $topicId .'" class="btn btn-success btn-lg btn-block">Read more on ' . $question['topic'] . '</a>';?>
         </div>
       </div>
    </form>
</div>
  <?php include 'footer.php'; ?>
</body>
</html>
