<?php
/*
    Description: Action for removing a topic from database

    Author: Aaron Hay
*/
include_once '../Model/api.php';

$topicId = $_GET['id'];
$fileError = "";

removeTopicById($topicId);

?>
