<?php
/*
    Description: Control file to retrieve quiz data from database.
    Author: Aaron Hay
*/

// Path to API with required functions
include_once '../Model/api.php';

// Assign JSON string to variable
$questions = getAllQuestions();
// Decode JSON string and assign to variable
$questionArray = json_decode($questions);
 ?>
