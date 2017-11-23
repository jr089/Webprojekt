<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jukian Schreibwaren</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div id="titel" class="titelimage">
</div>
<header id="pageHeader">
    <ul>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
    </ul>
    <form id="headersearch">
        <input type="text" placeholder="Suche">
        <button type="submit">Submit</button>
    </form>
</header>
<article id="mainArticle">
    <?php

    if (isset($_GET["page"]) ) {
        switch ($_GET["page"]) {
            /*case "beitrag":
            include "./system/beitrag/index.php";
            break;*/
        }
    }
    else
    {
        include "./main.html";
    }
    ?>
</article>
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Navigation</h3>
    </div>
    <!-- Sieht man immer, auch wenn man nicht eingeloggt ist -->
    <ul>
        <li><a href="#?page=artikel&action=stifte">Stifte</a></li>
        <li><a href="#?page=artikel&action=zeichnen">Zeichnen</a></li>
        <li><a href="#?page=artikel&action=ordnung">Ordnung</a></li>
        <li><a href="#?page=artikel&action=hefte">Hefte/Blöcke</a></li>
        <li><a href="#?page=artikel&action=sonstiges">Sonstiges</a></li>

<!-- Ist ein Benutzer oder ein Admin eingeloggt?-->
        <?php
        session_start();
        include "userdata.php";
        /*$stmt = $db->prepare("SELECT Rollen_ID FROM Nutzer WHERE Email=:Email AND Passwort=:Passwort");
        $stmt->bindParam(":Rollen_ID", $Rollen_ID);
        */
        $stmt=$db->prepare("SELECT Rollen_ID FROM Nutzer WHERE Email=:Email");
        $stmt->bindParam(":Email", $_SESSION["login"]);


        if(!$stmt->execute()) {
            echo "Datenbank-Fehler (S01)";
            $arr = $stmt->errorInfo();
            print_r($arr);
            die();
        }

        if (!$row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo '<li><a href="account/index.php?page=account&action=loginform">Login</a></li>';
        }
        else {
            if (isset($_SESSION["login"])) {
                if ($row["Rollen_ID"] == 1) {

                    //Benutzer eingeloggt
                    echo '
                        <li><a href="#?page=profil&action=ansehen">Bestellungen ansehen</a></li>
                        <li><a href="#?page=profil&action=verwalten">Profil verwalten</a></li>';
                }

                elseif ($row["Rollen_ID"] == 2) {                //Admin eingeloggt -> kann Backend sehen & bearbeiten
                    echo '
                        <li><a href="#?page=backend&action=bestellungen">Bestellungen</a></li>
                        <li><a href="#?page=backend&action=artikel">Artikel</a></li>
                        <li><a href="#?page=backend&action=benutzer">Benutzer</a></li>';
                };

            }
        }


        if (isset($_GET["page"]) ) {
            switch ($_GET["page"]) {
                case "artikel":
                    include "artikel/index.php";
                    break;
                case "profil":
                    include "profil/index.php";
                    break;
                case "backend":
                    include "backend/index.php";
                    break;
                case "account":
                    include "account/index.php";
                    break;
                default:
                    include "start.php"; //was machen wir hiermit?
                    break;}}

        else
        {
            include "start.php";     //und hiermit?
        }
        ?>



</nav>
<!-- Fußleiste -->
<footer id="pageFooter">
    <ul class="breadcrumb">
        <li><a href="#">Impressum</a></li>
        <li><a href="#">Datenschutz</a></li>
        <li><a href="#">Kontakt</a></li>
    </ul>
</footer>

</body>

</html>