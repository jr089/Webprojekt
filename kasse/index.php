<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "overview":
            include "./kasse/overview.php";
            break;
        case "erfolg":
            include "./kasse/erfolg.php";
            break;
        default:
            echo "Seite nicht gefunden";
            die();
            break;
    }
}
else
{
    echo "Seite nicht gefunden";}