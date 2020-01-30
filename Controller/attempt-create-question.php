<?php
/*
    Description: Action for the register employee page

    Author: Aaron Hay
*/
if(!isset($_POST["submitQuestion"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  include '../Model/api.php';

  session_start();

  createNewQuestion();
}
?>
