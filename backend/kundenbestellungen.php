<?php
//Berechtigung vorhanden?
if (!isset($_SESSION["email"]) || $_SESSION["rollen_id"] == 1)
{
    header("location:./index.php");
}
session_start();
include "./dbconnect.php";
$nutzer = $_SESSION['nutzerid'];
$stmt = $db->prepare("SELECT * FROM bestellungen GROUP BY bestellnummer" );
$stmt->execute();
$result = $stmt->fetchAll();
echo "<div><table>        
        <tr>
            <th>Bestellnummer</th><th>Datum</th>
        </tr>";
foreach($result as $row) {
    ?>
        <tr>
            <td><a href="?page=backend&action=bestellung&bn=<?=$row['bestellnummer'];?>"> <?=$row['bestellnummer'];?></a></td><td><?=$row['datum'];?></td>
        </tr>
    <?php
}
echo "</table></div>";
?>