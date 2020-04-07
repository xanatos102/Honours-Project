<?php
/*
    Description: Action for creating a new topic

    Author: Aaron Hay
 */

session_start();

if(!isset($_POST['submit_topic'])){

 header('Location: ../View/index.php?error=ACCESS DENIED');

} else {

 include '../Model/api.php';

 createNewTopic();

}
?>
