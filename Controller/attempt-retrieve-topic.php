<?php
/*
    Description:
    Author: Aaron Hay
 */
Include '../Model/api.php';

$topicId = $_GET['id'];

$topic = displayTopicById($topicId);
$topicArray = json_decode($topic);

?>
