<?php
if (!isset($_SESSION["email"]))
{
    header("location:./index.php?page=account&action=loginform");
}
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "overview":
            include "./kasse/overview.php";
            break;
        case "erfolg":
            include "./kasse/erfolg.php";
            break;
        case "agb":
            include "./kasse/agb.php";
            break;
        case "datenschutz":
            include "./kasse/datenschutz.php";
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