<?php
if (isset($_GET["action"]))
{

    switch ($_GET["action"]) {
        case "stifte":
            include "stifte.php";
            break;
        case "zeichnen":
            include "zeichnen.php";
            break;
        case "ordnung":
            include "ordnung.php";
            break;
        case "hefte":
            include "hefte.php";
            break;
        case "sonstiges":
            include "sonstiges.php";
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