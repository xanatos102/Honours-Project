<?php
/*
    Description: API containing all functions used by the website
    Author: Aaron Hay
*/

// Pull all quiz data from the quiz table
function retrieveQuestions(){
  // Connect to pi_quiz_db
  require "db-connection.php";
  // SQL query to retrieve quiz data
  $sql = "SELECT * FROM QuizData";
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

//Insert new Employee to database
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

function createNewQuestion(){

  require 'db-connection.php';

  if (isset($_POST["submitQuestion"]))
  {
    $questionDescription = (filter_input(INPUT_POST, 'questionDescription', FILTER_SANITIZE_STRING));
    $answerOne = (filter_input(INPUT_POST, 'answerOne', FILTER_SANITIZE_STRING));
    $answerTwo = (filter_input(INPUT_POST, 'answerTwo', FILTER_SANITIZE_STRING));
    $answerThree = (filter_input(INPUT_POST, 'answerThree', FILTER_SANITIZE_STRING));
    $answerFour = (filter_input(INPUT_POST, 'answerFour', FILTER_SANITIZE_STRING));
    $correctAnswer = (filter_input(INPUT_POST, 'correctAnswer', FILTER_SANITIZE_STRING));
    $topic = (filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING));

    // Error checking variables
    $error = false;
    $descriptionError;
    $answerError;
    $correctAnswerError;
    $topicError;

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
  else // Continue
  {
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
?>
