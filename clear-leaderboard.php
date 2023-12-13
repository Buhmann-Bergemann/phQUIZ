<?php

include './game/leaderboard.php';
if(isset($_POST['clear-leaderboard'])){
    ResetLeaderboard();
}
header("Location: ../admin.php");