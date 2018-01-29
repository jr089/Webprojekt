<?php
if (isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "loginform":
            include "loginform.php";
            break;
        case "registerform":
            include "registerform.php";
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