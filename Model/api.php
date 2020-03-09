<?php
/*
    Description: API containing all functions used by the website
    Author: Aaron Hay
*/

// Retrieve all topics
function getAllTopics(){

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
function displayTopicById($topicId){

  require 'db-connection.php';

  $query = $pdo->prepare
  ("
  SELECT * FROM topic WHERE id = :topicid LIMIT 1
  ");

  $success = $query->execute
  ([
    'topicid' => $topicId
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find topic";
  }
}

// Retrieve quiz data from the quiz table.
function retrieveQuestions($topic){
  // Connect to database
  require_once "db-connection.php";

  $query = $pdo->prepare
  ("
  SELECT * FROM questions WHERE topic = :topic
  ");

  $success = $query->execute
  ([
    'topic' => $topic
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetchAll();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find question";
  }
}

// Retrieve all questions from database
function getAllQuestions(){

  require_once "db-connection.php";

  $sortOrder = 'ORDER BY id desc';
    if (filter_input(INPUT_POST, "ordering", FILTER_SANITIZE_STRING))
    {
        $ordering = filter_input (INPUT_POST, "ordering", FILTER_SANITIZE_STRING);
        if ($ordering == "0")
        {
            $sortOrder = 'ORDER BY id desc';
        }
        elseif ($ordering == "1")
        {
            $sortOrder = 'ORDER BY id asc';
        }
        elseif ($ordering == "2")
        {
            $sortOrder = 'ORDER BY topic asc';
        }
        elseif ($ordering == "3")
        {
            $sortOrder = 'ORDER BY topic desc';
        }
    }

  $query = $pdo->prepare
  ("
    SELECT * FROM questions $sortOrder
  ");

  $success = $query->execute();

  if ($success && $query->rowCount() > 0)
  {
    $row = $query->fetchAll();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find questions";
  }

}

// Retrieve question from database based on ID set by user
function getQuestionById($questionId){

  require 'db-connection.php';

  $query = $pdo->prepare
  ("
  SELECT * FROM questions WHERE id = :questionid LIMIT 1
  ");

  $success = $query->execute
  ([
    'questionid' => $questionId
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find topic";
  }
}

// Remove question from database based on ID set by user
function removeQuestionById($questionId){

  require 'db-connection.php';

  $query = $pdo->prepare
  (
    "DELETE FROM questions WHERE id = :questionid"
  );

  $success = $query->execute
  ([
    'questionid' => $questionId
  ]);

  if($success && $query->rowCount() > 0) {

    header('location: ../View/update-question.php');
    echo "Question Removed";

  } else {

    header('location: ../View/update-question.php?error=FAILED');
    echo "Delete failed!";

  }
}

// Alter question in database based on ID set by user
function updateQuestionById($questionId){
  
  require 'db-connection.php';

  $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
  $answerOne = (filter_input(INPUT_POST, 'answerOne', FILTER_SANITIZE_STRING));
  $answerTwo = (filter_input(INPUT_POST, 'answerTwo', FILTER_SANITIZE_STRING));
  $answerThree = (filter_input(INPUT_POST, 'answerThree', FILTER_SANITIZE_STRING));
  $answerFour = (filter_input(INPUT_POST, 'answerFour', FILTER_SANITIZE_STRING));
  $correctAnswer = (filter_input(INPUT_POST, 'correctAnswer', FILTER_SANITIZE_STRING));
  $topic = (filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING));
  $tip = (filter_input(INPUT_POST, 'tip', FILTER_SANITIZE_STRING));

  $query = $pdo->prepare
  ("
    UPDATE questions
    SET
    description = :description,
    answer_one = :answerOne,
    answer_two = :answerTwo,
    answer_three = :answerThree,
    answer_four = :answerFour,
    correct_answer = :correctAnswer,
    topic = :topic,
    tip = :tip
    WHERE id = ".$questionId."
  ");

  $success = $query->execute
  ([
    'description' => $description,
    'answerOne' => $answerOne,
    'answerTwo' => $answerTwo,
    'answerThree' => $answerThree,
    'answerFour' => $answerFour,
    'correctAnswer' => $correctAnswer,
    'topic' => $topic,
    'tip' => $tip
  ]);

  if($success && $query->rowCount() > 0) {

    $validError = "Success";
    header('location: ../View/update-question.php?error='.$validError);

  } else {

    $invalidError = "Insert Failed";
    header('location: ../View/update-question.php?error='.$invalidError);

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
        $_SESSION['lastName'] = $result['last_name'];
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

    $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $answerOne = (filter_input(INPUT_POST, 'answerOne', FILTER_SANITIZE_STRING));
    $answerTwo = (filter_input(INPUT_POST, 'answerTwo', FILTER_SANITIZE_STRING));
    $answerThree = (filter_input(INPUT_POST, 'answerThree', FILTER_SANITIZE_STRING));
    $answerFour = (filter_input(INPUT_POST, 'answerFour', FILTER_SANITIZE_STRING));
    $correctAnswer = (filter_input(INPUT_POST, 'correctAnswer', FILTER_SANITIZE_STRING));
    $topic = (filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING));
    $tip = (filter_input(INPUT_POST, 'tip', FILTER_SANITIZE_STRING));

    // Error checking variables
    $error = false;
    $descriptionError;
    $answerError;
    $correctAnswerError;
    $topicError;

    $sql = "INSERT INTO questions (description, answer_one, answer_two, answer_three, answer_four, correct_answer, topic, tip)
            VALUES( :description, :answerOne, :answerTwo, :answerThree, :answerFour, :correctAnswer, :topic, :tip)";

    $stmt = $pdo->prepare($sql);

    $success = $stmt->execute
    ([
      'description' => $description,
      'answerOne' => $answerOne,
      'answerTwo' => $answerTwo,
      'answerThree' => $answerThree,
      'answerFour' => $answerFour,
      'correctAnswer' => $correctAnswer,
      'topic' => $topic,
      'tip' => $tip
    ]);

    if ($success){
      echo "Insert Successful";
      header('Location: ../View/question-form.php?error=Success.');
    } else {
      echo "Insert Failed";
      echo $query -> errorInfo()[2];
    }
  }
}

// Insert new topic information into topic table.
function createNewTopic(){

  // Establish connection to database
  require 'db-connection.php';

  // Check button from topic form was pressed
  if (isset($_POST['submit_topic'])) {

    // Set image and file variables for processing
    $image = $_FILES['image_link'];
    $file = $_FILES['file_link'];

    $imageName = $_FILES['image_link']['name'];
    $imageTmpName = $_FILES['image_link']['tmp_name'];
    $imageSize = $_FILES['image_link']['size'];
    $imageError = $_FILES['image_link']['error'];
    $imageType = $_FILES['image_link']['type'];

    $fileName = $_FILES['file_link']['name'];
    $fileTmpName = $_FILES['file_link']['tmp_name'];
    $fileSize = $_FILES['file_link']['size'];
    $fileError = $_FILES['file_link']['error'];
    $fileType = $_FILES['file_link']['type'];

    // Remove file extension and store in a variable
    $imageExt = explode('.', $imageName);
    // Force extension to be lowercase and store in a new variable for error checking
    $imageActualExt = strtolower(end($imageExt));
    // Set a variable with allowed image types
    $allowedImageTypes = array('jpg', 'jpeg', 'png');

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedFileTypes = array('txt', 'html', 'docx');

    // Checks if image is a valid type
    if (in_array($imageActualExt, $allowedImageTypes)) {
        // Checks there are no errors
        if ($imageError === 0) {
            // Checks image size is below stated value
            if ($imageSize < 1000000) {
              // Checks if file is a valid type
              if (in_array($fileActualExt, $allowedFileTypes)) {
                // Checks there are no errors
                if ($fileError === 0) {
                  // Checks image size is below stated value
                  if ($fileSize < 3000000) {

                    // Gives the image a unique id to stop overwriting of files with same name
                    $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                    // Determines image location
                    $imageDestination = '../View/images/' . $imageNameNew;
                    // Determines file location
                    $fileDestination = '../View/docs/' . $fileName;
                    // Sends image to specified location
                    move_uploaded_file($imageTmpName, $imageDestination);
                    // Sends file to specified location
                    move_uploaded_file($fileTmpName, $fileDestination);

                    // Once complete carry out the INSERT statement to database
                    $title = (filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
                    $author = (filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
                    $imageLink = $imageDestination;
                    $fileLink = $fileDestination;
                    $date = date("Y/m/d");

                    // Initialise error variables
                    $error = false;
                    $topicError;
                    $authorError;

                    // Checks variable matches expression conditions
                    if (!preg_match("/^[a-zA-Z0-9]*$/", $topic)) {
                      $error = true;
                      $topicError = ":Topic can only contain letters and numbers.";
                    }

                    // Checks variable matches expression conditions
                    if (!preg_match("/^[a-zA-Z ]*$/",$author)) {
                      $error = true;
                      $authorError = ":Authors name can only contain letters.";
                    }

                    // Set error variable with appropriate errors
                    if ($error == true) {
                      $errorString = $topicError.$authorError;
                      header('Location: ../View/topic-form.php?error='.$errorString);

                    } else { // Once there are no errors process the sql statement

                      $query = $pdo->prepare
                      ("
                      INSERT INTO topic (title, author, image_link, file_link, date)
                      VALUES (:title, :author, :image, :file, :date)
                      ");

                      $success = $query->execute
                      ([
                        'title' => $title,
                        'author' => $author,
                        'image' => $imageLink,
                        'file' => $fileLink,
                        'date' => $date
                      ]);

                      $count = $query->rowCount();
                      if($count > 0){
                        $success = "Insert successful!";
                        header('location: ../View/topic-form.php?success='.$success);
                      } else {
                        $invalidError = "Insert failed";
                        header('location: ../View/topic-form.php?error='.$invalidError);
                      }

                    } // End of sql statement

                  } else {
                      $invalidError = "Your file is too large. Maximum file size is 3MB.";
                      header('location: ../View/topic-form.php?error='.$invalidError);
                  } // End of file size check

                } else {
                    $invalidError = "There was an error uploading your file!";
                    header('location: ../View/topic-form.php?error='.$invalidError);
                } // End of file upload error check

              } else {
                  $invalidError = "You cannot upload files of this type ( .txt .html ) are permitted";
                  header('location: ../View/topic-form.php?error='.$invalidError);
              } // End of file type check

            } else {
                $invalidError = "Your image is too large. Maximum image size is 1MB.";
                header('location: ../View/topic-form.php?error='.$invalidError);
            } // End of image size check

        } else {
            $invalidError = "There was an error uploading your file!";
            header('location: ../View/topic-form.php?error='.$invalidError);
        } // End of image upload error check

    } else {
        $invalidError = "You cannot upload images of this file type ( .jpg .jpeg .png ) are permitted";
        header('location: ../View/topic-form.php?error='.$invalidError);
    } // End of image file type check
  }
}
?>
