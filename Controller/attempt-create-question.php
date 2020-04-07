<?php
/*
    Description: Action for creating a new question

    Author: Aaron Hay
*/
if(!isset($_POST["submit_question"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  include '../Model/api.php';

  session_start();


				if(isset($msg)){
					echo '<p>'.$msg.'</p>';
				}

  createNewQuestion();

}
?>
