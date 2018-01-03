<?php
session_start();
include "./dbconnect.php";
if (isset($_SESSION['warenkorb']))
{
    ?>
    <div>
            <table>
                <tr>
                    <th>Artikel</th>
                    <th>Preis</th>
                    <th>Anzahl</th>
                </tr>
                <?php
                foreach ($_SESSION['warenkorb'] as $key => $wk){
                    $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$wk['artikelid']);
                    $results = $stmt->fetch();
                    ?>
                    <tr>
                        <td><a href="?page=artikel&artikelnummer=<?php echo $results['artikelnummer']?>">
                                <?=$results['name'];?>
                            </a></td>
                        <td><?=$results['preis'];?></td>
                        <td><?=$wk['anzahl'];?></td>
                    </tr>
            </table>
                    <?php } ?>
        <form action="./kasse/checkout.php" method="post">
            </br>
            <fieldset>
                <input type="radio" id="vk" name="zahlmethode" value="vorkasse" required>
                <label for="mc"> Vorkasse</label>
                <input type="radio" id="nn" name="zahlmethode" value="nachnahme">
                <label for="vi"> Nachnahme</label>
            </fieldset>
            </br>
            <fieldset>
                <input type="radio" id="agb" name="agb" value="agb" required>
                <label for="mc"> Hiermit akzeptieren Sie die allgemeinen AGBS und unsere Datenschutzbestimmungen</label>
            </fieldset>
            </br>
            <input type="submit" value="checkout">
        </form>
    </div>
<?php }
else
{ ?>
    <div>
        <h3>Keine Artikel im Warenkorb</h3>
        <form>
            <input type="button" value="zurück zur Startseite" onclick="window.location.href='?'"/>
        </form>
    </div><?php } ?>