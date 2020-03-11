<?php
/*
    Description: Action to get all topics from the database.

    Author: Aaron Hay
 */


include_once '../Model/api.php';

$topics = GetAllTopics();
$topicArray = json_decode($topics);

?>
