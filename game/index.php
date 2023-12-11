<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="game.css" />
    <script src="../notifier.js" type="module"></script>
    <script src="game.js" type="module"></script>
    <title>phQUIZ - Game</title>
</head>
<?php
session_start();

if (isset($_POST["exit-game"]) && $_POST["exit-game"] == "true") {
    header("Location: ../index.php");
}

if(isset($_POST['username']) || isset($_SESSION['username']))
{
    $userIsSet = true;
    $username = strtolower($_POST['username']);
    $IsHomeScreen = true;
    if (isset($_POST['username']))
    {
        $_SESSION['username'] = $username;
    }
    else if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
}
else
{
    $userIsSet = false;
    $username = "user not set";
    $IsHomeScreen = false;
    if (isset($_POST['username']))
    {
        $_SESSION['username'] = $username;
    }
    else if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
    header("Location: ../index.php");
}
?>
<body>
<div class="header">
    <p>GAME</p>
</div>
    <div>
        <?php include '../csv_reader.php' ?>
    </div>
<div id="timer-bar"></div>
<div class="footer">
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
<form id="quiz-results" action="result.php" method="POST" style="display: none;">
    <input type="hidden" id="user-answers" name="userAnswers">
    <input type="hidden" id="user-score" name="userScore">
    <input type="hidden" id="failed-questions" name="failedQuestions">
    <input type="hidden" id="questions" name="questions" value="<?= $_GET['questions'] ?>">
</form>
</body>
</html>