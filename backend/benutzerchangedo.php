<?php

include ('../dbconnect.php');

$nutzer_id = $_POST ["nutzer_id"];
$name = $_POST["name"];
$vorname = $_POST["vorname"];
$email = $_POST["email"];
$adresse = $_POST["adresse"];
$passwort = $_POST["passwort"];


if (!empty($name) && !empty($vorname) && !empty($email) && !empty($adresse) && !empty($passwort)) {
    //echo "UPDATE nutzer SET name= ' $name ', vorname= ' $vorname' , email= ' $email ', adresse= ' $adresse ', passwort= ' $passwort ' WHERE nutzer_id =   $nutzer_id ";
    $stmt = $db->query("UPDATE nutzer SET name= ' $name ', vorname=  $vorname , email= ' $email ' , adresse= ' $adresse ' , passwort= ' $passwort ' WHERE nutzer_id =   $nutzer_id ");
    $stmt->execute();
    header("Location: benutzer.php");

} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
