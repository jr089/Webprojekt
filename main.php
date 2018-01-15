<div class="article-ueberschrift">
    <h3>Vorgestellte Artikel</h3>
</div>

<ul class="flex-container">
<?php
include_once "dbconnect.php";
for($i=1; $i<=5; $i++){
$nr = rand(1,80);
    $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=" . $nr);
    $results = $stmt->fetchAll();

    foreach ($results as $rowkategorie) {
        $artikelname = $rowkategorie['name'];
        $preis = $rowkategorie['preis'];
        $artikelnummer = $rowkategorie ['artikelnummer'];
        $pfad = $rowkategorie['bildpfad'];
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
                <?php echo $preis ?>
                €
            </div>
        </li>
        <?php } } ?>
</ul>