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
            <p>enter a username to join, or leave it blank to get a random one</p>
            <p>(max. 12 characters)</p>
            <form id="user_entry_form">
                <div class="user-input-fields">
                    <input type="text" id="user_input">
                </div>
                <input type="submit" value="join!" id="user_entry_join">
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
    <div class="footer">
     <p>phQUIZ! <span>BETA-BUILD</span></p>
        <p class="playing-as">playing as:
            <div class="userprofile">
                <p class="username" style="padding: 2px; margin-left: 5px"></p>
                <img src="media/img/avatar.png">
            </div>
        </p>
    </div>
    <div id="tsparticles"></div>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <script src="app.js" type="module"></script>
</body>
</html>