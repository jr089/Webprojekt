<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
include ("../dbconnect.php");

$name = $_POST["name"];
$preis = $_POST["preis"];
$beschreibung = $_POST["beschreibung"];
$ean = $_POST["ean"];
$bestand = $_POST["bestand"];
$kategorie = $_POST["kategorie_id"];

if (!empty($name) && !empty($preis) && !empty($beschreibung) &&!empty($ean) &&!empty($bestand) &&!empty($kategorie)) {
    $sql= "INSERT INTO artikel SET artikelnummer='NULL',  name='".$name."', preis='".$preis."', beschreibung='".$beschreibung."',  ean='".$ean."', bestand='".$bestand."', kategorie_id='".$kategorie."'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":preis", $preis);
    $stmt->bindParam(":beschreibung", $beschreibung);
    $stmt->bindParam(":ean", $ean);
    $stmt->bindParam(":bestand", $bestand);
    $stmt->bindParam(":kategorie_id", $kategorie);
    header("Location: artikel.php");

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
