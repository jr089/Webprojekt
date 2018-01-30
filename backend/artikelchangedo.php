<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
include ('../dbconnect.php');
$artikelnummer = $_POST["artikelnummer"];
$name = $_POST["name"];
$preis = $_POST["preis"];
$beschreibung = $_POST["beschreibung"];
if (!empty($name) && !empty($preis) && !empty($beschreibung)) {
    $stmt = $db->query("UPDATE artikel SET name='$name', preis=$preis, beschreibung='$beschreibung' WHERE artikelnummer =   $artikelnummer ");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":preis", $preis);
    $stmt->bindParam(":beschreibung", $beschreibung);
    $stmt->execute();
    header("Location: ../index.php?page=backend&action=artikel");
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
?>