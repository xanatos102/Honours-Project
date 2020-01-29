<?php
/*
    Description: Home page to describe website and offer navigation choices
    Author: Aaron Hay
*/
?>
<html>
<!--<head>-->
    <?php
    include 'session.php';
    include 'header.php';
    //phpinfo()
    ?>
<!-- </head> -->
<title>Cyber Safe Seniors</title>
<body>
<?php
  //Error Reporting for the users
  if(isset($_GET['error']))
  {
    $error = $_GET['error'];
    echo $error;
  }
?>

<div class="container" style="margin-top: 2rem;">
  <div class="jumbotron">
  <h1 class="display-4">Cyber Safe Seniors</h1>
  <p class="lead">Some text here.</p>
  <hr class="my-4">
  <p>Some text here.</p>
</div>
  <!-- <h1 class="display-1">Cyber Safe Seniors</h1> -->
  <!-- <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/cyber_security4.png" alt="elderly couple" style="width: 2em; height: 2em; margin-right: 0.25em;"/>Cyber Safe Seniors</h1> -->
  <p class="lead">Topics</p>

  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <img src="images/virus.jpeg" class="card-img-top" alt="two box robots with glowing eyes">
        <div class="card-body">
          <h2>Malware</h2>
          <hr>
          <p class="lead">Some text here</p>
          <a href="malware-info.php" class="btn btn-success btn-lg">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <img src="images/phishing.jpeg" class="card-img-top" alt="magnifying glass inspecting keyboard">
        <div class="card-body">
          <h2>Phishing</h2>
          <hr>
          <p class="lead">Some text here</p>
          <a href="#" class="btn btn-success btn-lg">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <img src="images/password.jpeg" class="card-img-top" alt="white keyboard">
        <div class="card-body">
          <h2>Password Attacks</h2>
          <hr>
          <p class="lead">Some text here</p>
          <a href="#" class="btn btn-success btn-lg">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</br>
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <img src="images/socialmedia.jpeg" class="card-img-top" alt="hand holding smartphone showing social apps">
        <div class="card-body">
          <h2>Social Media Scams</h2>
          <hr>
          <p class="lead">Some text here</p>
          <a href="#" class="btn btn-success btn-lg">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <img src="images/clickbait.jpg" class="card-img-top" alt="hand clicking a computer mouse">
        <div class="card-body">
          <h2>Clickbait</h2>
          <hr>
          <p class="lead">Some text here</p>
          <a href="#" class="btn btn-success btn-lg">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <img src="images/fraud.jpeg" class="card-img-top" alt="padlock symbol over lines of code">
        <div class="card-body">
          <h2>Fraud</h2>
          <hr>
          <p class="lead">Some text here</p>
          <a href="#" class="btn btn-success btn-lg">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
  <!-- <img src="images/blurtest_final.png" alt="blurry image" class="img-thumbnail"> -->
</div>

<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->
    <?php include '../Controller/cookie-consent.php'; ?>
</body>
</html>
