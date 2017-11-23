<?php
if (isset($_GET["action"]))
{

    switch ($_GET["action"]) {
        case "ansehen":
            include "ansehen.php";
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