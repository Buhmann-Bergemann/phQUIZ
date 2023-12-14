<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>phQUIZ!</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="game.css" />
</head>
<?php
session_start();

include 'leaderboard.php';

if (isset($_POST["exit-game"]) && $_POST["exit-game"] == "true") {
    $_SESSION['guestHasSubmitted'] = false;
    header("Location: ../index.php");
}

$username = $_SESSION['username'];

if (isset($_POST["userAnswers"])) {
    $userAnswers = json_decode($_POST['userAnswers']);
} else {
    $userAnswers = null;
}

if (isset($_POST["userScore"])) {
    $userScore = $_POST['userScore'];
} else {
    $userScore = 0;
}

if (isset($_POST["failedQuestions"])) {
    $failedQuestions = $_POST['failedQuestions'];
} else {
    $failedQuestions = 0;
}

$percentageCorrect = 0;


if (!isset($_POST['usernameLeaderboard']))
{
    $userAnswers = json_decode($_POST['userAnswers']);
    $userScore = $_POST['userScore'];
    $failedQuestions = $_POST['failedQuestions'];
}
else {
    $userScore = $_POST['userScore'];
    $failedQuestions = $_POST['failedQuestions'];
    $correctAnswers = $_POST['correctAnswers'];
    $percentageCorrect = $_POST['percentageCorrect'];
}


// Use the shuffled questions from the session
$fragen = $_SESSION['questions'];

$correctAnswers = 0;
if (!isset($_POST['usernameLeaderboard'])) {
    foreach ($fragen as $index => $frage) {
        if ($userAnswers !== null && isset($userAnswers[$index])) {
            $userAnswerParts = explode('-', $userAnswers[$index]);
            $userAnswerNumber = end($userAnswerParts);
            if ($userAnswerNumber == $frage[6]) { // Assuming the correct answer is in the 6th column
                $correctAnswers++;
                $userScore += 5000;
            } else { // Parity check
                if ($userScore >= 10000) {
                    $userScore -= 4500;
                } else if ($userScore >= 5000) {
                    $userScore -= 2500;
                } else if ($userScore <= 2500) {
                    $userScore = 0;
                }
            }
            $percentageCorrect = round(($correctAnswers / count($fragen)) * 100, 0);
        }
    }
}

function GetUserGrade($userScore)
{
    if ($userScore >= 50000) {
        return 'SS';
    } elseif ($userScore >= 46000) {
        return 'S';
    } elseif ($userScore >= 40000) {
        return 'A';
    } elseif ($userScore >= 30000) {
        return 'B';
    } elseif ($userScore >= 22250) {
        return 'C';
    } elseif ($userScore >= 16000) {
        return 'D';
    } else {
        return 'F';
    }
}

$grade = GetUserGrade($userScore);

?>

<body>
<div class="header" style="z-index: 2;">
    <p>HOME</p>
