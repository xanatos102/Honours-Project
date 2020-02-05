<?php
/*
    Description: Control file which retrieves a count of all rows in the question table
    Author: Aaron Hay
*/

include '../Model/api.php';
// Assign return value from function to global variable
$nextQuestionNo = retrieveTotalQuestions();
 ?>
