<?php

$datei = fopen("./datei.csv", "r");

while (($zeile = fgetcsv($datei)) !== FALSE) {
    // $zeile ist ein Array der CSV-Elemente
    print_r($zeile);
}

fclose($datei);


