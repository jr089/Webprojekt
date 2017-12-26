<?php

/*echo'
    <head>
        <meta charset="UTF-8">
        <title>Jukian Schreibwaren</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>';*/

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
    $passwort = $row['passwort'];

    echo '<li class="flex-item">

        <div class="mini-beschreibung">
            <a href="?page=backend&action=changeu&nutzer_id='.$nutzer_id.'">';
    echo $name.", ".$vorname."<br>".$email."<br>".$strasse." ".$hausnr."<br>".$plz." ".$ort."<br>".$passwort;
    echo '</a>
           </div>
        </li>
         </ul>';
}

?>