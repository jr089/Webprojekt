<?php

include ('../dbconnect.php');

$artikelnummer = $_POST ["artikelnummer"];
$name = $_POST["name"];
$preis = $_POST["preis"];
$beschreibung = $_POST["beschreibung"];


if (!empty($name) && !empty($preis) && !empty($beschreibung)) {
    //echo "UPDATE artikel SET name= ' $name ', preis=  $preis , beschreibung= ' $beschreibung ' WHERE artikelnummer =   $artikelnummer ";
    $stmt = $db->query("UPDATE artikel SET name= ' $name ', preis=  $preis , beschreibung= ' $beschreibung ' WHERE artikelnummer =   $artikelnummer ");
    $stmt->execute();
    header("Location: artikel.php");

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
