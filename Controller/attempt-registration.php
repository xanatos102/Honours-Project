<?php
/*
    Description: Action for the registering admins

    Author: Aaron Hay
*/
if(!isset($_POST["registerAccount"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  include '../Model/api.php';

  session_start();

  registerAccount();
}
?>
