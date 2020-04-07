<?php
/*
    Description: Navigation bar at the top of each page.
    Author: Aaron Hay
*/
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container mt-2">
  <h1 class="display-2" style="color:white;"><span href="index.php" style="align-items: center; display:flex;"><img src="images/shield.png" alt="green shield" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Cyber Awareness Hub</span></h1>
</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="container">

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active pr-2">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active pr-2">
            <a class="nav-link" href="terminology.php">Terminology</a>
        </li>
        <li class="nav-item active pr-2">
            <a class="nav-link" href="big-quiz.php">The Big Cybersecurity Quiz</a>
        </li>
        <li class="nav-item active pr-2">
            <a class="nav-link" href="privacy-policy.php">Privacy Policy</a>
        </li>
        <li class="nav-item active pr-2">
            <a class="nav-link" href="about.php">About</a>
        </li>
        <?php if (isset($_SESSION['username'])){ // Checks that a valid username is set
          echo '<li class="nav-item active pr-2">
                  <a class="nav-link" href="management.php">Admin Management</a>
                </li>';
        } ?>
    </ul>
  </div>

</div>
</nav>
