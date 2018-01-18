<?php
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 2)
{
    header("location:./index.php");
}
session_start();
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
        
        <a href="passwortchangeform.php">Passwort ändern</a>
    </form>

';
}