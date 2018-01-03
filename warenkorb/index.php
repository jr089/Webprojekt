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
foreach ($_SESSION['warenkorb'] as $key => $wk){
    $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$wk['artikelid']);
    $results = $stmt->fetch();
?>
    <tr>
        <td><?=$key;?></td>
        <td><a href="?page=artikel&artikelnummer=<?php echo $results['artikelnummer']?>">
                <?=$results['name'];?>
            </a></td>
        <td><?=$results['preis'];?></td>
        <td><?=$wk['anzahl'];?></td>
        <td><input type="checkbox" name="delete[]" value="<?=$key;?>"></td>
    </tr>
<?php }/*echo $results['name'] ."</br></br>";
    echo $results['preis'] ."</br></br>";*/?>
    </table>
        <input type="submit" value="aktualisieren">
    </form>
</div>
    <form action="?page=overview" method="post">
        <input type="submit" value="Kasse">
    </form>
<?php }
else
    { ?>
<div>
<h3>Keine Artikel im Warenkorb</h3>
<form>
<input type="button" value="zurück zur Startseite" onclick="window.location.href='?'"/>
</form>
</div><?php } ?>