<?php
include("../dbconnect.php");

if (isset($_POST["Name"]) AND isset($_POST["Vorname"]) AND isset($_POST["Email"]) AND isset($_POST["Adresse"])AND isset($_POST["Passwort"])) {
    $stmt = $db->prepare("INSERT INTO Nutzer (Nutzer_ID, Name, Vorname, Email, Adresse, Passwort, Rollen_ID) VALUES ('', :Name, :Vorname, :Email, :Adresse, :Passwort, '2')");
    $stmt->bindParam(":Name", $_POST["Name"]);
    $stmt->bindParam(":Vorname", $_POST["Vorname"]);
    $stmt->bindParam(":Email", $_POST["Email"]);
    $stmt->bindParam(":Adresse", $_POST["Adresse"]);
    $stmt->bindParam(":Passwort", $_POST["Passwort"]);

    if (!$stmt->execute()) {
        echo "Datenbank-Fehler (registrieren)";
        $arr = $stmt->errorInfo();
        print_r($arr);
        die();
    }
    } else {
        echo "Formular-Fehler (registrieren)";

    }
    header("Location: ../index.php");
?>

