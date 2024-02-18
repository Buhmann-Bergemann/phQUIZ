<?php
session_start();

include 'game/leaderboard.php';

$IsHomeScreen = false;

function destroySession() {
    $_SESSION = []; // Sessions do not get cleared correctly, setting the Session Array to null fixes this problem.
    session_destroy();
    session_write_close();
}

function isLoggedIn() {
    return isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true;
}

function checkLogin() {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $adminFile = fopen("../phQUIZ/admin.csv", "r");
        $login = false;

        while (($row = fgetcsv($adminFile)) !== FALSE) {
            if ($row[1] == strtolower($_POST['username']) && $row[2] == strtolower($_POST['password'])) {
                $login = true;
            }
        }

        $_SESSION["logged-in"] = $login;
        $_SESSION["username"] = $_POST['username'];

        fclose($adminFile);

        return $login;
    } else {
        return false;
    }
}

if (isset($_POST["kill-session"]) && $_POST["kill-session"] == "true") {
    destroySession();
}

if(isset($_POST['clear-leaderboard']) && $_POST['clear-leaderboard'] == "clearLeaderboard")
{
    ResetLeaderboard();
    echo "
        <script type='module'>
            import {addNotification} from \"./notifier.js\";
            addNotification('LEADERBOARD CLEARED', 'The leaderboard has been cleared', true);
        </script>
    ";
}

if (checkLogin() || isLoggedIn()) {
    $userIsSet = true;
    $username = strtolower($_SESSION['username']);
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    $userIsSet = false;
    $username = "user not set";

    if (!checkLogin()) {
        echo "
            <script type='module'>
                import {addNotification} from \"./notifier.js\";
                addNotification('LOGIN INVALID', 'The prompted login is invalid', true);
            </script>
        ";
    }
} else {
    $userIsSet = false;
    $username = "user not set";
}
?>