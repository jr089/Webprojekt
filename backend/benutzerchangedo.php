<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
include ('../dbconnect.php');

$nutzerid = $_POST ["nutzer_id"];
$name = $_POST["name"];
$vorname = $_POST["vorname"];
$email = $_POST["email"];
$strasse = $_POST['strasse'];
$hausnr = $_POST['hausnr'];
$plz = $_POST['plz'];
$ort = $_POST['ort'];



if (!empty($name) && !empty($vorname) && !empty($email) && !empty($strasse) && !empty($hausnr) && !empty($plz) && !empty($ort)) {

    $stmt = $db->prepare("UPDATE Nutzer SET name=:name, vorname=:vorname, email=:email , strasse=:strasse ,hausnr=:hausnr, plz=:plz , ort=:ort WHERE nutzer_id =:nutzer_id ");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":vorname", $vorname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":strasse", $strasse);
    $stmt->bindParam(":hausnr", $hausnr);
    $stmt->bindParam(":plz", $plz);
    $stmt->bindParam(":ort", $ort);
    $stmt->bindParam(":nutzer_id", $nutzerid);
    $stmt->execute();
    header("Location: ../index.php?page=backend&action=benutzer");

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

?>