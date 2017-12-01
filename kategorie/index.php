<?php
include ('././dbconnect.php');
if (isset($_GET['action']))
    switch ($_GET["action"]) {
        case "stifte":
            $id = 1;
            break;
        case "zeichnen":
            $id = 2;
            break;
        case "ordnung":
            $id = 3;
            break;
        case "hefte":
            $id = 4;
            break;
        case "sonstiges":
            $id = 5;
            break;
    }
if (isset($id)) {
    $stmt = $db->query("SELECT * FROM artikel WHERE kategorie_id=" . $id);
    $results = $stmt->fetchAll();
    ?>
<ul class="flex-container">
    <?php
    foreach ($results as $rowkategorie) {
        $artikelname = $rowkategorie['name'];
        $preis = $rowkategorie['preis'];
        $artikelnummer = $rowkategorie ['artikelnummer'];
        ?>
    <li class="flex-item">
        <a href="#">
            <img src="#">
        </a>
        <div class="mini-beschreibung">
            <a href="?page=artikel&artikelnummer=<?php echo $artikelnummer?>">
               <?php echo $artikelname ?>
            </a>
            </br>
            Preis:
            <?php echo $preis ?>
             €
        </div>

    </li>
    <?php
    }
}?>