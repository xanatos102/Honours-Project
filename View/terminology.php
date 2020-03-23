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
            <td class="text-left">A piece of malicious software that tries to destroy or steal data.</td>
          </tr>
          <tr>
            <td class="text-left">Cookie</td>
            <td class="text-left">A small text file stored on a users computer. Used to remember user settings and client-side data.</td>
          </tr>
          <tr>
            <td class="text-left">Session</td>
            <td class="text-left">A webserver component used for storing server-side data on user.</td>
          </tr>
          <tr>
            <td class="text-left">Client-side</td>
            <td class="text-left">All the web features visible to the customer.</td>
          </tr>
          <tr>
            <td class="text-left">Server-side</td>
            <td class="text-left">All the web features visible to the server.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
          </tr>
          <tr>
            <td class="text-left">Some header.</td>
            <td class="text-left">Some text.</td>
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
