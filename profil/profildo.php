<?php
session_start();
include ('../dbconnect.php');

$nutzer_id = $_POST["nutzer_id"];
$name = $_POST ["name"];
$vorname = $_POST["vorname"];
$email = $_POST["email"];
$strasse = $_POST["strasse"];
$hausnr = $_POST["hausnr"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];


if (!empty($name) && !empty($vorname) && !empty($strasse)&& !empty($hausnr)&& !empty($plz)&& !empty($ort)) {

    $stmt = $db->query("UPDATE Nutzer SET name= '$name', vorname=  '$vorname' , strasse= '$strasse', hausnr= '$hausnr', plz= '$plz', ort= '$ort' WHERE nutzer_id =  '$nutzer_id'");
    $stmt->execute();
    header("Location: ../index.php");

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
