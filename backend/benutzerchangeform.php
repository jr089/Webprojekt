<?php

session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
$nutzerid=$_GET ["nutzer_id"];

include ('./dbconnect.php');
$stmt = $db->query("SELECT * FROM Nutzer WHERE nutzer_id=".$nutzerid);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {

    echo '

    <form action="backend/benutzerchangedo.php" method="post">
        <input type="hidden" name="nutzer_id" value="' . $nutzerid . '">
        <br>
        Name:
        <input type="text" name="name" value="' . $row["name"] . '">
        <br>
        Vorname:
        <input type="text" name="vorname" value="' . $row["vorname"] . '">
        <br>
        Email:
        <input type="text" name="email" value="' . $row["email"] . '">
        <br>
        Straße
        <input type="text" name="strasse" value="' . $row["strasse"] . '">
        <br>
        Hausnummer:
        <input type="text" name="hausnr" value="' . $row["hausnr"] . '">
        <br>
        PLZ:
        <input type="text" name="plz" value="' . $row["plz"] . '">
        <br>
        Ort:
        <input type="text" name="ort" value="' . $row["ort"] . '">
        
        <br>
        <br>
        <input type="submit">
    </form>
 <br>
    <a href="?page=backend&action=benutzerdelete&nutzer_id='.        $nutzerid .'">Diesen Benutzer löschen</a>
';
}


?>