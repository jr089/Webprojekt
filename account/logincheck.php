<?php
session_start();
include "../userdata.php";
if (isset($_POST["Email"]) AND isset($_POST["Passwort"]))
{

    $passwort=($_POST["Passwort"]);
    $stmt=$db->prepare("SELECT * FROM Nutzer WHERE Email=:Email AND Passwort=:Passwort");
    $stmt->bindParam(":Email", $_POST["Email"]);
    $stmt->bindParam(":Passwort", $passwort );
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
        $_SESSION["Email"]=$row["Email"];
        $_SESSION["Name"]=$row["Name"];
        $_SESSION["login"] = $row["Email"];
        header ("Location: ../index.php");
    }


}
else
{
    echo "Fehler- zu wenig Parameter";
}