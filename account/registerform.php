<?php

include("./dbconnect.php");
echo "<div class=\"form\">

    <form action=\"./account/registercheck.php\" method=\"post\">
        Name:<br>
        <input type=\"Text\" name=\"name\"><br><br>

        Vorname:<br>
        <input type=\"Text\" name=\"vorname\"><br><br>

        E-Mail:<br>
        <input type=\"Email\" name=\"email\"><br><br>

        Straße:<br>
        <input type=\"Text\" name=\"strasse\"><br><br>
        
        Hausnummer:<br>
        <input type=\"number\" name=\"hausnr\"><br><br>
        
        PLZ:<br>
        <input type=\"number\" name=\"plz\"><br><br>
        
        Ort:<br>
        <input type=\"Text\" name=\"ort\"><br><br>

        Dein Passwort:<br>
        <input type=\"Password\" name=\"passwort\"><br><br>
        
        Passwort wiederholen:<br>
        <input type=\"Password\" name=\"passwort2\"><br><br>

        <input type=\"submit\" value=\"Abschicken\">
    </form>
</div>";
?>