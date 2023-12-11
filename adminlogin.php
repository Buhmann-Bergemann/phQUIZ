<?php
echo '
        <div class="user-select" style="">
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
                <input type="submit" value="login!" id="user_entry_join" class="clickable">
            </form>
        </div>
    </div>
    ';