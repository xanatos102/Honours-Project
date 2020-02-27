<?php
/*
    Description: Control file to retrieve quiz data from database.
    Author: Aaron Hay
*/

// Path to API with required functions
include_once '../Model/api.php';

$number = $_POST['id'];

// Assign JSON string to variable
$choices = retrieveQuestions($number);
// Decode JSON string and assign to variable
$choiceArray = json_decode($choices);
 ?>
