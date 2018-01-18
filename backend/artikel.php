<?php
session_start();

//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}

session_start();
include ('./dbconnect.php');
echo '<a href="?page=backend&action=artikelneu">Neuen Artikel anlegen</a><br><br>';
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
            <a href="?page=backend&action=artikelchange&artikelnummer='.        $artikelnummer .'">';
        echo $artikelname."<br>".$preis." €";
        echo '</a>
           </div>
        </li>
         ';
    }

?>
