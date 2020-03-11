<?php
/*
    Description: User interface used to manage and alter movies listed on the site.

    Author: Aaron Hay
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

if (isset($_GET['id']) && $_GET['option'] == 'alter')
{
  $questionIndex = $_GET['id'];
  include '../Controller/attempt-retrieve-question-by-id.php';
  echo "<a class='btn btn-secondary' href='update-question.php'>Return</a><br><br>";
  echo "<form class='form-group needs-validation' method='POST' action='../Controller/attempt-update-question-by-id.php?id=".$questionIndex."' novalidate>";

  echo '<div class="form-group">
    <label for="description">Question Description:</label>
    <input type="text" class="form-control" id="description" name="description" value="'.$questionArray->description.'">
    <div class="invalid-feedback">
      You cannot Leave This field Empty.
    </div>
    </div>
    <div class="form-group">
      <label for="answerOne">Answer #1:</label>
      <input type="text" class="form-control" id="answerOne" name="answerOne" value="'.$questionArray->answer_one.'" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerTwo">Answer #2:</label>
      <input type="text" class="form-control" id="answerTwo" name="answerTwo" value="'.$questionArray->answer_two.'" required>
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerThree">Answer #3:</label>
      <input type="text" class="form-control" id="answerThree" name="answerThree" value="'.$questionArray->answer_three.'">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="answerFour">Answer #4:</label>
      <input type="text" class="form-control" id="answerFour" name="answerFour" value="'.$questionArray->answer_four.'">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>
    <div class="form-group">
      <label for="correctAnswer">Correct Answer:</label>
      <input type="text" class="form-control" id="correctAnswer" name="correctAnswer" value="'.$questionArray->correct_answer.'">
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
      <input type="text" class="form-control" id="tip" name="tip" value="'.$questionArray->tip.'">
      <div class="invalid-feedback">
        You cannot Leave This field Empty.
      </div>
    </div>';
    echo "<button class='form-control btn btn-success' type='submit' name='update'>Update Question</button>
      </div>
      </form>";

} elseif (isset($_GET['id']) && $_GET['option'] == 'delete') {

  $questionIndex = $_GET['id'];
  include '../Controller/attempt-retrieve-question-by-id.php';

  echo "
  <form class='form-group needs-validation' method='POST' action='../Controller/attempt-remove-question-by-id.php?id=".$questionIndex."' novalidate>
    <h1>Warning!</h1>
    <p>You are about to delete a question in the database, are you sure you wish to continue?</p>
    <a class='btn btn-danger btn-block' href='update-question.php'>No</a>
    <button class='form-control btn btn-success mt-3' type='submit' name='delete'>Yes</button>
  </form>";

} else {

  echo "
  <div class='row'>
    <div class='col-md-4'>
        <form method='POST' action='update-question.php'>
            <select class='form-control' name='ordering' onchange='this.form.submit()'>
                <option value='placeholder'>Sort By ...</option>
                <option value='0'>ID (Last to First)</option>
                <option value='1'>ID (First to Last)</option>
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
        echo "<td><a class='btn btn-success' href='?id=".$questionArray[$i]->id."&option=alter'>Alter</a></td>";
        echo "<td><a class='btn btn-danger' href='?id=".$questionArray[$i]->id."&option=delete'>Delete</a></td>";
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
