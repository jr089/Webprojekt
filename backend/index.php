<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "bestellungen":
            include "bestellungen.php";
            break;
        case "artikel":
            include "artikel.php";
            break;
        case "benutzer":
            include "benutzer.php";
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