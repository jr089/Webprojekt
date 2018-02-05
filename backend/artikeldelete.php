<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}

$artikelnummer=$_GET ["artikelnummer"];

include ('./dbconnect.php');
    $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=" . $artikelnummer);
    $stmt->execute();
    $results=$stmt->fetch();
    $name=$results["name"];

echo "Wollen Sie den Artikel $name wirklich löschen?";
echo "<br><br>";
echo '<a href="backend/artikeldeletedo.php?artikelnummer='.        $artikelnummer .'">Ja, Artikel löschen.</a>
        <br>
        <br>
      <a href="?page=backend&action=artikel">Nein, zurück zur Artikelübersicht.</a>';

?>