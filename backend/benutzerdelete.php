<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}

$nutzerid=$_GET ["nutzer_id"];

include ('./dbconnect.php');
$stmt = $db->query("SELECT * FROM Nutzer WHERE nutzer_id=" . $nutzerid);
$stmt->execute();
$results=$stmt->fetch();
$name=$results["name"];
$vorname=$results["vorname"];

//Erneute Abfrage zur Sicherheit
echo "Wollen Sie den Benutzer $vorname $name wirklich löschen?";
echo "<br><br>";
echo '<a href="backend/benutzerdeletedo.php?nutzer_id='.        $nutzerid .'">Ja, Benutzer löschen.</a>
        <br>
        <br>
      <a href="?page=backend&action=benutzer">Nein, zurück zur Benutzerübersicht.</a>';

?>