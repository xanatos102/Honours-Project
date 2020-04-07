<?php
/*
    Description: action to retrieve topics by id
    Author: Aaron Hay
 */
include_once '../Model/api.php';

$topicId = $_GET['id'];
$fileError = "";

$topic = getTopicById($topicId);
$topicArray = json_decode($topic);

?>
