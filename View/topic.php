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

  <div class="container" style="margin-top: 2rem;">

    <?php

    if (!file_exists($topicArray->file_link)){
      $fileError = "<p>Content file not found.</p>";
    }
      echo '<h1 class="display-1">' . $topicArray->title . '</h1>
      <p class="lead"> Author: ' . $topicArray->author . '</p>
      <img src="' . $topicArray->image_link . '">
      <p>' . file_get_contents($topicArray->file_link) . '</p>
      <p>' . $fileError . '</p>
      <a href="quiz.php?topic=' . $topicArray->title . '&id=' . $topicId . '"  class="btn btn-success btn-lg">Try Quiz</a>';
     ?>

  </div>

<?php
include "footer.php";
?>

</body>
</html>
