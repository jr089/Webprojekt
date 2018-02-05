<?php

$sendermail_antwort = true;
$email = $_POST["Email"];

$empfaenger = "jukian.webshop@yandex.com";
$betreff = "Neue Kontaktanfrage";


$jahr = date("Y");
$n = date("d");
$monat = date("m");
$time = date("H:i");

//Hier wird Mail generiert
$msg = ":: Gesendet am $n.$monat.$jahr - $time Uhr ::\n\n";


$msg .= "Name: "."\n".$_POST["Name"]."\n\n";
$msg .= "E-Mail: "."\n".$_POST["Email"]."\n\n";
$msg .= "Betreff: "."\n".$_POST["Betreff"]."\n\n";
$msg .= "Nachricht: "."\n".$_POST["Nachricht"]."\n\n";



if (isset($_POST["Name"]) AND isset($_POST["Email"]) AND isset($_POST["Betreff"]) AND isset($_POST["Nachricht"])){
    if (!empty($_POST["Name"])&&!empty($_POST["Email"])&&!empty($_POST["Betreff"])&&!empty($_POST["Nachricht"])) {


        $header = "From: $email";


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