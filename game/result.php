<?php
// Include the separate PHP file containing the logic
include 'result_logic.php';
?>
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
<body>
<div class="header" style="z-index: 2;">
    <p>HOME</p>
</div>
<div class="user-score">
    <?php displayUserScore(); ?>
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
        <?php displayLeaderboard(); ?>
    </table>
</div>
<img width='400' class="user-grade" src='../media/grades/<?=$grade?>.png'>;
<?php displayUserGrade(); ?>
</div>
<div class="footer" style="z-index: 2">
    <p class="footer-note">phQUIZ! <span>BETA-BUILD</span></p>
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