<?php
session_start();
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}

include ('./dbconnect.php');

$stmt = $db->query("SELECT * FROM Nutzer");
$stmt->execute();
$results = $stmt->fetchAll();

echo '<ul class="flex-container">';

foreach ($results as $row) {
    $nutzer_id = $row['nutzer_id'];
    $name = $row['name'];
    $vorname = $row['vorname'];
    $email = $row['email'];
    $strasse = $row['strasse'];
    $hausnr = $row['hausnr'];
    $plz = $row['plz'];
    $ort = $row['ort'];


    echo '<li class="flex-item">

        <div class="mini-beschreibung">
            <a href="?page=backend&action=changeu&nutzer_id='.$nutzer_id.'">';
    echo $name.", ".$vorname."<br>".$email."<br>".$strasse." ".$hausnr."<br>".$plz." ".$ort;
    echo '</a>
           </div>
        </li>';
}

?>