<?php

if (isset($_POST["login"]) AND isset($_POST["passwort"]))
{

    $passwort=($_POST["passwort"]);
    $stmt=$db->prepare("SELECT * FROM Login WHERE login=:login AND passwort=:passwort");
    $stmt->bindParam(":login", $_POST["login"]);
    $stmt->bindParam(":passwort", $passwort );
    if(!$stmt->execute()) {
        echo "Datenbank-Fehler (S01)";
        $arr = $stmt->errorInfo();
        print_r($arr);
        die();
    }

    if (!$row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "Nutzer nicht gefunden";
        die();
    }
    else
    {
        $_SESSION["login"]=$row["login"];
        $_SESSION["name"]=$row["name"];
        echo "angemeldet !";
    }


}
else
{
    echo "Fehler- zu wenig Parameter";
}