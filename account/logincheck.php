<?php
session_start();
include "../dbconnect.php";
if (isset($_POST["email"]) AND isset($_POST["passwort"]))
{
    $passwort=($_POST["passwort"]);
    $stmt=$db->prepare("SELECT * FROM Nutzer WHERE email=:email AND passwort=:passwort");
    $stmt->bindParam(":email", $_POST["email"]);
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
        $_SESSION["email"]=$row["email"];
        $_SESSION["name"]=$row["name"];
        $_SESSION["login"] = $row["email"];
        $_SESSION["nutzerid"] = $row["nutzer_id"];
        header ("Location: ../index.php");
    }
}
else
{
    echo "Fehler- zu wenig Parameter";
    echo $_POST["email"];
    echo $_POST["passwort"];
}