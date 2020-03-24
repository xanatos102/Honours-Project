<?php
/*
    Description: Website information page with links to privacy policies and data handling
    Author: Aaron Hay
*/
?>

<html>
<!--<head>-->
    <?php
    include 'header.php';
    //phpinfo();
    ?>
<!-- </head> -->
<title></title>
<body>
  <div class="container mt-5">
    <div class="jumbotron">
      <h1 class="display-2"><span style="align-items: center; display:flex;"><img src="images/book.png" alt="stack of books" style="width: 1em; height: 1em; margin-right: 0.25em;"/>Terminology</span></h1>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><img src="images/search.png" alt="stack of books" style="width: 1em; height: 1em;" /></span>
        </div>
        <input type="text" id="myInput" onkeyup="searchTerm()" placeholder="Search for term.." class="form-control">
      </div>
      <table id="termTable" class="table table-striped text-center mt-4">
        <thead class="thead-dark">
            <tr>
              <th scope="col" class="text-left">Term</th>
              <th scope="col" class="text-left">Definition</th>
            </tr>
          </thead>
          <tr>
            <td class="text-left">Malware</td>
            <td class="text-left">Short for "malicious software" - computer programs designed to infiltrate and damage computers without the users consent.</td>
          </tr>
          <tr>
            <td class="text-left">Cookie</td>
            <td class="text-left">A small text file stored on a users computer. Used to remember user settings and track preferences.</td>
          </tr>
          <tr>
            <td class="text-left">Session</td>
            <td class="text-left">A webserver component used for storing information, this is not stored on the users computer.</td>
          </tr>
          <tr>
            <td class="text-left">Client-side</td>
            <td class="text-left">All of the web features and technology visible to the customer.</td>
          </tr>
          <tr>
            <td class="text-left">Server-side</td>
            <td class="text-left">All of the web features and technology visible to the server.</td>
          </tr>
          <tr>
            <td class="text-left">Trojan Horse</td>
            <td class="text-left">A virus program that claims to rid your computer of viruses but instead introduces viruses onto your computer.</td>
          </tr>
          <tr>
            <td class="text-left">Worm</td>
            <td class="text-left">A virus program that replicates itself in order to spread to other computers and programs.</td>
          </tr>
          <tr>
            <td class="text-left">Phishing</td>
            <td class="text-left">A type of internet fraud, usually of email format that tries to gain the users personal information.</td>
          </tr>
          <tr>
            <td class="text-left">Spam</td>
            <td class="text-left">Electronic junk mail or junk newsgroup postings. Some spam can contain viruses attached as links or email attachments.</td>
          </tr>
          <tr>
            <td class="text-left">GDPR</td>
            <td class="text-left">The General Data Protection Regulation (GDPR) is a legal framework that sets guidelines for the collection and processing of personal information from individuals who live in the European Union (EU).</td>
          </tr>
          <tr>
            <td class="text-left">Clickbait</td>
            <td class="text-left">A form of false advertisement that uses hyperlink text or a thumbnail link that is designed to attract attention and to entice users to follow that link and read, view, or listen to the linked piece of online content, with a defining characteristic of being deceptive.</td>
          </tr>
          <tr>
            <td class="text-left">Special characters</td>
            <td class="text-left">A special character is a character that is not an alphabetic or numeric character. Punctuation marks and other symbols (@,#,$) are examples of special characters.</td>
          </tr>
          <tr>
            <td class="text-left">URL</td>
            <td class="text-left">The address of a specific webpage or file on the internet, e.g https://mywebsite.com.</td>
          </tr>
          <tr>
            <td class="text-left">Forms</td>
            <td class="text-left">An online page that allows for user input. It is an interactive page that mimics a paper document or form.</td>
          </tr>
        </table>
    </div>
  </div>
  <?php include "footer.php";?>

<script>
function searchTerm() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("termTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>
