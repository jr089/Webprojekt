<?php
include("../dbconnect.php");

if (isset($_POST["Name"]) AND isset($_POST["Vorname"]) AND isset($_POST["Email"]) AND isset($_POST["Adresse"])AND isset($_POST["Passwort"]) AND isset($_POST["Passwort2"])) {
    if (!empty($_POST["Name"])&&!empty($_POST["Vorname"])&&!empty($_POST["Email"])&&!empty($_POST["Adresse"])&&!empty($_POST["Passwort"])&&!empty($_POST["Passwort2"])) {
        if ($_POST["Passwort"] == $_POST["Passwort2"]) {
            $stmt = $db->prepare("INSERT INTO Nutzer (Nutzer_ID, Name, Vorname, Email, Adresse, Passwort, Rollen_ID) VALUES ('', :Name, :Vorname, :Email, :Adresse, :Passwort, '2')");
            $stmt->bindParam(":Name", $_POST["Name"]);
            $stmt->bindParam(":Vorname", $_POST["Vorname"]);
            $stmt->bindParam(":Email", $_POST["Email"]);
            $stmt->bindParam(":Adresse", $_POST["Adresse"]);
            $stmt->bindParam(":Passwort", $_POST["Passwort"]);

            if (!$stmt->execute()) {
                echo "Datenbank-Fehler (registrieren)";
                $arr = $stmt->errorInfo();
                print_r($arr);
                die();
            }
            header("Location: ../index.php");
        } else {
            echo "Passwort muss gleich sein";
            echo
            "
        <form action=\"registerform.php\">
            <input type=\"submit\" value=\"Anmeldung erneut durchführen.\" />
        </form>
        ";

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

} else {
    echo "Formular-Fehler (registrieren)";
}

?>

