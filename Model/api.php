<?php
/*
    Description: API containing all functions used by the website
    Author: Aaron Hay
*/

// Retrieve all topic data from topic table.
function retrieveAllTopics(){

  require 'db-connection.php';

  $sql = "SELECT * FROM topic";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

// Display topic information by ID
function displayTopicById(){

}

// Retrieve quiz data from the quiz table.
function retrieveQuestions(){
  // Connect to database
  require "db-connection.php";
  // SQL query to retrieve quiz data
  $sql = "SELECT * FROM question";
  // Create statement template
  $stmt = $pdo->prepare($sql);
  // Fetch results from prepared statement
  $result = $stmt->fetch();
  // Execute the prepared statement
  $success = $stmt->execute();
  // If successfully executed
  if($success && $stmt->rowCount() > 0){
    // Assign variable with array type
    $rows = array();
    // Add rows to array until last row is added
    while($r = $stmt->fetch()){
      $rows[] = $r;
    }
    // Convert array into JSON string
    return json_encode($rows);
  }
}

// Insert credentials for new admins.
function registerAccount(){

  require 'db-connection.php';

  if (isset($_POST["registerAccount"]))
  {
    $firstName = (filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
    $lastName = (filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING));
    $username = (filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = (filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $confirmPassword = (filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING));

    // Error checking variables
    $error = false;
    $nameError;
    $usernameError;
    $passwordError;
    $confirmPasswordError;

    if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$lastName)) // First & Surname must be Letters
    {
      $error = true;
      $nameError = ":Your name can only contain letters";
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))// Username must contain letters and numbers
    {
      $error = true;
      $usernameError = ":Username can only contain letters and numbers";
    }

    if(!empty($password) && $password == $confirmPassword) // Passwords must match
    {
      if(strlen($password) < '8') // Passowrd must be at least 8 characters
      {
        $error = true;
        $passwordError = ":Password must be at least 8 characters long";
      }
      elseif(!preg_match("#[0-9]+#",$password)) // Password must contain a number
      {
        $error = true;
        $passwordError = ":Your password must contain at least 1 number";
      }
      elseif(!preg_match("#[A-Z]+#",$password)) // Password must contain an uppercase character
      {
        $error = true;
        $passwordError = ":Your password must contain at least 1 uppercase character";
      }
      elseif(!preg_match("#[a-z]+#",$password))// Password Must Conatain a Lowercase letter
      {
        $error = true;
        $passwordError = ":Your password must contain at least 1 lowercase character";
      }
      else// No password errors have occured
      {
        $PasswordError = ":Password is acceptable";
      }
    }
  }

  if(!empty($password) && $password != $confirmPassword) // Passwords must match
  {
    $error = true;
    $confirmPasswordError = ":Passwords do not match";
  }

  if(empty($password)) // Password is empty
  {
    $error = true;
    $passwordError = ":Please enter a password";
  }

  if($error == true) // An error has occured
  {
    $errorString = $nameError.$usernameError.$passwordError.$confirmPasswordError;
    header('Location: ../View/registration.php?error='.$errorString);
  }
  else // Continue with the registration
  {
    //Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Create SQL Template
    $query = $pdo->prepare
    ("
    INSERT INTO admin (first_name, last_name, username, password)
    VALUES( :firstName, :lastName, :username, :password)
    ");

    $success = $query->execute
    ([
      'firstName' => $firstName,
      'lastName' => $lastName,
      'username' => $username,
      'password' => $password
    ]);

    $count = $query->rowCount();
    if($count > 0)
    {
      echo "Insert Successful";
      header('Location: ../View/registration.php?error=Success.');
    }
    else
    {
      echo "Insert Failed";
      echo $query -> errorInfo()[2];
    }
  }
}

