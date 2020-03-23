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

<div class="container mt-5">

  <div class="jumbotron">
    <h1 class="display-2">Welcome</h1>
      <p>The Cyber Awareness Hub is dedicated to providing the latest information on cyber related threats. For more information on potential threats to your security, click one of the links below.</p>

  <?php
    for ($i=0; $i < sizeof($topicArray); $i++){

      if (($counter % $cols) == 1){

        echo '<div class="row">'; // Open row
      }

      // border-secondary // give card border

      echo'<div class="col-sm-4 mt-4">
        <div class="card h-100">
          <a href="topic.php?id=' . $topicArray[$i]->id . '">
          <img src="' . $topicArray[$i]->image_link . '" class="card-img-top"  alt="Image to represent ' . $topicArray[$i]->title . '" style="height:210px">
          </a>
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
</div>

<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->
    <?php include '../Controller/cookie-consent.php'; ?>
</body>
</html>
