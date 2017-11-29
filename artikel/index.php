<?php
        session_start();
        include "././dbconnect.php";
        if (isset($_GET['artikelnummer']))
        {
            $artikelnummer = ($_GET['artikelnummer']);

            $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$artikelnummer);
            $results = $stmt->fetch();
        }
?>

<div class="articleview">

    <div id="picture">

    </div>
    <div id="price">
        <div id="price-content">
<?php
echo $results['name'] ."</br></br>";
echo "Preis: " .$results['preis'];
?>
        </div>
    </div>
    <div id="description">
        <?php
        echo "Beschreibung </br></br>";
        echo $results['beschreibung'];
        ?>
    </div>

</div>