// Allow admins to log in to admin only areas of the website.
function login(){

  require 'db-connection.php';

  if (isset($_POST["adminLogin"]))
  {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM admin WHERE username = :username";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['username' => $username]);

    if($success && $stmt->rowCount() > 0)
    {
      $result = $stmt->fetch();

      if ($result && password_verify($password, $result['password']))
      {
        $_SESSION['loginStatus'] = true;
        $_SESSION['userId'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['firstName'] = $result['first_name'];
        header('location: ../View/management.php');
      }
      else
      {
        // invalid password
        $invalidError = "Invalid Credentials";
        header('location: ../View/login.php?error='.$invalidError);
      }
    }
    else
    {
      // no records found
      $invalidError = "Invalid Credentials";
      header('location: ../View/login.php?error='.$invalidError);
    }
  }
}

// Insert new quiz questions and answers into quiz table.
function createNewQuestion(){

  require 'db-connection.php';

  if (isset($_POST["submit_question"])){

    $question_number = (filter_input(INPUT_POST, 'question_number', FILTER_SANITIZE_NUMBER_INT));
    $question_text = (filter_input(INPUT_POST, 'question_text', FILTER_SANITIZE_STRING));
    $correct_choice = (filter_input(INPUT_POST, 'correct_choice', FILTER_SANITIZE_NUMBER_INT));
    $topic = (filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING));

    // Initialise array
    $choices = array();
    // Pass values into array slots
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];

    // $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    // $answerOne = (filter_input(INPUT_POST, 'answerOne', FILTER_SANITIZE_STRING));
    // $answerTwo = (filter_input(INPUT_POST, 'answerTwo', FILTER_SANITIZE_STRING));
    // $answerThree = (filter_input(INPUT_POST, 'answerThree', FILTER_SANITIZE_STRING));
    // $answerFour = (filter_input(INPUT_POST, 'answerFour', FILTER_SANITIZE_STRING));
    // $correctAnswer = (filter_input(INPUT_POST, 'correctAnswer', FILTER_SANITIZE_STRING));
    // $topic = (filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING));

    // Error checking variables
    // $error = false;
    // $descriptionError;
    // $answerError;
    // $correctAnswerError;
    // $topicError;

    $sql = "INSERT INTO question (question_number, description, topic)
            VALUES( '$question_number', '$question_text', '$topic')";

    $stmt = $pdo->prepare($sql);

    $success = $stmt->execute();

    if ($success){
      foreach ($choices as $choice => $value) {
        if ($value != '') {
          if ($correct_choice == $choice) {
            $is_correct = 1;
          } else {
            $is_correct = 0;
          }

          $sql = "INSERT INTO choice (question_number, is_correct, description)
                  VALUES( '$question_number', '$is_correct', '$value')";

          $stmt = $pdo->prepare($sql);

          $success = $stmt->execute(array());

          // $query = "INSERT INTO choice (question_number, is_correct, description)
					// 		VALUES (:question_number, :is_correct, :$value)";
          //
					// //Run query
					// $insert_row = $pdo->query($query) or die($mysqli->error.__LINE__);

          // $count = $query->rowCount();
          // if($count > 0)
          // {
          //   echo "Insert Successful";
          //   header('Location: ../View/question-form.php?error=Success.');
          // }
          // else
          // {
          //   echo "Insert Failed";
          //   echo $query -> errorInfo()[2];
          // }

        }
      }
      $msg = 'Question has been added';
    }

  }



  // if($error == true) // An error has occured
  // {
  //   $errorString = $descriptionError.$answerError.$correctAnswerError.$topicError;
  //   header('Location: ../View/question-form.php?error='.$errorString);
  // }
  // else // Continue
  // {
    // Create SQL Template
    // $query = $pdo->prepare
    // ("
    // INSERT INTO question (description, answer_one, answer_two, answer_three, answer_four, correct_answer, topic)
    // VALUES( :description, :answerOne, :answerTwo, :answerThree, :answerFour, :correctAnswer, :topic)
    // ");

    // $success = $query->execute
    // ([
    //   'description' => $description,
    //   'answerOne' => $answerOne,
    //   'answerTwo' => $answerTwo,
    //   'answerThree' => $answerThree,
    //   'answerFour' => $answerFour,
    //   'correctAnswer' => $correctAnswer,
    //   'topic' => $topic
    // ]);

    // $success = $query->execute
    // ([
    //   'question_number' => $question_number,
    //   'question_text' => $question_text,
    //   'topic' => $topic
    // ]);

    $sql = "SELECT * FROM question";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $total = $stmt->rowCount();
  	// $total = $question->num_rows;
  	$next = $total+1;
    var_dump($next);
  }


// Insert new topic information into topic table.
function createNewTopic(){

}
?>
