<?php
/*
    Description: Action for the customer login page.

    Author: Aaron Hay
 */
session_start();

if(!isset($_POST["adminLogin"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
 include '../Model/api.php';

 login();
}
?>
