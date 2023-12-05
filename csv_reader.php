<?php
if(isset($_POST['datei']) && isset($_POST['username'])){
    $datei = fopen("../../phQUIZ/qustion_packs/{$_POST['datei']}.csv", "r");
    $fragen = [];

    while (($zeile = fgetcsv($datei)) !== FALSE) {
        $fragen[] = $zeile;

    }
    fclose($datei);
    array_shift($fragen);
    echo count($fragen);
    $randofragen = $fragen;
    shuffle($randofragen);
    $index = 1;
    foreach ($randofragen as $items){
        echo "
<div class='question-item' id='$index'>
<div class='question'>  <p>$items[1]</p> </div>
<div class='answer' id='answer-{$index}-1'> <p>$items[2]</p> </div>
<div class='answer' id='answer-{$index}-2'> <p>$items[3]</p> </div>
<div class='answer' id='answer-{$index}-3'> <p>$items[4]</p> </div>
<div class='answer' id='answer-{$index}-4'> <p>$items[5]</p> </div>
</div>

";
        $index++;
    }
}




