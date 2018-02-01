<?php

$sendermail_antwort = true;
$name_emailfeld = $_POST["Email"];

$empfaenger = "jukian.webshop@yandex.com";
$betreff = "Neue Kontaktanfrage";


//Diese Felder werden nicht in der Mail stehen
$ignore_fields = array('submit');


$jahr = date("Y");
$n = date("d");
$monat = date("m");
$time = date("H:i");

//Hier wird Mail generiert
$msg = ":: Gesendet am $n.$monat.$jahr - $time Uhr ::\n\n";


while (list($name,$value) = each($_POST)) {
    if (in_array($name, $ignore_fields)) {
        continue;
    }
    $msg .= "$name:\n$value\n\n";
}


if (isset($_POST["Name"]) AND isset($_POST["Email"]) AND isset($_POST["Betreff"]) AND isset($_POST["Nachricht"])){
    if (!empty($_POST["Name"])&&!empty($_POST["Email"])&&!empty($_POST["Betreff"])&&!empty($_POST["Nachricht"])) {


        $header = "From: $name_emailfeld";


        $mail_senden = mail($empfaenger, $betreff, $msg, $header);


        header("Location: ../index.php?page=footer&action=erfolg");
        exit();
    }

    else{
        header("Location: ../index.php?page=footer&action=fehler");
        exit();
        }
}

else{
    header("Location: ../index.php?page=footer&action=fehler");
    exit();
}
?>