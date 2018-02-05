<?php
//Umwandlung Post in Session Variable
if (!isset($_SESSION["email"]))
{
    header("location:./index.php");
}
session_start();
include "../dbconnect.php";
$anzahl = $_POST['anzahl'];
$artikelid = $_POST['artikelid'];

$_SESSION['warenkorb'][] = array('artikelid' => "$artikelid", 'anzahl' => "$anzahl");
header('Location: ../index.php?page=warenkorb');
?>
