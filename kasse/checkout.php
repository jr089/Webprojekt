<?php
session_start();
include "../dbconnect.php";
//check ob eingeloggt
if (isset($_SESSION['login'])) {
    //doppelter check ob eingelogt
    if ((!isset($_POST['zahlmethode'])) || (!isset($_POST['agb']))) {
        echo "AGB oder Zahlungsart nicht angegeben";
    }
    else {
        //Prüfen und Erweitern der aktuell höchsten Bestellnummer
        $sql = "SELECT MAX(bestellnummer) + 1 FROM bestellungen";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $newbn = $stmt->fetchColumn();
        echo $newbn;
        //Einfügen der Bestellungen in die Datenbank
        foreach ($_SESSION['warenkorb'] as $key => $wk) {
            $nutzerid = $_SESSION['nutzerid'];
            $artikelid = $wk['artikelid'];
            $anzahl = $wk['anzahl'];
            $zahlmethode = $_POST['zahlmethode'];
            echo $nutzerid;
            echo $artikelid;
            echo $anzahl;
            $sql = "INSERT INTO bestellungen (bestellnummer, kunde, artikel, anzahl, datum, zahlungsart)
                    VALUES ('$newbn', '$nutzerid', '$artikelid', '$anzahl', NOW(), '$zahlmethode')";
            $db->exec($sql);
        }
        //mailfunktion eingefügt
        include "./mail.php";
        //warenkob reset
        unset($_SESSION['warenkorb']);
        header('Location: ../index.php?page=kasse&action=erfolg');
    }
}
else{
   echo "Bitte vorher einloggen!";
}
?>