<?php
/*
    Description: Home page to describe website and offer navigation choices
    Author: Aaron Hay
*/
?>

<?php
  include '../Controller/attempt-retrieve-all-topics.php';
  include 'session.php';

  // Initialise grid rows and columns variables
  $rows = 0;
  $cols = 3;
  $counter = 1;
  $nbsp = $cols - ($rows % $cols);

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
    for ($i=0; $i < sizeof($topicArray); $i++){

      if (($counter % $cols) == 1){

        echo '<div class="row">'; // Open row
      }

      echo'<div class="col-sm-4 mt-4">
        <div class="card border-secondary">
          <img src="' . $topicArray[$i]->image_link . '" class="card-img-top" alt="">
          <div class="card-body">
            <h2>' . $topicArray[$i]->title . '</h2>
            <hr>
            <p class="lead">Some text here</p>
            <a href="topic.php?id=' . $topicArray[$i]->id . '" class="btn btn-success btn-lg">See more</a>
          </div>
        </div>
      </div>';

      if (($counter % $cols) == 0){

        echo '</div>';
      }
      $counter++;
    }

    if ($nbsp > 0){

      for ($i = 0; $i < $nbsp; $i++){

        echo '<div class="col-sm-4>&nbsp;</div>"';
      }
    }

    echo '</div></div></div><br>';
   ?>

</div>

<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->
    <?php include '../Controller/cookie-consent.php'; ?>
</body>
</html>
