<?php

session_start();
include "../dbconnect.php";
if (isset($_POST["email"]) AND isset($_POST["passwort"]))
{
    $passwort=md5($_POST["passwort"]);
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
        echo
        "
        <form action=\"../index.php\">
            <input type=\"submit\" value=\"Zurück zur Startseite.\" />
        </form>
        ";
        die();
    }
    else
    {
        $_SESSION["email"]=$row["email"];
        $_SESSION["name"]=$row["name"];
        $_SESSION["login"] = $row["email"];
        $_SESSION["nutzerid"] = $row["nutzer_id"];
        $_SESSION["rollen_id"]=$row["rollen_id"];
        header ("Location: ../index.php");
    }
}
else
{
    echo "Fehler- zu wenig Parameter";
    echo $_POST["email"];
    echo $_POST["passwort"];
}
?>