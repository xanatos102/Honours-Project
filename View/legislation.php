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
  <div class="container mt-5">
    <div class="jumbotron">
      <h1 class="display-3"><span style="align-items: center; display:flex;"><img src="images/law.png" alt="judges gavel" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Legislation</span></h1>
      <p class="lead">Disclaimer - This website is part of a 4th year honours project. All information contained within is for education purposes only.</p>
        <h1 class="display-4">Cookie Policy</h1>
        <h3>What are cookies?</h3>
        <p>Cookies are small text files stored on the consumers computer that help identify the user, by assigning a storage address and unique ID.</p>
        <h3>What do they do?</h3>
        <p>Cookies are used to track useful information on consumers, these inlude but are not limited to: last login to the site, user preferences, browsing habbits, tracking, etc.</p>
        <h3>How does this site handle cookies?</h3>
        <p>All consumer data obtained by this site is used for functionality purposes only. No personal information is collected and/or sold to 3rd parties. For a full list of uses see below:</p>
        <ul>
        <li>Store time zone of the user</li>
        <li>Remember user preferences for the site</li>
        <li>Check last login date</li>
        <li>Track login status (Site admins only)</li>
        </ul>
      <h1 class="display-4">Session Policy</h1>
        <h3>What are sessions, and how are they used?</h3>
        <p>Similar to cookies, sessions store information related to the consumer, however these are stored temporarily on the webserver rather than the users own computer</p>
        <h3>How does this site handle cookies?</h3>
        <p>As with the sites cookies, all session information is used for functionality purposes only. No personal information is collected and/or sold to 3rd parties.</p>
      <h1 class="display-4">Agreement</h1>
      <p class="lead">By using this website you are agreeing to the above stated terms, unless stated otherwise. All policy information has been written in accordance with current GDPR compliance laws. For more information please visit <a href="https://ico.org.uk/for-organisations/guide-to-data-protection/guide-to-the-general-data-protection-regulation-gdpr/">ico.org.uk</a></p>
    </div>
  </div>


<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrap-script.php'; ?>
    <?php include '../Controller/cookie-consent.php'; ?>
</body>
</html>
