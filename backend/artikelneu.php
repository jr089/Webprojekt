<?php
include ("../dbconnect.php");

echo'

<form action="artikelneudo.php" method="post"> 
    <input type="text" name="name" placeholder="Artikelbezeichnung">
    <input type="text" name="preis" placeholder="Preis">
    <input type="text" name="ean" placeholder="EAN-Nummer">
    <input type="text" name="bestand" placeholder="Bestand">
    <input type="text" name="beschreibung" placeholder="Beschreibung">
    <input type="text" name="kategorie_id" placeholder="Kategorie ID">
    <input type="submit" name="Artikel erstellen">
</form>';