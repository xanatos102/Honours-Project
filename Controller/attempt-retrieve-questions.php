<?php
/*
    Description: Control file to retrieve quiz data from database.
    Author: Aaron Hay
*/

// Path to API with required functions
include_once '../Model/api.php';

$topic = $_GET['topic'];
$topicId = $_GET['id'];

// Assign JSON string to variable
$questions = retrieveQuestions($topic);
// Decode JSON string and assign to variable
$questionArray = json_decode($questions, true);
 ?>
