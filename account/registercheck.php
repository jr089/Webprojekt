<?php
include("../dbconnect.php");

if (isset($_POST["name"]) AND isset($_POST["vorname"]) AND isset($_POST["email"]) AND isset($_POST["strasse"]) AND isset($_POST["hausnr"]) AND isset($_POST["plz"]) AND isset($_POST["ort"])AND isset($_POST["passwort"]) AND isset($_POST["passwort2"])) {
    if (!empty($_POST["name"])&&!empty($_POST["vorname"])&&!empty($_POST["email"])&&!empty($_POST["strasse"])&&!empty($_POST["hausnr"])&&!empty($_POST["plz"])&&!empty($_POST["ort"])&&!empty($_POST["passwort"])&&!empty($_POST["passwort2"])) {
        if ($_POST["passwort"] == $_POST["passwort2"]) {
            $stmt = $db->prepare("INSERT INTO Nutzer (nutzer_id, Name, vorname, email, strasse, hausnr, plz, ort, passwort, rollen_id) VALUES ('', :name, :vorname, :email, :strasse, :hausnr, :plz, :ort, :passwort, '2')");
            $stmt->bindParam(":name", $_POST["name"]);
            $stmt->bindParam(":vorname", $_POST["vorname"]);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->bindParam(":strasse", $_POST["strasse"]);
            $stmt->bindParam(":hausnr", $_POST["hausnr"]);
            $stmt->bindParam(":plz", $_POST["plz"]);
            $stmt->bindParam(":ort", $_POST["ort"]);
            $stmt->bindParam(":passwort", $_POST["passwort"]);

            echo $stmt->queryString;

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

