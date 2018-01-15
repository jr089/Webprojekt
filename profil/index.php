<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "ansehen":
            include "bestellungenall.php";
            break;
        case "bestellung":
            include "bestellung.php";
            break;
        case "verwalten":
            include "verwalten.php";
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