</div>
    <div class="user-score">
        <?php
        echo "<p class='score-heading'>score:</p>";
        echo "<p class='score'>$userScore</p>";
        echo "<p class='score-percentage'>[ $percentageCorrect% ]</p>";
        echo "Correct answers: $correctAnswers<br>";
        echo "Failed Questions: $failedQuestions<br>";

        if($username == 'guest' && !$_SESSION['guestHasSubmitted'] && $percentageCorrect >= 80)
        {
            echo "<form method='post'>";
            echo "<input name='usernameLeaderboard' type='text'>";
            echo "<input type='submit' value='Add to leaderboard'>";
            echo "<input type='hidden' name='userScore' value='$userScore'>";
            echo "<input type='hidden' name='failedQuestions' value='$failedQuestions'>";
            echo "<input type='hidden' name='correctAnswers' value='$correctAnswers'>";
            echo "<input type='hidden' name='percentageCorrect' value='$percentageCorrect'>";
            echo "</form>";
            $_SESSION['guestHasSubmitted'] = true;
        }
        else if ($percentageCorrect >= 80) {
            echo "
            <div class='user-submitted'>
                <p>your score has been submitted to the leaderboard</p>
                <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAABPUlEQVR4nO3aQUrDUBiF0a7JDuLSHDp0s8rbwZUghQ5bCL3B/5wNmHz3hWDJ5QIAAAAAAAAAcEZJtiQf7esYKck1yU/+fLWvZ3L8GyMU4xvhBPGN8IIX7spjvJgLJ/9mH2k79AImi/g94heJXyR+kfhF4heJXyR+kfhF4heJXyS++DPFD2vijxQnX/yR4uSLP1KcfPFfav8M4wxfAuS5T0f+x9cLST7vbui9eB3XcZ+O3MVPc4SI3xsh4vdGyOAXbv2GM/GFu0vyluT7iRs//EnIxJN/lhEyPX5zhIjfGyHi90aI+L0RIn5vhIjfGyHi90aI+L0RIn5vhIhf/71mZfp/uOUn4RHiF0dYTn7vSVji90ZY4vdGWOL3Rlji90ZY4vdGWOL3Rlji90ZY4nd/tthafx8AAAAAAAC4HOwXogdhP73b4mEAAAAASUVORK5CYII='>
            </div>
            ";
        }

        if($username != "guest")
        {
            if(isset($userScore, $correctAnswers, $percentageCorrect, $failedQuestions)) {
                AddToLeaderboard($username, $userScore, $correctAnswers, $percentageCorrect, $failedQuestions);
            } else {
                error_log("One or more variables are not set: userScore, correctAnswers, percentageCorrect, failedQuestions");
            }
        }
        else
        {
            if(isset($_POST['usernameLeaderboard'], $userScore, $correctAnswers, $percentageCorrect, $failedQuestions))
            {
                AddToLeaderboard($_POST['usernameLeaderboard'], $userScore, $correctAnswers, $percentageCorrect, $failedQuestions);
            } else {
                error_log("One or more variables are not set: usernameLeaderboard, userScore, correctAnswers, percentageCorrect, failedQuestions");
            }
        }
        ?>
    </div>
    <div class="leaderboard">
        <p class="leaderboard-heading">leaderboard</p>
        <table>
            <tr>
                <th>username</th>
                <th>score</th>
                <th>grade</th>
                <th>date</th>
                <th>time</th>
            </tr>
            <?php
            $leaderboardFile = fopen("../../phQUIZ/leaderboard.csv", "r");
            $leaderboard = [];
            while (($zeile = fgetcsv($leaderboardFile)) !== FALSE) {
                $leaderboard[] = $zeile;
            }
            fclose($leaderboardFile);

            // Sort the leaderboard by score in descending order
            usort($leaderboard, function($a, $b) {
                $a = explode(';', $a[0]);
                $b = explode(';', $b[0]);
                return intval($b[1]) - intval($a[1]);
            });

            // Get the top 15 entries
            $leaderboard = array_slice($leaderboard, 0, 15);

            foreach ($leaderboard as $entry) {
                $entry = explode(';', $entry[0]);
                echo "<tr>";
                echo "<td>$entry[0]</td>";
                echo "<td>$entry[1]</td>";
                echo "<td><img width='50' src='../media/grades/" . GetUserGrade($entry[1]) .".png'></td>";
                echo "<td>".(isset($entry[5]) ? $entry[5] : '')."</td>";
                echo "<td>".(isset($entry[6]) ? $entry[6] : '')."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <img width='400' class="user-grade" src='../media/grades/<?=$grade?>.png'>;
    <?php
    if ($percentageCorrect == 100) {
        echo "<img class='user-grade-extra' width='150' src='../media/img/PERFECT.png'>";
    }
    ?>
</div>
<div class="footer" style="z-index: 2">
    <p>phQUIZ! <span>BETA-BUILD</span></p>
    <p class="playing-as">playing as:
    <div class="userprofile">
        <p class="username" style="padding: 2px; margin-left: 5px"><?= $username ?></p>
        <img src="../media/img/avatar.png">
        <div class="user-logout clickable">
            <form method="post">
                <input type="submit" value="exit game" class="user-logout-submit clickable back">
                <input type="hidden" name="exit-game" value="true">
            </form>
        </div>
    </div>
    </p>
</div>
<div id="tsparticles"></div>
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
<script src="app.js"></script>
<script src="../jukebox.js"></script>
</body>
</html>