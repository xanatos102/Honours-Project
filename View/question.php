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

    // Get total questions
    $sql = "SELECT * FROM question";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $total = $stmt->rowCount();


    $sql = "SELECT * FROM question
            WHERE question_number = $number";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute();
    if($success && $stmt->rowCount() > 0){

      $questions = $stmt->fetch(PDO::FETCH_ASSOC);
      var_dump($questions);

    } else {
      echo "fail!";
    }

    $sql = "SELECT * FROM choice
            WHERE question_number = $number";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute();
    if($success && $stmt->rowCount() > 0){

      $choices = $stmt->fetchAll(PDO::FETCH_ASSOC);
      var_dump($choices);

    } else {
      echo "fail!";
    }

    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">

    <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor2.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Malware Questions</h1>
    <hr>
    <div class="current">Question <?php echo $questions['question_number']; ?> of <?php echo $total; ?></div>
			<p class="question">
				<?php echo $questions['description']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<?php while($row = $choices->fetch_assoc()): ?>
						<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['description']; ?></li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
			</form>
		</div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
