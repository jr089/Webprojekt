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
    $nutzer_id = $row['Nutzer_ID'];
    $name = $row['Name'];
    $vorname = $row['Vorname'];
    $email = $row['Email'];
    $adresse = $row['Adresse'];
    $passwort = $row['Passwort'];

    echo '<li class="flex-item">

        <div class="mini-beschreibung">
            <a href="?page=backend&action=changeu&nutzer_id='.$nutzer_id.'">';
    echo $name." ".$vorname."<br>".$email."<br>".$adresse."<br>".$passwort;
    echo '</a>
           </div>
        </li>
         </ul>';
}

?>