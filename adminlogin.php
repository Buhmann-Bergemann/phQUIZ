<?php
// Include the separate PHP file containing the logic
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

$statistics = getStatistics();
echo '
        <div class="user-select" style="">
        <div class="user-select-heading">
            <div>
                <p class="statistic-top">' . $statistics["gamesPlayed"] . '</p>
                <p class="statistic-sub"># of games played</p>
            </div>
            <div>
                <p class="statistic-top">' . $statistics["players"] . '</p>
                <p class="statistic-sub"># of players</p>
            </div>
            <div>
                <p class="statistic-top">' . $statistics["questions"] . '</p>
                <p class="statistic-sub"># of questions</p>
            </div>
        </div>
        <div class="user-entry login-entry">
            <p class="user-entry-heading">admin - panel</p>
            <form id="user_entry_form" method="post">
                <div class="user-input-fields">
                    <p>username</p>
                    <input type="text" id="user_input" name="username">
                </div>
                <br />
                <br />
                <br />
                <div class="user-input-fields">
                    <p>password</p>
                    <input type="password" id="user_input" name="password">
                </div>
                <input type="submit" value="login!" id="user_entry_join" class="clickable" style="bottom: 0">
            </form>
        </div>
    </div>
    ';