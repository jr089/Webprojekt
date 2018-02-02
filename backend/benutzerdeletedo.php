<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}

$nutzerid=$_GET ["nutzer_id"];

include ('../dbconnect.php');
$stmt = $db->prepare("DELETE FROM Nutzer WHERE nutzer_id=:nutzer_id");
$stmt->bindParam(":nutzer_id", $nutzerid);
$stmt->execute();

header("location:../index.php?page=backend&action=benutzer")
?>