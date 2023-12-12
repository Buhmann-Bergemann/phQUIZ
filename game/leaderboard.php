<?php

function AddToLeaderboard($username, $score, $correctAnswers, $percentageCorrect, $failedQuestions)
{
    $leaderboardFile = fopen("../../phQUIZ/leaderboard.csv", "a");
    $date = date("d.m.Y");
    $time = date("H:i:s");
    $entry = "$username;$score;$correctAnswers;$percentageCorrect;$failedQuestions;$date;$time\n";
    fwrite($leaderboardFile, $entry);
    fclose($leaderboardFile);
}

function RemoveFromLeaderboard($username)
{
    $leaderboardFile = fopen("../../phQUIZ/leaderboard.csv", "r");
    $leaderboard = [];
    while (($zeile = fgetcsv($leaderboardFile)) !== FALSE) {
        $leaderboard[] = $zeile;
    }
    fclose($leaderboardFile);

    $leaderboardFile = fopen("../../phQUIZ/leaderboard.csv", "w");
    foreach ($leaderboard as $entry) {
        if ($entry[0] != $username) {
            fwrite($leaderboardFile, implode(';', $entry) . "\n");
        }
    }
    fclose($leaderboardFile);
}

function ResetLeaderboard()
{
    $leaderboardFile = fopen("../../phQUIZ/leaderboard.csv", "w");
    fwrite($leaderboardFile, "username;score;grade;date;time\n");
    fclose($leaderboardFile);
}

function GetUserScoreFromLeaderboard($username)
{
    $leaderboardFile = fopen("../../phQUIZ/leaderboard.csv", "r");
    $userScore = null;
    $correctAnswers = null;
    $percentageCorrect = null;
    $failedQuestions = null;
    while (($line = fgetcsv($leaderboardFile, 0, ";")) !== FALSE) {
        if ($line[0] == $username) {
            $userScore = $line[1]; // Get the score
            $correctAnswers = $line[2]; // Get the correct answers
            $percentageCorrect = $line[3]; // Get the percentage correct
            $failedQuestions = $line[4]; // Get the failed questions
            break;
        }
    }
    fclose($leaderboardFile);
    return array($userScore, $correctAnswers, $percentageCorrect, $failedQuestions);
}