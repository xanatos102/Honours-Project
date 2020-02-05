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
    include '../Model/api.php';
    retrieveQuizData();
    // include '../Controller/retrieve-questions.php';
    // include '../Controller/retrieve-choices.php';
    // $quiz = retrieveQuestions();
    // $quizArray = json_decode($quiz);
    // var_dump($quizArray);

    // Count for question numbers
    $questionCounter = 1;
    $number = (int) $_GET['n'];
    ?>
</head>
<title>Malware Quiz</title>
<body>
  <div class="container" style="margin-top: 2em;">

    <h1 class="display-1" style="align-items: center; display:flex;"><img src="images/professor2.png" alt="professor" style="width: 1.2em; height: 1.2em; margin-right: 0.25em;"/>Malware Questions</h1>
    <hr>
    <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
			<p class="question">
				<?php echo $question['description']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<?php while($row = $choices->fetch_assoc()): ?>
						<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
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
