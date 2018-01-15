<?php
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
        <input type="text" name="name" value="' . $row["name"] . '">
        <input type="text" name="vorname" value="' . $row["vorname"] . '">
        <input type="text" name="email" value="' . $row["email"] . '">
        <input type="text" name="strasse" value="' . $row["strasse"] . '">
        <input type="text" name="hausnr" value="' . $row["hausnr"] . '">
        <input type="text" name="plz" value="' . $row["plz"] . '">
        <input type="text" name="ort" value="' . $row["ort"] . '">
        <input type="submit">
        
        <a href="passwortchangeform.php">Passwort ändern</a>
    </form>

';
}