<?php
/*
    Description: Action to update topics in database
    Author: Aaron Hay
 */
include_once '../Model/api.php';

$topicId = $_GET['id'];
$fileError = "";

updateTopicById($topicId);

?>
