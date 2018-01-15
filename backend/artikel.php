<?php

/*echo'
    <head>
        <meta charset="UTF-8">
        <title>Jukian Schreibwaren</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>';*/

include ('./dbconnect.php');
echo '<a href=backend/artikelneu.php>Neuen Artikel anlegen</a><br><br>';
$stmt = $db->query("SELECT * FROM artikel");
$stmt->execute();
$results = $stmt->fetchAll();

echo '<ul class="flex-container">';

    foreach ($results as $row) {
        $artikelname = $row['name'];
        $artikelnummer = $row ['artikelnummer'];
        $preis = $row ['preis'];

        echo '<li class="flex-item">

        <div class="mini-beschreibung">
            <a href="backend/artikelchangeform.php?artikelnummer='.        $artikelnummer .'">';
        echo $artikelname."<br>".$preis." €";
        echo '</a>
           </div>
        </li>
         </ul>';
    }

?>
