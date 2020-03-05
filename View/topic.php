<?php
/*
    Description:
    Author: Aaron Hay
*/
?>

<?php
  include '../Controller/attempt-retrieve-topic.php';
  include 'session.php';
?>

<!DOCTYPE html>
<html>
<!--<head>-->
    <?php
    include 'header.php';
    //phpinfo()
    ?>
<!-- </head> -->
<title>Honours Project - Home</title>
<body>

  <div class="container mt-5">

    <?php

    if (!file_exists($topicArray->file_link)){
      $fileError = "<p>Content file not found.</p>";
    }
      echo '<div class="jumbotron">
      <h1 class="display-1">' . $topicArray->title . '</h1>
      <img class="img-fluid" src="' . $topicArray->image_link . '">
      <p> Author: ' . $topicArray->author . '</p>
      <p> Date posted: ' . date('jS F, Y',strtotime($topicArray->date)) . '</p>
      <p>' . file_get_contents($topicArray->file_link) . '</p>
      <p>' . $fileError . '</p>
      <a href="quiz.php?topic=' . $topicArray->title . '&id=' . $topicId . '"  class="btn btn-success btn-lg">Try Quiz</a>
      </div>';
     ?>

  </div>

<?php
include "footer.php";
?>

</body>
</html>
