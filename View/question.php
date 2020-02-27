<?php
/*
    Description: Quiz to test users knowledge
    Author: Aaron Hay
*/
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'session.php';
    include 'header.php';
    include '../Model/db-connection.php';

    $number = (int) $_GET['n'];
    $topic = $_GET['topic'];
    $_SESSION['topic'] = $topic;

    // Get total questions
    $sql = "SELECT * FROM question
            WHERE topic = :topic";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['topic' => $topic]);
    $total = $stmt->rowCount();


    $sql = "SELECT * FROM question
            WHERE topic = :topic";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['topic' => $topic]);
    if($success && $stmt->rowCount() > 0){

      $questions = $stmt->fetch(PDO::FETCH_ASSOC);
      var_dump($questions);

    } else {
      echo "fail!";
    }

    $sql = "SELECT choice.*, question.question_number, question.description AS question_description, question.topic FROM choice
            INNER JOIN question ON choice.question_number=question.question_number
            WHERE topic = :topic";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['topic' => $topic]);
    if($success && $stmt->rowCount() > 0){

      $choices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
      echo "fail!";
    }

    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">

    <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor2.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/><?php echo $topic . " Questions"; ?></h1>
    <hr>
    <div class="current">Question <?php echo $questions['question_number']; ?> of <?php echo $total; ?></div>
			<p class="question">
				<?php echo $questions['description']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
          <?php foreach ($choices as $choice) { ?>
              <li><input name="choice" type="radio" value="<?php echo $choice['id']; ?>" /><?php echo $choice['description']; ?></li>
          <?php } ?>
				</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
			</form>
		</div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
