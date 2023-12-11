<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>phQUIZ!</title>
    <link rel="stylesheet" href="style.css" />
</head>
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
?>
<body>
    <div class="header">
        <p>HOME</p>
    </div>
    <div class="user-select" style="display: none">
        <div class="user-select-heading">
            <div>
                <p class="statistic-top">1000+</p>
                <p class="statistic-sub"># of games played</p>
            </div>
            <div>
                <p class="statistic-top">10+</p>
                <p class="statistic-sub"># of players</p>
            </div>
            <div>
                <p class="statistic-top">50+</p>
                <p class="statistic-sub"># of questions</p>
            </div>
        </div>
        <div class="user-entry">
            <p class="user-entry-heading">welcome to phquiz</p>
            <p>enter a username to join, (min. 3 - max. 12 characters)</p>
            <form id="user_entry_form" method="post">
                <div class="user-input-fields">
                    <input type="text" id="user_input" name="username">
                </div>
                <input type="submit" value="join!" id="user_entry_join" class="clickable">
            </form>
        </div>
    </div>
    <div class="homescreen">
        <div class="menu-selection">
            <div class="menu-item play clickable"> <img /> PLAY </div>
            <div class="menu-item config clickable"> <img /> CONFIG </div>
            <div class="menu-item github clickable"> <img /> GITHUB </div>
        </div>
        <div class="leaderboard">
            <h3></h3>
        </div>
    </div>
    <div class="jukebox">

    </div>
    <div class="config-menu" style="display: none">
        <h1>// config</h1>
            <div style="display: flex; gap: 33px">
                <p>SFX Volume: </p>
                <input type="number" value="100" />
            </div>
            <div style="display: flex; gap: 20px">
                <p>Music Volume: </p>
                <input type="number" value="100" />
            </div>
            <div class="btn clickable" style="margin-top: 20px">save!</div>
    </div>
    <div class="play-menu" style="display: none">
        <h1>// questions</h1>
        <div class="question-catalogue">
            <?php include 'question_pack_output.php'; ?>
        </div>
        <p>choose a question cataolgue to play</p>
    </div>
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
    <div class="loading" style="display: none">
        <p>checking login...</p>
        <span class="loader"></span>
    </div>
    <div id="tsparticles"></div>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <script src="app.js" type="module"></script>
    <script src="jukebox.js"></script>
    <?php
        if($userIsSet)
        {
            echo '<script type="text/javascript">
setTimeout(load, "1500");
setTimeout(removeLoader, "2000");
const loader = document.querySelector(".loading");
loader.style.display = "block";
function load(){
    // Fixes race condition, caused by 2 scripts interfering
    document.querySelector(".homescreen").style.display = "block";
    document.querySelector(".user-select").style.display = "none";
    loader.style.opacity = "0";
}
function removeLoader(){
    loader.remove();
            tsParticles
            .loadJSON("tsparticles", "assets/particles.json")
            .then(container => {
                console.log("callback - tsparticles config loaded");
            })
            .catch(error => {
                console.error(error);
            });
}

</script>';
        }
    ?>
</body>
</html>