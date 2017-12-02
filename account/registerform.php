<?php

include("../dbconnect.php");
echo "<div class=\"form\">

    <form action=\"registercheck.php\" method=\"post\">
        Name:<br>
        <input type=\"Text\" name=\"Name\"><br><br>

        Vorname:<br>
        <input type=\"Text\" name=\"Vorname\"><br><br>

        E-Mail:<br>
        <input type=\"Email\" name=\"Email\"><br><br>

        Adresse:<br>
        <input type=\"Text\" name=\"Adresse\"><br><br>

        Dein Passwort:<br>
        <input type=\"Password\" name=\"Passwort\"><br><br>
        
        Passwort wiederholenx:<br>
        <input type=\"Password\" name=\"Passwort2\"><br><br>

        <input type=\"submit\" value=\"Abschicken\">
    </form>
</div>";
?>