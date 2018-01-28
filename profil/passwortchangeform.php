<?php
session_start();

//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 2)
{
    header("location:./index.php");
}

include_once "./dbconnect.php";


    echo '

    <form action="profil/passwortchangedo.php" method="post">
        Altes Passwort eingeben:
        <input type="password" name="passwortalt">
        <br>
        Neues Passwort:
        <input type="password" name="passwortneu">
        <br>
        Neues Passwort bestätigen:
        <input type="password" name="passwortneu2">
        <br>
        <br>
        <input type="submit" name="submit" value="Passwort ändern">
        
    </form>';