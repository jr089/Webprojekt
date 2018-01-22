<?php

if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "datenschutz":
            include "datenschutz.php";
            break;
        case "impressum":
            include "impressum.php";
            break;
        case "kontakt":
            include "kontakt.php";
            break;
        case "erfolg":
            include "erfolg.php";
            break;
        case "fehler";
            include "fehler.php";
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