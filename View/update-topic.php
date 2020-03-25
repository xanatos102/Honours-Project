<?php
/*
    Description: User interface used to manage and alter movies listed on the site.

    Author: Aaron Hay
*/
include 'session.php';

//Error Reporting for the users
if(isset($_GET['error']))
{
  $error = $_GET['error'];
  echo $error;
}

if(!isset($_SESSION['username']))
{
  // Customer has tried to access this page
  header("Location: index.php?error=ACCESS DENIED");
}
else
{
  include '../Controller/attempt-retrieve-all-topics.php';
  include 'header.php';

echo "
<html>
<head>
<title>Update Topic</title>
</head>
<body>

<div class='container mt-5'>
<div class='jumbotron'>
<h1 class='display-3'>Update Topics</h1>";

if (isset($_GET['id']) && $_GET['option'] == 'alter')
{
  $topicIndex = $_GET['id'];
  include '../Controller/attempt-retrieve-topic-by-id.php';
  echo "<a class='btn btn-secondary' href='update-topic.php'>Return</a><br><br>";
  echo "<form class='form-group needs-validation' method='POST' enctype='multipart/form-data' action='../Controller/attempt-update-topic-by-id.php?id=".$topicIndex."' novalidate>";
  echo '<div class="form-group">
          <label for="index">Topic ID:</label>
          <input type="text" class="form-control" name="index" value="'.$topicArray->id.'" readonly/>
        </div>
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" placeholder="Title" name="title" value="'.$topicArray->title.'" readonly/>
        </div>
        <div class="form-group">
          <label for="author">Author:</label>
          <input type="text" class="form-control" value="'.$topicArray->author.'" name="author" readonly/>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Headline Image</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="image_link" aria-describedby="inputGroupFileAddon01" value="'.$topicArray->image_link.'" required>
            <label class="custom-file-label" for="inputGroupFile01">'.$topicArray->image_link.'</label>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon02">Topic Content</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile02" name="file_link" aria-describedby="inputGroupFileAddon02" value="'.$topicArray->file_link.'" required>
            <label class="custom-file-label" for="inputGroupFile02">'.$topicArray->file_link.'</label>
          </div>
        </div>
      <button type="submit" name="update_topic" class="btn btn-success">Submit</button>
    </form>';

    require '../Controller/bootstrap-script.php';
    ?>

    <script>
      $('.custom-file input').change(function (e) {
           var files = [];
           for (var i = 0; i < $(this)[0].files.length; i++) {
               files.push($(this)[0].files[i].name);
           }
           $(this).next('.custom-file-label').text(files.join(', '));
       });
    </script>

<?php } elseif (isset($_GET['id']) && $_GET['option'] == 'delete') {

  $topicIndex = $_GET['id'];
  include '../Controller/attempt-retrieve-topic-by-id.php';

  echo "
  <form class='form-group needs-validation' method='POST' action='../Controller/attempt-remove-topic-by-id.php?id=".$topicIndex."' novalidate>
    <h1>Warning!</h1>
    <p>You are about to delete a topic in the database, are you sure you wish to continue?</p>
    <a class='btn btn-danger btn-block' href='update-topic.php'>No</a>
    <button class='form-control btn btn-success mt-3' type='submit' name='delete'>Yes</button>
  </form>";

} else {

  echo "
  <div class='row'>
    <div class='col-md-4'>
        <form method='POST' action='update-topic.php'>
            <select class='form-control' name='ordering' onchange='this.form.submit()'>
                <option value='placeholder'>Sort By ...</option>
                <option value='0'>ID (Last to First)</option>
                <option value='1'>ID (First to Last)</option>
                <option value='2'>Topic (Ascending)</option>
                <option value='3'>Topic (Descending)</option>
                <option value='4'>Author (Ascending)</option>
                <option value='5'>Author (Descending)</option>
            </select>
            <noscript><input type='submit' value ='Sort By'></noscript>
        </form>
    </div>
  </div>
  ";

  echo "
  <table class='table table-dark table-striped text-center mt-4'>
    <thead class='thead-dark'>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col' class='text-left'>Topic Title</th>
          <th scope='col' class='text-left'>Author</th>
          <th scope='col'>Alter Topic</th>
          <th scope='col'>Delete Topic</th>
        </tr>
      </thead>";

      for ($i=0 ; $i < sizeof($topicArray) ; $i++)
      {
      //echo "<div class='border border-success'>";
      echo "<tr>";
        echo "<td>".$topicArray[$i]->id."</td>";
        echo "<td class='text-left'>".$topicArray[$i]->title."</td>";
        echo "<td class='text-left'>".$topicArray[$i]->author."</td>";
        echo "<td><a class='btn btn-success' href='?id=".$topicArray[$i]->id."&option=alter'>Alter</a></td>";
        echo "<td><a class='btn btn-danger' href='?id=".$topicArray[$i]->id."&option=delete'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
echo "</div></div>";


echo "
</body>
</html>
";
}

?>
