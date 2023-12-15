<?php
// Include the separate PHP file containing the logic
include 'admin_logic.php';
?>
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
    <p style="color: #29293b" class=""><a class="unstyled-link clickable" href="index.php">HOME</a> </p>
</div>
<?php
if ($userIsSet) {
    include 'adminpanel.php';
} else {
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