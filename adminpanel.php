
<main>
    <div class="play-menu" style="display: block">
        <h1>// question packs</h1>
        <div class="question-catalogue">
            <?php include 'question_pack_output.php'; ?>
        </div>
        <p>choose a question pack to edit</p>
    </div>

    <?php include 'csv_editor.php'; ?>

    <div>
        <form method="post" action="clear-leaderboard.php">
            <input type="submit" class="clear-leaderboard" value="clear leaderboard" name="clear-leaderboard">
        </form>
    </div>
</main>
