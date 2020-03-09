<?php
/*
    Description:
    Author: Aaron Hay
 */
include '../Model/api.php';

$topicId = $_GET['id'];
$fileError = "";

$topic = displayTopicById($topicId);
$topicArray = json_decode($topic);

?>
