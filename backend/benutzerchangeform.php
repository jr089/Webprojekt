<?php
$nutzer_id=$_GET ["nutzer_id"];

include ('../dbconnect.php');
$stmt = $db->query("SELECT * FROM nutzer WHERE nutzer_id=".$nutzer_id);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {

    echo '

    <form action="artikelchangedo.php" method="post">
        <input type="hidden" name="nutzer_id" value="' . $nutzer_id . '">
        <input type="text" name="name" value="' . $row["name"] . '">
        <input type="text" name="vorname" value="' . $row["vorname"] . '">
        <input type="text" name="email" value="' . $row["email"] . '">
        <input type="text" name="adresse" value="' . $row["adresse"] . '">
        <input type="text" name="passwort" value="' . $row["passwort"] . '">
        <input type="submit">
    </form>

';
}


?>