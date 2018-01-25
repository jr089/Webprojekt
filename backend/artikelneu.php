<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
include ("./dbconnect.php");

echo'

<form action="artikelneudo.php" method="post"> 
    <input type="text" name="name" placeholder="Artikelbezeichnung">
    <br>
    <input type="text" name="preis" placeholder="Preis">
    <br>
    <input type="text" name="ean" placeholder="EAN-Nummer">
    <br>
    <input type="text" name="bestand" placeholder="Bestand">
    <br>
    <input type="text" name="beschreibung" placeholder="Beschreibung">
    <br>
    <input type="text" name="kategorie_id" placeholder="Kategorie ID">
    <br>
    <br>
    <input type="submit" name="Artikel erstellen">
</form>';