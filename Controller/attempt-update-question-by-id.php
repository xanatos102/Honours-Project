<?php
/*
    Description: Action to update questions in database
    Author: Aaron Hay
 */
include_once '../Model/api.php';

$questionId = $_GET['id'];
$fileError = "";

updateQuestionById($questionId);

?>
