<?php
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 2)
{
    header("location:./index.php");
}
session_start();
include "./dbconnect.php";
$nutzer = $_SESSION['nutzerid'];
$stmt = $db->prepare("SELECT * FROM bestellungen WHERE kunde=" .$nutzer ." GROUP BY bestellnummer" );
$stmt->execute();
    $result = $stmt->fetchAll();
echo "<div>";
    foreach($result as $row) {
        ?>
        <table>
        <tr>
        <th>Bestellnummer</th><th>Datum</th>
        </tr>
        <tr>
            <td><a href="?page=profil&action=bestellung&bn=<?=$row['bestellnummer'];?>"> <?=$row['bestellnummer'];?></a></td><td><?=$row['datum'];?></td>
        </tr>
        </table>
<?php
    }
echo "</div>";
?>