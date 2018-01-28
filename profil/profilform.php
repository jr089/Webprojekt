<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 2)
{
    header("location:./index.php");
}

            include_once "./dbconnect.php";
            $email = $_SESSION["email"];
        $stmt=$db->query("SELECT * FROM Nutzer WHERE email='".$email."'");
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {

    echo '

    <form action="profil/profildo.php" method="post">
        <input type="hidden" name="nutzer_id" value="' .$row["nutzer_id"] .'">
        Name:
        <input type="text" name="name" value="' . $row["name"] . '">
        <br>
        Vorname:
        <input type="text" name="vorname" value="' . $row["vorname"] . '">
        <br>
        Straße:
        <input type="text" name="strasse" value="' . $row["strasse"] . '">
        <br>
        Hausnummer:
        <input type="number" name="hausnr" value="' . $row["hausnr"] . '">
        <br>
        PLZ:
        <input type="number" name="plz" value="' . $row["plz"] . '">
        <br>
        Ort:
        <input type="text" name="ort" value="' . $row["ort"] . '">
        <br>
        <br>
        <input type="submit">
        <br>
        <br>
        <a href="?page=profil&action=passwortchange">Passwort ändern</a>
    </form>

';
}