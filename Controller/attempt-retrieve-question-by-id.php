<?php
/*
    Description: Action to retrieve questions from data base by ID
    Author: Aaron Hay
 */
include_once '../Model/api.php';

$questionId = $_GET['id'];
$fileError = "";

$question = getQuestionById($questionId);
$questionArray = json_decode($question);

?>
