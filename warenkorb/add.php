<?php
if (!isset($_SESSION["email"]))
{
    header("location:./index.php");
}
session_start();
include "../dbconnect.php";
$anzahl = $_POST['anzahl'];
$artikelid = $_POST['artikelid'];

//echo $anzahl;
//echo $artikelid;

$_SESSION['warenkorb'][] = array('artikelid' => "$artikelid", 'anzahl' => "$anzahl");
//print_r($_SESSION['warenkorb']);
header('Location: ../index.php?page=warenkorb');
?>
