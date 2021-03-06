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
    ?>
<!-- </head> -->
<title>Home</title>
<body>

<div class="container mt-5">

  <div class="jumbotron">
    <h1 class="display-3"><span style="align-items: center; display:flex;"><img src="images/house.png" alt="little yellow house" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Welcome</span></h1>
      <p>The Cyber Awareness Hub is dedicated to providing the latest information on cyber related threats. For more information on potential threats to your security, click one of the topic links below:</p>

  <?php
    // Loop through topics
    for ($i=0; $i < sizeof($topicArray); $i++){

      echo '<a href="topic.php?id=' . $topicArray[$i]->id . '" class="custom-card">
      <div class="card mb-3 mt-4">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="' . $topicArray[$i]->image_link . '" class="card-img h-100" alt="...">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h1 class="card-title">' . $topicArray[$i]->title . '</h1>
              <p class="card-text">' . $topicArray[$i]->description . '</p>
              <p class="card-text"><small class="text-muted">Date posted: ' . date('jS F, Y',strtotime($topicArray[$i]->date)) . '</small></p>
            </div>
          </div>

          <div class="col-md-2 align-self-center h-100 pr-5">
            <img src="images/next.png" style="height:25%; width:25%; float:right;">
          </div>

        </div>
      </div>
      </a>';
    }
   ?>

</div>
</div>

<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->
    <?php include '../Controller/cookie-consent.php'; ?>
</body>
</html>
