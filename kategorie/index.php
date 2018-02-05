<?php
include ('./dbconnect.php');
if (isset($_GET['action']))
    switch ($_GET["action"]) {
        case "stifte":
            $id = 1;
            $kat = "Stifte";
            break;
        case "zeichnen":
            $id = 2;
            $kat = "Zeichnen";
            break;
        case "ordnung":
            $id = 3;
            $kat = "Ordnung";
            break;
        case "hefte":
            $id = 4;
            $kat = "Hefte";
            break;
        case "sonstiges":
            $id = 5;
            $kat = "Sonstiges";
            break;
    }
if (isset($id)) {
    $stmt = $db->query("SELECT * FROM artikel WHERE kategorie_id=" .$id);
    $results = $stmt->fetchAll();
    ?>
    <div class="article-ueberschrift">
    <h3><?=$kat;?></h3>
</div>
<ul class="flex-container">
    <?php
    //Prüfen der übergebenen Kategorieid und Ausgabe der Artikel mit der ID
    foreach ($results as $rowkategorie) {
        $artikelname = $rowkategorie['name'];
        $preis = $rowkategorie['preis'];
        $artikelnummer = $rowkategorie ['artikelnummer'];
        $pfad = $rowkategorie['artikelnummer'].".jpg";
        ?>
    <li class="flex-item">
        <a href="?page=artikel&artikelnummer=<?php echo $artikelnummer?>">
            <img src="./artikel/artikelbilder/<?=$pfad;?>">
        </a>
        <div class="mini-beschreibung">
            <a href="?page=artikel&artikelnummer=<?php echo $artikelnummer?>">
               <?php echo $artikelname ?>
            </a>
            </br>
            Preis:
            <?php echo $preis ?>€
        </div>

    </li>
    <?php
    }
}?>