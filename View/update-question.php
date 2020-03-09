<?php

/*
    Description: User interface used to manage and alter movies listed on the site.

    Author: Brad Mair, David McRae
*/
include 'session.php';

//Error Reporting for the users
if(isset($_GET['error']))
{
  $error = $_GET['error'];
  echo $error;
}

if(!isset($_SESSION['username']))
{
  // Customer has tried to access this page
  header("Location: index.php?error=ACCESS DENIED");
}
else
{
  include '../Controller/attempt-retrieve-all-questions.php';
  include 'header.php';

echo "
<html>
<head>
<title>Update Question</title>
</head>
<body>
<br>

<div class='container'>
<div class='jumbotron'>
  <div class='page-header'>
    <h3>Update Questions</h3>
  </div>";

if (isset($_GET['id']))
{
  $questionIndex = $_GET['id'];
  include '../Controller/attempt-retrieve-question-id.php';
  echo "<a class='btn btn-secondary' href='update-question.php'>Return</a><br><br>";
  echo "<form class='form-group needs-validation' method='POST' action='../Controller/attempt-update-question.php?id=".$questionIndex."' novalidate>";

  echo '<div class="form-group">
    <label for="description">Question Description:</label>
    <textarea class="form-control" id="description" name="description" placeholder="'.$questionArray->description.'" rows="3" required></textarea>
    <div class="invalid-feedback">
      You cannot Leave This field Empty.
    </div>
    </div>
    <div class="form-group">
      <label for="answerOne">Answer #1:</label>
      <input type="text" class="form-control" id="answerOne" name="answerOne" placeholder="'.$questionArray->answer_one.'" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerTwo">Answer #2:</label>
      <input type="text" class="form-control" id="answerTwo" name="answerTwo" placeholder="'.$questionArray->answer_two.'" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerThree">Answer #3:</label>
      <input type="text" class="form-control" id="answerThree" name="answerThree" placeholder="'.$questionArray->answer_three.'">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerFour">Answer #4:</label>
      <input type="text" class="form-control" id="answerFour" name="answerFour" placeholder="'.$questionArray->answer_four.'">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="correctAnswer">Correct Answer:</label>
      <input type="text" class="form-control" id="correctAnswer" name="correctAnswer" placeholder="'.$questionArray->correct_answer.'">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="topic">Topic: (Required)</label>
      <select class="custom-select" name="topic">
        <option selected>'.$questionArray->topic.'</option>';
      for ($i=0; $i < sizeof($topicArray); $i++){
        echo "<option value='".$topicArray[$i]->title."'>".$topicArray[$i]->title."</option>";
      }
      echo '</select>
    </div>
    <div class="form-group">
      <label for="tip">Tip: (Required)</label>
      <textarea class="form-control" id="tip" name="tip" placeholder="'.$questionArray->tip.'" rows="3" required></textarea>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>';
    echo "<button class='form-control' type='submit' name='update'>Update Question</button>
      </div>
      </form>";
}
else
{
  echo "
      <div class='row'>
            <div class='col-md-4'>
                <form method='POST' action='update-question.php'>
                    <select class='form-control' name='ordering' onchange='this.form.submit()'>
                        <option value='placeholder'>Sort By ...</option>
                        <option value='0'>ID (First to Last)</option>
                        <option value='1'>ID (Last to First)</option>
                        <option value='2'>Topic (Ascending)</option>
                        <option value='3'>Topic (Descending)</option>
                    </select>
                    <noscript><input type='submit' value ='Sort By'></noscript>
                </form>
            </div>
        </div>
  ";
  echo "
  <table class='table border border-dark text-center mt-4'>
    <thead class='thead-dark'>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col' class='text-left'>Question Description</th>
          <th scope='col' class='text-left'>Topic</th>
          <th scope='col'>Alter Question</th>
          <th scope='col'>Delete Question</th>
        </tr>
      </thead>";

      for ($i=0 ; $i < sizeof($questionArray) ; $i++)
      {
      //echo "<div class='border border-success'>";
      echo "<tr>";
        echo "<td>".$questionArray[$i]->id."</td>";
        echo "<td class='text-left'>".$questionArray[$i]->description."</td>";
        echo "<td class='text-left'>".$questionArray[$i]->topic."</td>";
        echo "<td><a class='btn btn-success' href='?id=".$questionArray[$i]->id."'>Alter</a></td>";
        echo "<td><a class='btn btn-danger' href='?id=".$questionArray[$i]->id."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
echo "</div></div>";


echo "
</body>
</html>
";
}

?>
