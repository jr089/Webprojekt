<?php
if (isset($_GET["action"]))
{

    switch ($_GET["action"]) {
        case "loginform":
            include "loginform.php";
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