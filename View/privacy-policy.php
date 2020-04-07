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
        include 'header.php';
    ?>
<!-- </head> -->
<title>Privacy Policy</title>
<body>
  <div class="container mt-5">
    <div class="jumbotron">
      <h1 class="display-3"><span style="align-items: center; display:flex;"><img src="images/law.png" alt="judges gavel" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Privacy Policy</span></h1>
      <p class="lead">Disclaimer - This website is part of a 4th year honours project. All information contained within is for education purposes only.</p>
        <h1 class="display-4">Cookies</h1>
        <h3>What are cookies?</h3>
        <p>Cookies are small text files created by websites that are stored on a user’s computer. The text file is of nominal size and is comprised of a virtual address (a bit like a postcode) and a unique ID to help identify the user. </p>
        <h3>What do they do?</h3>
        <p>Cookies are often used to track useful information on consumers. This information includes but is not limited to the last login to the site, user preferences, browsing habits, tracking, etc.</p>
        <h3>How does this site handle cookies?</h3>
        <p>All consumer data obtained by this site is used for functional purposes only and will not be used or resold for marketing purposes. For a full list of uses refer to the list below:</p>
        <ul>
        <li>Check the user's last login date.</li>
        </ul>
      <h1 class="display-4">Sessions</h1>
        <h3>What are sessions?</h3>
        <p>Similar to cookies, sessions store useful information related to the user, however, this information is stored temporarily on the webserver rather than the users own computer.</p>
        <h3>How does this site handle sessions?</h3>
        <p>As with cookies, all consumer data obtained by this site is used for functional purposes only and will not be used or resold for marketing purposes. For a full list of uses refer to the list below:</p>
        <ul>
        <li>Store the time zone of the user.</li>
        <li>Remember user preferences for the site (feature to be implemented).</li>
        <li>Track login status (Site admins only)</li>
        </ul>
      <h1 class="display-4">Agreement</h1>
      <p class="lead">By using this website, you are agreeing to the above stated terms, unless stated otherwise. All policy information has been written in accordance with current GDPR compliance laws. For more information please visit <a href="https://ico.org.uk/for-organisations/guide-to-data-protection/guide-to-the-general-data-protection-regulation-gdpr/">ico.org.uk</a></p>
    </div>
  </div>


<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrap-script.php'; ?>
    <?php include '../Controller/cookie-consent.php'; ?>
</body>
</html>
