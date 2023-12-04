<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" />
    <title>phQUIZ! - Admin Panel</title>
</head>
<body>
<div class="header">
    <p>ADMIN</p>
</div>
<?php

function CheckLogin()
{
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $admindatei = fopen("../../phQUIZ/admin.csv", "r");
        $login = false;
        while (($zeile = fgetcsv($admindatei)) !== FALSE) {
            if ($zeile[1] == strtolower($_POST['username']) && $zeile[2] == strtolower($_POST['password'])){
                $login = true;
            }
        }
        return $login;
    }
    else
    {
        return false;
    }
}

if(CheckLogin())
{
    $userIsSet = true;
    $username = strtolower($_POST['username']);
    echo include 'adminpanel.php';
}
else
{
    $userIsSet = false;
    $username = "user not set";
    echo include 'adminlogin.php';
}


?>
    <div class="footer">
        <p>phQUIZ! <span>BETA-BUILD</span></p>
        <p class="playing-as">playing as:
        <div class="userprofile">
            <p class="username" style="padding: 2px; margin-left: 5px"><?= $username ?></p>
            <img src="media/img/avatar.png">
            <div class="user-logout clickable">
                <form>
                    <input type="submit" value="log-out" class="user-logout-submit clickable back">
                </form>
            </div>
        </div>
        </p>
    </div>
</body>
</html>