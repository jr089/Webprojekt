<?php
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
include ('./dbconnect.php');

$stmt = $db->query("SELECT * FROM Bestellungen");
$stmt->execute();
$results = $stmt->fetchAll();

echo '<ul class="flex-container">';

/*foreach ($results as $row) {
    $artikelname = $row['name'];
    $abestellnummer = $row ['bestellnummer'];
    $preis = $row ['preis'];

    echo '<li class="flex-item">

        <div class="mini-beschreibung">
            <a href="artikelchangeform.php?bestellnummer='.        $bestellnummer .'">';
    echo $artikelname."<br>".$preis." €";
    echo '</a>
           </div>
        </li>
         </ul>';*/
}

?>
