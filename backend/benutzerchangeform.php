<?php
$nutzer_id=$_GET ["Nutzer_ID"];

include ('./dbconnect.php');
$stmt = $db->query("SELECT * FROM Nutzer WHERE Nutzer_ID=".$nutzer_id);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {

    echo '

    <form action="benutzerchangedo.php" method="post">
        <input type="hidden" name="nutzer_id" value="' . $nutzer_id . '">
        <input type="text" name="name" value="' . $row["Name"] . '">
        <input type="text" name="vorname" value="' . $row["Vorname"] . '">
        <input type="text" name="email" value="' . $row["Email"] . '">
        <input type="text" name="adresse" value="' . $row["Adresse"] . '">
        <input type="text" name="passwort" value="' . $row["Passwort"] . '">
        <input type="submit">
    </form>

';
}


?>