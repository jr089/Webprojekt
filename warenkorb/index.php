<?php
session_start();
include "./dbconnect.php";
if (isset($_SESSION['warenkorb']))
{
?>
<div>
    <form action="./warenkorb/updatewk.php" method="post">
    <table>
    <tr>
        <th>ID</th>
        <th>Artikel</th>
        <th>Preis</th>
        <th>Anzahl</th>
        <th>Löschen</th>
    </tr>
<?php
$preisgesammt = 0;
foreach ($_SESSION['warenkorb'] as $key => $wk){
    $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$wk['artikelid']);
    $results = $stmt->fetch();
    $add = ($results['preis'] * $wk['anzahl']);
    $preisgesammt = $preisgesammt + $add;
    $ref = $key;
?>
    <tr>
        <td><?=$key;?></td>
        <td><a href="?page=artikel&artikelnummer=<?php echo $results['artikelnummer']?>">
                <?=$results['name'];?>
            </a></td>
        <td><?=$results['preis'];?></td>
        <td><input type="number" name="anzahl[<?=$ref;?>]" value="<?=$wk['anzahl'];?>" min="1"</td>
        <td><input type="checkbox" name="delete[]" value="<?=$key;?>"></td>
        <input type="hidden" name="ref[]" value="<?=$ref;?>"
    </tr>
<?php } ?>
    </table>
        <?php echo "Der Gesamtbetrag des Warenkorbs beträgt momentan: " .$preisgesammt ."€"; ?>
        </br>
        <input type="submit" value="aktualisieren">
    </form>

</div>
    <form action="?page=kasse&action=overview" method="post">
        <input type="submit" value="Kasse">
    </form>
<?php
}
else
    { ?>
<div>
<h3>Keine Artikel im Warenkorb</h3>
<form>
<input type="button" value="zurück zur Startseite" onclick="window.location.href='?'"/>
</form>
</div><?php } ?>