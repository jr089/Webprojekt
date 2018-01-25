<?php

session_start();

include_once "../dbconnect.php";

$email = $_SESSION["email"];
echo $email;
$stmt=$db->query("SELECT * FROM Nutzer WHERE email='".$email."'");
$stmt->execute();
$results = $stmt->fetch();
echo $results["passwort"];

if (isset($_POST["passwortalt"]) AND isset($_POST["passwortneu"]) AND isset($_POST["passwortneu2"])) {
    if (!empty($_POST["passwortalt"])&&!empty($_POST["passwortneu"])&&!empty($_POST["passwortneu2"])) {
        if (md5($_POST["passwortalt"]) == $results["passwort"]){
            if (md5($_POST["passwortneu"]) == md5($_POST["passwortneu2"])) {
                $stmt = $db->prepare("UPDATE Nutzer SET passwort =:passwort WHERE email='".$email."'");
                $stmt->bindParam(":passwort", md5($_POST["passwortneu"]));

                echo $stmt->queryString;

                if (!$stmt->execute()) {
                    echo "Datenbank-Fehler (Passwort ändern)";
                    $arr = $stmt->errorInfo();
                    print_r($arr);
                    die();
                }
                header("Location: ../index.php");
            }
            else {
                echo "Passwort muss gleich sein";
                echo "
                    <form action=\"passwortchangeform.php\">
                        <input type=\"submit\" value=\"Passwortänderung erneut durchführen.\" />
                    </form>
                ";
            }
        }
        else {
            echo "Altes Passwort stimmt nicht überein.";
            echo"
                <form action=\"registerform.php\">
                    <input type=\"submit\" value=\"Anmeldung erneut durchführen.\" />
                </form>";
        }
    }
    else
    {
        echo "Bitte alle Felder ausfüllen.";
        echo
        "
            <form action=\"registerform.php\">
                <input type=\"submit\" value=\"Anmeldung erneut durchführen.\" />
            </form>
            ";
    }

}
else {
    echo "Formular-Fehler (Passwort ändern)";
}

?>