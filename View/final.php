<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<?php echo '<h2>You are Done!</h2>
				<p>Congrats! You have completed the test</p>
				<p>Final Score:' . $_SESSION['score'] . '</p>
				<a href="question.php?topic=' . $_SESSION['topic'] . '&n=1" class="start">Take Again</a>';?>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2014, PHP Quizzer
		</div>
	</footer>
</body>
</html>
<?php unset($_SESSION['number']);
 			unset($_SESSION['score']);?>
