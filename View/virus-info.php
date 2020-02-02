<?php
/*
    Description: Home page to describe website and offer navigation choices
    Author: Aaron Hay
*/
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'session.php';
    include 'header.php';
    ?>
</head>
<title>Cyber Safe Seniors</title>
<body>
  <div class="container" style="margin-top: 2em;">

    <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/virus.png" alt="green virus blob" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Malware</h1>
    <h1>What is computer malware?</h1>
    <p>Computer malware, often referred to as a computer virus, is a broad term used to describe harmful computer software that seeks to harm the computer it is loaded onto.</p>
    <h1>Common types of computer malware</h1>

    <div class="row" style="margin-top: 2em;">
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Virus</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Worm</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Trojan</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Adware</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 2em;">
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Ransomware</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Spyware</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">File-less malware</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-secondary btn-lg collapsible">Hybrid malware</button>
        <div class="content">
         <p>Lorem ipsum...</p>
        </div>
      </div>
    </div>

    <h1 style="margin-top: 1em;">How to protect yourself?</h1>
    <p>Text here.</p>
  </div>
  <script>
  <?php include "../Controller/collapse-button.js";?>
  </script>
  <?php include 'footer.php'; ?>
</body>
</html>
