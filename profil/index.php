<?php
if (!isset($_SESSION["email"]))
{
    header("location:./index.php");
}
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "ansehen":
            include "bestellungenall.php";
            break;
        case "bestellung":
            include "bestellung.php";
            break;
        case "profilform":
            include "profilform.php";
            break;
        default:
            echo "Seite nicht gefunden";
            die();
            break;
    }
}
else
{
    echo "Seite nicht gefunden";
}