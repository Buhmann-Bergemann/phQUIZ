<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="csveditor.css" />
    <title>phQUIZ! - Admin Panel</title>
    <script src='notifier.js' type='module'></script>
</head>
<body>
<div class="header">
    <p>ADMIN</p>
</div>
<?php
session_start();
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

if (checkLogin() || isLoggedIn()) {
    $userIsSet = true;
    $username = strtolower($_SESSION['username']);
    include 'adminpanel.php';
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    $userIsSet = false;
    $username = "user not set";
    include 'adminlogin.php';

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
    include 'adminlogin.php';
}


?>


    <div class="footer">
        <p>phQUIZ! <span>BETA-BUILD</span></p>
        <p class="playing-as">playing as:
        <div class="userprofile">
            <p class="username" style="padding: 2px; margin-left: 5px"><?= $username ?></p>
            <img src="media/img/avatar.png">
            <div class="user-logout clickable">
                <form method="post">
                    <input type="hidden" name="kill-session" value="true">
                    <input type="submit" value="logout" class="user-logout-submit clickable back">
                </form>
            </div>
        </div>
        </p>
    </div>
</body>
</html>