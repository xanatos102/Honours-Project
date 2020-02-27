<?php
/*
    Description:
    Author: Aaron Hay
*/
?>

<?php
  include '../Controller/attempt-retrieve-topic.php';
  include 'session.php';

  //Error Reporting for the users
  if(isset($_GET['error'])){

    $error = $_GET['error'];
    echo $error;
  }
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
      echo '<h1 class="display-1">' . $topicArray->title . '</h1>
      <p class="lead"> Author: ' . $topicArray->author . '</p>
      <img src="' . $topicArray->image_link . '">
      <p>' . file_get_contents($topicArray->file_link) . '</p>
      <a href="quiz.php?topic=' . $topicArray->title . '"  class="btn btn-success btn-lg">See more</a>';
     ?>

  </div>
<?php
include "footer.php";
?>

</body>
</html>
