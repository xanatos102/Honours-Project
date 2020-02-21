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

    <?php for ($i=0; $i < sizeof($topicArray); $i++){ ?>

      <h1 class="display-1"> <?php echo $topicArray->title ?> </h1>
      <p class="lead"> <?php echo 'Author: ' . $topicArray->author ?> </p>
      <img src="<?php echo $topicArray->image_link ?>">
      <p> <?php echo file_get_contents($topicArray->file_link) ?> </p>

    <?php } ?>

  </div>

</body>
</html>
