<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
$artikelnummer=$_GET ["artikelnummer"];
include ('./dbconnect.php');
$stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$artikelnummer);
$stmt->execute();
$results = $stmt->fetchAll();
foreach ($results as $row) {
    echo '
    <form action="backend/artikelchangedo.php" method="post">
        <input type="hidden" name="artikelnummer" value="' . $artikelnummer . '">
        <br>
        <input type="text" name="name" value="' . $row["name"] . '">
        <br>
        <input type="text" name="preis" value="' . $row["preis"] . '">
        <br>
        <input type="text" name="beschreibung" value="' . $row["beschreibung"] . '">
        <br>
        <br>
        <input type="submit">
    </form>
    <br>
    <a href="?page=backend&action=artikeldelete&artikelnummer='.        $artikelnummer .'">Diesen Artikel löschen</a>
';
}
?>
