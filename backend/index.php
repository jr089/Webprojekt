<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "bestellungen":
            include "kundenbestellungen.php";
            break;
        case "bestellung":
            include "kundenbestellung.php";
            break;
        case "artikel":
            include "artikel.php";
            break;
        case "artikelchange":
            include "artikelchangeform.php";
            break;
        case "artikelneu":
            include "artikelneu.php";
            break;
        case "benutzer":
            include "benutzer.php";
            break;
        case "changeu":
            include "benutzerchangeform.php";
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