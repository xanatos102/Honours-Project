<?php
/*
    Description: Action to get all topics from the database.

    Author: Aaron Hay
 */


include '../Model/api.php';

$topics = GetAllTopics();
$topicArray = json_decode($topics);

?>
