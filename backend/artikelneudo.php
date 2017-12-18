<?php

include ("../dbconnect.php");

$name = $_POST ["name"];
$preis = $_POST["preis"];
$beschreibung = $_POST["beschreibung"];
$ean = $_POST ["ean"];
$bestand = $_POST ["bestand"];

if (!empty($name) && !empty($preis) && !empty($beschreibung) &&!empty($ean) &&!empty($bestand)) {
    $stmt = $db->query("INSERT INTO artikel SET artikelnummer= NULL , name=  '$name' , preis=  '$preis' , beschreibung= ' $beschreibung ',  ean= '$ean ', bestand= ' $bestand'");
    $stmt->execute();
    header("Location: artikel.php");

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
