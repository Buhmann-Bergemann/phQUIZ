<?php
session_start();

$userAnswers = json_decode($_POST['userAnswers']);
$userScore = $_POST['userScore'];
$failedQuestions = $_POST['failedQuestions'];

// Use the shuffled questions from the session
$fragen = $_SESSION['questions'];



$correctAnswers = 0;
foreach ($fragen as $index => $frage) {
    $userAnswerParts = explode('-', $userAnswers[$index]);
    $userAnswerNumber = end($userAnswerParts);
    if ($userAnswerNumber == $frage[6]) { // Assuming the correct answer is in the 6th column
        $correctAnswers++;
        $userScore += 5000;
    }
}


$percentageCorrect = ($correctAnswers / count($fragen)) * 100;

if ($percentageCorrect >= 80 && $_SESSION['username'] == 'guest') {
    // Ask for username
    echo '<form method="post" action="add_to_leaderboard.php">';
    echo '<input type="text" name="username" placeholder="Enter your username">';
    echo '<input type="submit" value="Submit">';
    echo '</form>';
}

$grade = '';
if ($userScore >= 96000) {
    $grade = 'SS';
} elseif ($userScore >= 90000) {
    $grade = 'S';
} elseif ($userScore >= 82000) {
    $grade = 'A';
} elseif ($userScore >= 76000) {
    $grade = 'B';
} elseif ($userScore >= 56000) {
    $grade = 'C';
} elseif ($userScore >= 40000) {
    $grade = 'D';
} else {
    $grade = 'F';
}

// Display the user's performance
echo "Score: $userScore<br>";
echo "Correct answers: $correctAnswers<br>";
echo "Failed questions: $failedQuestions<br>";
echo "Percentage correct: $percentageCorrect%<br>";
echo "Grade: <img width='120' src='../media/grades/$grade.png'><br>";

if ($percentageCorrect == 100) {
    echo "<img width='80' src='../media/img/PERFECT.png'>";
}
?>