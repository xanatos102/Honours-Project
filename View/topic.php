<?php
/*
    Description:
    Author: Aaron Hay
*/
?>

<?php
  include '../Controller/attempt-retrieve-topic-by-id.php';
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
        <div class="row">
          <div class="col-6">
            <h1 class="display-3">' . $topicArray->title . '</h1>

            <p class="lead"> Author: ' . $topicArray->author . '</p>
            <p class="lead"> Date posted: ' . date('jS F, Y',strtotime($topicArray->date)) . '</p>
          </div>
          <div class="col-6">
            <img class="img-fluid img-thumbnail img-fluid" src="' . $topicArray->image_link . '">
          </div>
        </div>
        <p>' . file_get_contents($topicArray->file_link) . '</p>
        <p>' . $fileError . '</p>
        <h1 style="margin-top: 1em;">Test your knowledge</h1>
        <p class="lead justify">If you would like to test your exisiting knowledge on ' . $topicArray->title . ' or have a go at applying what you have just learned, try our quiz by clicking on the button below.</p>
        <a href="quiz.php?topic=' . $topicArray->title . '&id=' . $topicId . '"  class="btn btn-success btn-lg">Try ' . $topicArray->title . ' Quiz</a>
      </div>';
     ?>

  </div>

<?php
include "footer.php";
?>

</body>
</html>
