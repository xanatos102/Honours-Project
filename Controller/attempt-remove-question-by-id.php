<?php
/*
    Description:
    Author: Aaron Hay
 */
include_once '../Model/api.php';

$questionId = $_GET['id'];
$fileError = "";

removeQuestionById($questionId);

?>
