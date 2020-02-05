<?php
/*
    Description: Control file to retrieve quiz data from database.
    Author: Aaron Hay
*/

// Path to API with required functions
include '../Model/api.php';
// Assign JSON string to variable
$quiz = retrieveQuestions();
// Decode JSON string and assign to variable
$quizArray = json_decode($quiz);
 ?>
