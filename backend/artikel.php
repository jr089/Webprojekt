<?php



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
            <a href="artikelchangeform.php?artikelnummer='.        $artikelnummer .'">';
        echo $artikelname."<br>".$preis." €";
        echo '</a>
           </div>
        </li>
         </ul>';
    }

?>
