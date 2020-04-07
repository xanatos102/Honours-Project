<?php
/*
    Description: Action for the removing a question from database

    Author: Aaron Hay
*/
include_once '../Model/api.php';

$questionId = $_GET['id'];
$fileError = "";

removeQuestionById($questionId);

?>
