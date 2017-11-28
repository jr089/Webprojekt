<?php
        session_start();
        include "./dbconnect.php";
        if (isset($_GET["an"]))
        {
            $Artikelnummer =($_GET["an"]);

            $stmt=$db->prepare("SELECT * FROM Artikel WHERE Artikelnummer=:Artikelnummer");
            $stmt->bindParam(":Name", $artikelname);
            $stmt->bindParam(":Beschreibung", $beschreibung);
            $stmt->bindParam(":EAN", $ean);
            $stmt->bindParam(":Preis", $preis);
            $stmt->execute();
        }
/*if (isset($_GET["action"]))
{

    switch ($_GET["action"]) {
        case "stifte":
            include "stifte.php";
            break;
        case "zeichnen":
            include "zeichnen.php";
            break;
        case "ordnung":
            include "ordnung.php";
            break;
        case "hefte":
            include "hefte.php";
            break;
        case "sonstiges":
            include "sonstiges.php";
            break;
        default:
            echo "Seite nicht gefunden";
            die();
            break;


    }

}
else
{
    echo "Seite nicht gefunden";
}
*/?>

<div class="articleview">

    <div id="picture">

    </div>
    <div id="price">
        <div id="price-content">
<?php
echo $artikelnummer ."</br>" .$preis;
?>
        </div>
    </div>
    <div id="description">

    </div>

</div>
