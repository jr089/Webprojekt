<?php
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
session_start();

include "./dbconnect.php";
$nutzer = $_SESSION['nutzerid'];
$bn = $_GET['bn'];
$stmt = $db->prepare("SELECT a.name, a.preis, b.*, a.name AS artikelname, n.name, n.vorname, n.email, n.strasse, n.hausnr, n.plz, n.ort FROM bestellungen b INNER JOIN artikel a ON (b.artikel=a.artikelnummer) INNER JOIN Nutzer n ON (b.kunde=n.nutzer_id) WHERE b.artikel=a.artikelnummer AND b.bestellnummer=" .$bn);
$stmt->execute();
$result = $stmt->fetchAll();
$vorname = $result['0']['vorname'];
$name = $result['0']['name'];
$email = $result['0']['email'];
$strasse = $result['0']['strasse'] .$result['0']['hausnr'];
$stadt = $result['0']['plz'] ." " .$result['0']['ort'];
$zahlung = $result['0']['zahlungsart'];
echo "<div>
<h3>Hallo, hier sehen Sie die Artikel aus der Bestellung: ".$bn ." vom " .$result['0']['datum'] ." </h3>
<br>
<table>
        <tr>
            <th>Artikel</th><th>Anzahl</th><th>Preis</th>
        </tr>";
foreach($result as $row) {
    $add = ($row['preis'] * $row['anzahl']);
    $preisgesamt = $preisgesamt + $add;
    ?>
    <tr>
        <td><a href="?page=artikel&artikelnummer=<?php echo $row['artikelnummer']?>">
                <?=$row['artikelname'];?>
            </a></td><td><?=$row['anzahl'];?></td>
        <td><?=$row['preis'];?></td
    </tr>
    <?php
}?>
</table> <br>
Der Gesamtwert der Bestellung beträgt:  <?=$preisgesamt;?> €
<br><br>
Kundeninformationen <br>
Vorname: <?=$vorname;?> <br>
Name: <?=$name;?> <br>
Adresse: <?=$strasse;?> <br>
<?=$stadt;?> <br>
Zahlungsart: <?=$zahlung;?>


</div>