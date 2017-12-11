<?php
$artikelnummer=$_GET ["artikelnummer"];

include ('../dbconnect.php');
$stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$artikelnummer);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {

    echo '

    <form action="artikelchangedo.php" method="post">
        <input type="hidden" name="artikelnummer" value="' . $artikelnummer . '">
        <input type="text" name="name" value="' . $row["name"] . '">
        <input type="text" name="preis" value="' . $row["preis"] . '">
        <input type="text" name="beschreibung" value="' . $row["beschreibung"] . '">
        <input type="submit">
    </form>

';
}


?>