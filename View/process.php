<?php
include 'session.php';
include '../Model/db-connection.php'; ?>
<?php
	//Check to see if score is set_error_handler
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;
		$topic = $_SESSION['topic'];

		/*
		*	Get total questions
		*/
    // Get total questions
    $sql = "SELECT * FROM question
						WHERE topic = :topic";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['topic' => $topic]);
    $total = $stmt->rowCount();


		/*
		*	Get correct choice
		*/

    $sql = "SELECT * FROM choice
            WHERE question_number = $number AND is_correct = 1";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute();
    if($success && $stmt->rowCount() > 0){

      $choices = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {
      echo "fail!";
    }

		// $query = "SELECT * FROM `choices`
		// 			WHERE question_number = $number AND is_correct = 1";
    //
		// //Get result
		// $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    //
		// //Get row
		// $row = $result->fetch_assoc();

		//Set correct choice
		$correct_choice = $choices['id'];

		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}

		//Check if last question
		if($number == $total){
			header("Location: final.php");
			exit();
		} else {
			header("Location: question.php?topic=" . $_SESSION['topic'] . "&n=".$next);
		}
	}
