<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}

$artikelnummer=$_GET ["artikelnummer"];

include ('../dbconnect.php');
$stmt = $db->prepare("DELETE FROM artikel WHERE artikelnummer=:artikelnummer");
$stmt->bindParam(":artikelnummer", $artikelnummer);
$stmt->execute();
$filename="../artikel/artikelbilder/".$artikelnummer.'.jpg';
unlink ( $filename );
header("location:../index.php?page=backend&action=artikel")
?>