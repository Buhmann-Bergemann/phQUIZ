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
    <div class="menu-selection">
        <div class="menu-item play clickable"> <img /> PLAY </div>
        <div class="menu-item config clickable"> <img /> CONFIG </div>
        <div class="menu-item github clickable"> <img /> GITHUB </div>
    </div>
    <div class="leaderboard">
        <h3></h3>
    </div>
    <div class="footer">
     <p>phQUIZ! <span>BETA-BUILD</span></p>
        <p class="playing-as">playing as: <span class="username">ANON</span></p>
    </div>
    <div id="tsparticles"></div>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <script src="app.js"></script>
</body>
</html>