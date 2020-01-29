<?php
/*
    Description: Results page for questions annswered by the user
    Author: Aaron Hay
*/
?>

<?php
// Assign selected answers from previous page to new variables
$answer1 = $_POST['question-1-answers'];
$answer2 = $_POST['question-2-answers'];
$answer3 = $_POST['question-3-answers'];
$answer4 = $_POST['question-4-answers'];
$answer5 = $_POST['question-5-answers'];
// Counter for correct answers
$totalCorrect = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    // Necessary components from other php files
    include 'header.php';
    include '../Controller/retrieveQuestions.php';
    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">
    <form action="quiz_result.php" method="post" id="quiz">
      <div>
        <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Answers</h1>
        <hr>
        <?php
        //var_dump($quizArray);
        // Check if selected answer matches correct answer stored in the database
        if ($answer1 == $quizArray[0]->correct_answer[0])
        {
          echo'<h3>Q1. Which of these password combinations is the most secure?</h3>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
          <label for="question-1-answers-A" class="lead">A) 12345</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
          <label for="question-1-answers-B" class="lead">B) Password1</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" checked="checked"/>
          <label for="question-1-answers-C" class="lead" style="color: #3cd665;">C) S@fePassw0rd123</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
          <label for="question-1-answers-D" class="lead">D) SafePassword123</label>
          <br><br>
          <h3 style="color: #3cd665; text-align:center;">Correct!</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">The safest passwords contain a mix of uppercase and lowercase characters, numbers, and symbols.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
          // Add 1 to correct answers counter
          $totalCorrect++;
          // Set GPIO pin to output
          shell_exec("gpio -g mode 18 out");
          // Turn on GPIO pin
          //shell_exec("gpio -g write 18 1");
          shell_exec("./../../../../../home/pi/test_app/a.out writepin 18 1");

        } else if ($answer1 == $quizArray[0]->answer_one[0])
        {
          echo'<h3>Q1. Which of these password combinations is the most secure?</h3>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" checked="checked"/>
          <label for="question-1-answers-A" class="lead" style="color: #d6443c;">A) 12345</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
          <label for="question-1-answers-B" class="lead">B) Password1</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
          <label for="question-1-answers-C" class="lead" style="color: #3cd665;">C) S@fePassw0rd123</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
          <label for="question-1-answers-D" class="lead">D) SafePassword123</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">The safest passwords contain a mix of uppercase and lowercase characters, numbers, and symbols.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        } else if ($answer1 == $quizArray[0]->answer_two[0])
        {
          echo'<h3>Q1. Which of these password combinations is the most secure?</h3>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
          <label for="question-1-answers-A" class="lead">A) 12345</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" checked="checked"/>
          <label for="question-1-answers-B" class="lead" style="color: #d6443c;">B) Password1</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
          <label for="question-1-answers-C" class="lead" style="color: #3cd665;">C) S@fePassw0rd123</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
          <label for="question-1-answers-D" class="lead">D) SafePassword123</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">The safest passwords contain a mix of uppercase and lowercase characters, numbers, and symbols.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        } else if ($answer1 == $quizArray[0]->answer_four[0])
        {
          echo'<h3>Q1. Which of these password combinations is the most secure?</h3>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
          <label for="question-1-answers-A" class="lead">A) 12345</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
          <label for="question-1-answers-B" class="lead">B) Password1</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
          <label for="question-1-answers-C" class="lead" style="color: #3cd665;">C) S@fePassw0rd123</label>
          <br>
          <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" checked="checked"/>
          <label for="question-1-answers-D" class="lead" style="color: #d6443c;">D) SafePassword123</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">The safest passwords contain a mix of uppercase and lowercase characters, numbers, and symbols.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        }
        ?>
      </div>
      <br>
      <hr>

      <div>
      <?php
      if ($answer2 == $quizArray[1]->correct_answer[0])
      {
        echo '<h3>Q2. Fill in the blank. A _ _ _ _ _ horse is a type of malware.</h3>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
        <label for="question-2-answers-A" class="lead">A) Roman </label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" checked="checked"/>
        <label for="question-2-answers-B" class="lead" style="color: #3cd665;">B) Trojan</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
        <label for="question-2-answers-C" class="lead">C) Greek</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
        <label for="question-2-answers-D" class="lead">D) French</label>
        <br><br>
        <h3 style="color: #3cd665; text-align:center;">Correct!</h3>
        <blockquote class="blockquote text-center">
          <p class="mb-0">Never look a gift horse in the mouth, unless it is a Trojan.</p>
          <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
        </blockquote>';
        $totalCorrect++;
        // Set GPIO pin to output
        shell_exec("gpio -g mode 23 out");
        // Turn on GPIO pin
        shell_exec("./../../../../../home/pi/test_app/a.out writepin 23 1");

      } else if ($answer2 == $quizArray[1]->answer_one[0])
      {
        echo '<h3>Q2. Fill in the blank. A _ _ _ _ _ horse is a type of malware.</h3>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" checked="checked"/>
        <label for="question-2-answers-A" class="lead" style="color: #d6443c;">A) Roman </label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
        <label for="question-2-answers-B" class="lead" style="color: #3cd665;">B) Trojan</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
        <label for="question-2-answers-C" class="lead">C) Greek</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
        <label for="question-2-answers-D" class="lead">D) French</label>
        <br><br>
        <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
        <blockquote class="blockquote text-center">
          <p class="mb-0">Never look a gift horse in the mouth, unless it is a Trojan.</p>
          <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
        </blockquote>';
      } else if ($answer2 == $quizArray[1]->answer_three[0])
      {
        echo '<h3>Q2. Fill in the blank. A _ _ _ _ _ horse is a type of malware.</h3>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
        <label for="question-2-answers-A" class="lead">A) Roman </label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
        <label for="question-2-answers-B" class="lead" style="color: #3cd665;">B) Trojan</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" checked="checked"/>
        <label for="question-2-answers-C" class="lead" style="color: #d6443c;">C) Greek</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
        <label for="question-2-answers-D" class="lead">D) French</label>
        <br><br>
        <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
        <blockquote class="blockquote text-center">
          <p class="mb-0">Never look a gift horse in the mouth, unless it is a Trojan.</p>
          <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
        </blockquote>';
      } else if ($answer2 == $quizArray[1]->answer_four[0])
      {
        echo '<h3>Q2. Fill in the blank. A _ _ _ _ _ horse is a type of malware.</h3>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
        <label for="question-2-answers-A" class="lead">A) Roman </label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
        <label for="question-2-answers-B" class="lead" style="color: #3cd665;">B) Trojan</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
        <label for="question-2-answers-C" class="lead">C) Greek</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" checked="checked"/>
        <label for="question-2-answers-D" class="lead" style="color: #d6443c;">D) French</label>
        <br><br>
        <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
        <blockquote class="blockquote text-center">
          <p class="mb-0">Never look a gift horse in the mouth, unless it is a Trojan.</p>
          <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
        </blockquote>';
      }
      ?>
      </div>
      <br>
      <hr>

      <div>
        <?php
        if ($answer3 == $quizArray[2]->correct_answer[0])
        {
          echo '<h3>Q3. Which of these terms is not a definition of Malware?</h3>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
          <label for="question-3-answers-A" class="lead">A) Virus</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
          <label for="question-3-answers-B" class="lead">B) File-less Malware</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
          <label for="question-3-answers-C" class="lead">C) Worm</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" checked="checked"/>
          <label for="question-3-answers-D" class="lead" style="color: #3cd665;">D) Flu</label>
          <br><br>
          <h3 style="color: #3cd665; text-align:center;">Correct!</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Computers cannot catch a cold!</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
          $totalCorrect++;
          // Set GPIO pin to output
          shell_exec("gpio -g mode 24 out");
          // Turn on GPIO pin
          shell_exec("./../../../../../home/pi/test_app/a.out writepin 24 1");

        } else if ($answer3 == $quizArray[2]->answer_one[0])
        {
          echo '<h3>Q3. Which of these terms is not a definition of Malware?</h3>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" checked="checked"/>
          <label for="question-3-answers-A" class="lead" style="color: #d6443c;">A) Virus</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
          <label for="question-3-answers-B" class="lead">B) File-less Malware</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
          <label for="question-3-answers-C" class="lead">C) Worm</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
          <label for="question-3-answers-D" class="lead" style="color: #3cd665;">D) Flu</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Computers cannot catch a cold!</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        } else if ($answer3 == $quizArray[2]->answer_two[0])
        {
          echo '<h3>Q3. Which of these terms is not a definition of Malware?</h3>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
          <label for="question-3-answers-A" class="lead">A) Virus</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" checked="checked"/>
          <label for="question-3-answers-B" class="lead" style="color: #d6443c;">B) File-less Malware</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
          <label for="question-3-answers-C" class="lead">C) Worm</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
          <label for="question-3-answers-D" class="lead" style="color: #3cd665;">D) Flu</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Computers cannot catch a cold!</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        } else if ($answer3 == $quizArray[2]->answer_three[0])
        {
          echo '<h3>Q3. Which of these terms is not a definition of Malware?</h3>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
          <label for="question-3-answers-A" class="lead">A) Virus</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
          <label for="question-3-answers-B" class="lead">B) File-less Malware</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" checked="checked"/>
          <label for="question-3-answers-C" class="lead" style="color: #d6443c;">C) Worm</label>
          <br>
          <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
          <label for="question-3-answers-D" class="lead" style="color: #3cd665;">D) Flu</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Computers cannot catch a cold!</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        }
         ?>
      </div>
      <br>
      <hr>

      <div>
        <?php
        if ($answer4 == $quizArray[3]->correct_answer[0])
        {
          'checked="checked"';
          echo'<!-- Move A and B under images or specify which is which -->
          <h3>Q4. Which of these images shows an email with a potential virus link?</h3>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <img src="images/paypal.png" class="img-thumbnail" alt="paypal link A">
            </div>
            <div class="col-sm-6">
              <img src="images/paypal_fake.png" class="img-thumbnail" alt="paypal link B">
            </div>
          </div>
            <br>
            <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
            <label for="question-4-answers-A" class="lead">A) The left image</label>
            <br>
            <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" checked="checked"/>
            <label for="question-4-answers-B" class="lead" style="color: #3cd665;">B) The right image</label>
            <br><br>
            <h3 style="color: #3cd665; text-align:center;">Correct!</h3>
            <blockquote class="blockquote text-center">
              <p class="mb-0">Most reputable businesses will go the extra mile and personalise their customer emails. Pay close attention to web address links and always verify the address through Google before clicking on it!</p>
              <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
            </blockquote>';
          $totalCorrect++;
          // Set GPIO pin to output
          shell_exec("gpio -g mode 25 out");
          // Turn on GPIO pin
          shell_exec("./../../../../../home/pi/test_app/a.out writepin 25 1");

        } else if ($answer4 == $quizArray[3]->answer_one[0])
        {
          echo'<!-- Move A and B under images or specify which is which -->
          <h3>Q4. Which of these images shows an email with a potential virus link?</h3>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <img src="images/paypal.png" class="img-thumbnail" alt="paypal link A">
            </div>
            <div class="col-sm-6">
              <img src="images/paypal_fake.png" class="img-thumbnail" alt="paypal link A">
            </div>
          </div>
          <br>
            <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" checked="checked"/>
            <label for="question-4-answers-A" class="lead" style="color: #d6443c;">A) The left image</label>
            <br>
            <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
            <label for="question-4-answers-B" class="lead" style="color: #3cd665;">B) The right image</label>
            <br><br>
            <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
            <blockquote class="blockquote text-center">
              <p class="mb-0">Most reputable businesses will go the extra mile and personalise their customer emails. Pay close attention to web address links and always verify the address through Google before clicking on it!</p>
              <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
            </blockquote>';
        }
        ?>
      </div>
      <br>
      <hr>

      <div>
        <?php
        if ($answer5 == $quizArray[4]->correct_answer[0])
        {
          echo '<h3>Q5. Which of these reasons is most important when keeping your device up to date?</h3>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
          <label for="question-5-answers-A" class="lead">A) Your device will perform tasks faster</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
          <label for="question-5-answers-B" class="lead">B) Your device will be immune to viruses</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" checked="checked"/>
          <label for="question-5-answers-C" class="lead" style="color: #3cd665;">C) Updates help reduce bugs and issues which could be exploited by hackers</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
          <label for="question-5-answers-D" class="lead">D) Updates improve internet speeds</label>
          <br><br>
          <h3 style="color: #3cd665; text-align:center;">Correct!</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Always keep your devices and app software up-to-date, to prevent hackers exploiting gaps in security.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
          $totalCorrect++;
          // Set GPIO pin to output
          shell_exec("gpio -g mode 12 out");
          // Turn on GPIO pin
          shell_exec("./../../../../../home/pi/test_app/a.out writepin 12 1");
        } else if ($answer5 == $quizArray[4]->answer_one[0])
        {
          echo '<h3>Q5. Which of these reasons is most important when keeping your device up to date?</h3>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" checked="checked"/>
          <label for="question-5-answers-A" class="lead" style="color: #d6443c;">A) Your device will perform tasks faster</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
          <label for="question-5-answers-B" class="lead">B) Your device will be immune to viruses</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
          <label for="question-5-answers-C" class="lead" style="color: #3cd665;">C) Updates help reduce bugs and issues which could be exploited by hackers</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
          <label for="question-5-answers-D" class="lead">D) Updates improve internet speeds</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Always keep your devices and app software up-to-date, to prevent hackers exploiting gaps in security.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        } else if ($answer5 == $quizArray[4]->answer_two[0])
        {
          echo '<h3>Q5. Which of these reasons is most important when keeping your device up to date?</h3>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
          <label for="question-5-answers-A" class="lead">A) Your device will perform tasks faster</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" checked="checked"/>
          <label for="question-5-answers-B" class="lead" style="color: #d6443c;">B) Your device will be immune to viruses</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
          <label for="question-5-answers-C" class="lead" style="color: #3cd665;">C) Updates help reduce bugs and issues which could be exploited by hackers</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
          <label for="question-5-answers-D" class="lead">D) Updates improve internet speeds</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Always keep your devices and app software up-to-date, to prevent hackers exploiting gaps in security.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        } else if ($answer5 == $quizArray[4]->answer_four[0])
        {
          echo '<h3>Q5. Which of these reasons is most important when keeping your device up to date?</h3>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
          <label for="question-5-answers-A" class="lead">A) Your device will perform tasks faster</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
          <label for="question-5-answers-B" class="lead">B) Your device will be immune to viruses</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
          <label for="question-5-answers-C" class="lead" style="color: #3cd665;">C) Updates help reduce bugs and issues which could be exploited by hackers</label>
          <br>
          <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" checked="checked"/>
          <label for="question-5-answers-D" class="lead" style="color: #d6443c;">D) Updates improve internet speeds</label>
          <br><br>
          <h3 style="color: #d6443c; text-align:center;">Incorrect.</h3>
          <blockquote class="blockquote text-center">
            <p class="mb-0">Always keep your devices and app software up-to-date, to prevent hackers exploiting gaps in security.</p>
            <footer class="blockquote-footer">The Professor <cite title="CyberSafeSeniors">CyberSafeSeniors</cite></footer>
          </blockquote>';
        }
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
