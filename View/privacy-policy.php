<?php
/*
    Description: Privacy Policy information for how data is handled by the website.
    Author: Aaron Hay
*/
include 'session.php';
?>
<html>
<!--<head>-->
    <?php
        //include '../Model/DPH-api.php';
        include 'header.php';
    ?>
<!-- </head> -->
<title>Privacy Policy</title>
<body>
  <div class="container text-center" style="margin-top: 2rem;">
    <h1 class="display-4">Cookies and Session Usage</h1>
    <p class="lead">Text here.</p>

    <h1 class="display-4">Your Details</h1>
    <p class="lead">Text here.</p>

    <h1 class="display-4">Email usage</h1>
    <p class="lead">Text here.</p>

    <h1 class="display-4">AGREEMENT</h1>
    <p class="lead">By registering an account with us you are agreeing to the above stated terms.</p>
  </div>


<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrapScript.php'; ?>
    <?php include '../Controller/cookieConsent.php'; ?>
</body>
</html>
