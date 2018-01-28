<?php
        session_start();
        include "./dbconnect.php";
        if (isset($_GET['artikelnummer']))
        {
            $artikelnummer = ($_GET['artikelnummer']);

            $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$artikelnummer);
            $results = $stmt->fetch();
        }
?>

<div class="articleview">

    <div id="picture">
<img src="./artikel/artikelbilder/<?php echo $results['artikelnummer'].".jpg";?>">
    </div>
    <div id="price">
        <div id="price-content">
<?php
echo $results['name'] ."</br></br>";
echo "Preis: " .$results['preis']."€";
?>
        </div>
    </div>
    <div id="description">
        <?php
        echo "Beschreibung </br></br>";
        echo $results['beschreibung'];
        ?>
        </br></br>
<form action="./warenkorb/add.php" method="post">
<input type="hidden" name="artikelid" value="<?php echo $artikelnummer?>">
    Menge:
    <input type="number" name="anzahl" value="1" min="1">
    <input type="submit"  value="In den Warenkorb">
</form>
    </div>

</div>