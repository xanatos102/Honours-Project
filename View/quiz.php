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
    include '../Model/api.php';
    // $quiz = retrieveQuestions();
    // $quizArray = json_decode($quiz);
    // var_dump($quizArray);
    shell_exec("./../../../../../home/pi/test_app/a.out writepin 18 0");
    shell_exec("./../../../../../home/pi/test_app/a.out writepin 23 0");
    shell_exec("./../../../../../home/pi/test_app/a.out writepin 24 0");
    shell_exec("./../../../../../home/pi/test_app/a.out writepin 25 0");
    shell_exec("./../../../../../home/pi/test_app/a.out writepin 12 0");
    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">

    <form action="quiz-result.php" method="post" id="quiz">

      <div>
        <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor2.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Malware Questions</h1>
        <hr>
        <h3>Q1. Which of these password combinations is the most secure?</h3>
        <br>
        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" required/>
        <label class="lead" for="question-1-answers-A">A) 12345</label>
        <br>
        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" required/>
        <label class="lead" for="question-1-answers-B">B) Password1</label>
        <br>
        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" required/>
        <label class="lead" for="question-1-answers-C">C) S@fePassw0rd123</label>
        <br>
        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" required/>
        <label class="lead" for="question-1-answers-D">D) SafePassword123</label>
      </div>
      <br>
      <hr>
      <div>
        <h3>Q2. Fill in the blank. A _ _ _ _ _ horse is a type of malware.</h3>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" required/>
        <label class="lead" for="question-1-answers-A">A) Roman </label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" required/>
        <label class="lead" for="question-1-answers-B">B) Trojan</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" required/>
        <label class="lead" for="question-1-answers-C">C) Greek</label>
        <br>
        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" required/>
        <label class="lead" for="question-1-answers-D">D) French</label>
      </div>
      <br>
      <hr>
      <div>
        <h3>Q3. Which of these terms is not a definition of Malware?</h3>
        <br>
        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" required/>
        <label class="lead" for="question-1-answers-A">A) Virus</label>
        <br>
        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" required/>
        <label class="lead" for="question-1-answers-B">B) File-less Malware</label>
        <br>
        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" required/>
        <label class="lead" for="question-1-answers-C">C) Worm</label>
        <br>
        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" required/>
        <label class="lead" for="question-1-answers-D">D) Flu</label>
      </div>
      <br>
      <hr>
      <div>
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
        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" required/>
        <label class="lead" for="question-1-answers-A">A) The left image</label>
        <br>
        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" required/>
        <label class="lead" for="question-1-answers-B">B) The right image</label>
      </div>
      <br>
      <hr>
      <div>
        <h3>Q5. Which of these reasons is most important when keeping your device up to date?</h3>
        <br>
        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" required/>
        <label class="lead" for="question-1-answers-A">A) Your device will perform tasks faster</label>
        <br>
        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" required/>
        <label class="lead" for="question-1-answers-B">B) Your device will be immune to viruses</label>
        <br>
        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" required/>
        <label class="lead" for="question-1-answers-C">C) Updates help reduce bugs and issues which could be exploited by hackers</label>
        <br>
        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" required/>
        <label class="lead" for="question-1-answers-D">D) Updates improve internet speeds</label>
      </div>
      <br>

      <button type="submit" name="submit" class="btn btn-success btn-lg">Submit Quiz</button>
    </form>
</div>
  <?php include 'footer.php'; ?>
</body>
</html>
