<?php
/*
    Description:
    Author: Aaron Hay
 */
include_once '../Model/api.php';

$topicId = $_GET['id'];
$fileError = "";

removeTopicById($topicId);

?>
