<?php
if(isset($_GET['questions']) && isset($_POST['username']) || isset($_SESSION['username'])){
    $datei = fopen("../../phQUIZ/question_packs/{$_GET['questions']}", "r");
    $fragen = [];

    while (($zeile = fgetcsv($datei)) !== FALSE) {
        $fragen[] = $zeile;
    }
    fclose($datei);
    array_shift($fragen);
    $anzahlFragen = count($fragen);
    $randofragen = $fragen;
    shuffle($randofragen);

    $_SESSION['questions'] = $randofragen;

    $index = 1;
    foreach ($randofragen as $items){
        echo "
<div class='question-container' id='$index'>
<div class='question'>  <p>$items[1]</p> </div>
<div class='answer clickable' id='answer-{$index}-1'> <p>$items[2]</p> </div>
<div class='answer clickable' id='answer-{$index}-2'> <p>$items[3]</p> </div>
<div class='answer clickable' id='answer-{$index}-3'> <p>$items[4]</p> </div>
<div class='answer clickable' id='answer-{$index}-4'> <p>$items[5]</p> </div>
</div>

";
        $index++;
    }
}