<?php

session_start();
session_destroy();
//var_dump($_SESSION['verwendeteFragen']);

$datei = fopen("./datei.csv", "r");
$fragen = [];

while (($zeile = fgetcsv($datei)) !== FALSE) {
    $fragen[] = $zeile;
}
fclose($datei);
array_shift($fragen);

// Initialisiere ein Array in der Session, um bereits verwendete Fragen zu speichern
if (!isset($_SESSION['verwendeteFragen'])) {
    $_SESSION['verwendeteFragen'] = [];
}


do{
    $zufaelligeFrageIndex = rand(0, count($fragen) - 1);
    $zufaelligeFrage = $fragen[$zufaelligeFrageIndex];
    //echo "bisher verwendet:";
    //var_dump($_SESSION['verwendeteFragen']);
    //echo "die ausgewählte frage:";
    //var_dump($zufaelligeFrage[0][0]);
    $booltest = in_array($zufaelligeFrage[0][0], $_SESSION['verwendeteFragen']);
    //var_dump($booltest);
    if(!$booltest){
        session_destroy();
        return;
    }
} 
while($booltest);


// Füge die ID der aktuellen Frage zu den bereits verwendeten Fragen hinzu
$_SESSION['verwendeteFragen'][] = $zufaelligeFrage[0];

// Zeige die zufällig ausgewählte Frage an
echo "Frage: " . $zufaelligeFrage[1] . "<br>";
echo "A: " . $zufaelligeFrage[2] . "<br>";
echo "B: " . $zufaelligeFrage[3] . "<br>";
echo "C: " . $zufaelligeFrage[4] . "<br>";
echo "D: " . $zufaelligeFrage[5] . "<br>";
echo "Richtige Antwort: " . $zufaelligeFrage[6] . "<br>";


//fclose($datei);


