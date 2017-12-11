<?php
session_start();
$anzahl = $_POST['anzahl'];
$artikelid = $_POST['artikelid'];

echo $anzahl;
echo $artikelid;

$_SESSION['warenkorb'][] = array("$anzahl", "$artikelid");

print_r($_SESSION['warenkorb']);
?>
