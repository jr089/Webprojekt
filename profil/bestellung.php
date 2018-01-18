<?php
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 2)
{
    header("location:./index.php");
}
session_start();
include "./dbconnect.php";
$nutzer = $_SESSION['nutzerid'];
$bn = $_GET['bn'];
$stmt = $db->prepare("SELECT a.name, a.preis, b.*, a.name AS artikelname, n.name, n.vorname FROM bestellungen b INNER JOIN artikel a ON (b.artikel=a.artikelnummer) INNER JOIN Nutzer n ON (b.kunde=n.nutzer_id) WHERE b.artikel=a.artikelnummer AND b.bestellnummer=" .$bn ." AND b.kunde=" .$nutzer);
$stmt->execute();
$result = $stmt->fetchAll();
echo "<div>
<h3>Hallo " .$result['0']['vorname'] ." ".$result['0']['name'] .", hier sehen Sie die Artikel aus der Bestellung: ".$bn ." vom " .$result['0']['datum'] ." </h3>
<br>
<table>
        <tr>
            <th>Artikel</th><th>Anzahl</th><th>Preis</th>
        </tr>";
foreach($result as $row) {
    $add = ($row['preis'] * $row['anzahl']);
    $preisgesammt = $preisgesammt + $add;
    ?>
        <tr>
            <td><a href="?page=artikel&artikelnummer=<?php echo $row['artikel']?>">
                    <?=$row['artikelname'];?>
                </a></td><td><?=$row['anzahl'];?></td>
            <td><?=$row['preis'];?></td
        </tr>
    <?php
}
echo "</table>";
echo "Der Gesamtwert der Bestellung beträgt: " .$preisgesammt;
echo "<br> ";
echo "</div>";
?>