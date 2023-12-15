<?php
session_start();

function destroySession() {
    $_SESSION = []; // Sessions do not get cleared correctly, setting the Session Array to null fixes this problem.
    session_destroy();
    session_write_close();
}

if (isset($_POST["kill-session"]) && $_POST["kill-session"] == "true") {
    destroySession();
    $_POST = array();
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
}

function getStatistics() {
    $leaderboardFile = fopen("../phQUIZ/leaderboard.csv", "r");

    $gamesPlayed = 0;
    $players = [];
    while (($data = fgetcsv($leaderboardFile)) !== FALSE) {
        $gamesPlayed++;
        $players[] = $data[0];
    }
    fclose($leaderboardFile);

    $questionFiles = glob("../phQUIZ/question_packs/*.csv");
    $questions = 0;
    foreach ($questionFiles as $questionFile) {
        if (($file = fopen($questionFile, "r")) !== FALSE) {
            while (($data = fgetcsv($file)) !== FALSE) {
                $questions++;
            }
            fclose($file);
        }
    }

    $gamesPlayed = round($gamesPlayed / 10) * 10;
    $players = round(count(array_unique($players)) / 10) * 10;
    $questions = round($questions / 10) * 10;

    return [
        'gamesPlayed' => $gamesPlayed . '+',
        'players' => $players . '+',
        'questions' => $questions . '+'
    ];
}
?>