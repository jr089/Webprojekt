<?php
session_start();
include "../dbconnect.php";

foreach($_SESSION'warenkorb'[] as ){
    $stmt = $db->query("SELECT * FROM artikel WHERE artikelnummer=".$artikelnummer);
    $results = $stmt->fetch();

    echo $results['name'];
    echo $results['preis'];
}
?>
