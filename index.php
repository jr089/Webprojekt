<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jukian Schreibwaren</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>

<div id="titel" class="titelimage">
</div>
<header id="pageHeader">
    <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">Hilfe</a></li>
        <li><a href="#">Warenkorb</a></li>
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
            case "artikel":
                include "artikel/index.php";
                break;
            case "kategorie":
                include "kategorie/index.php";
                break;
        }
    }
    else
    {
        include "main.html";
    }
    ?>
</article>
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Navigation</h3>
    </div>

    <!-- Sieht man immer, auch wenn man nicht eingeloggt ist -->
    <ul>
        <li><a href="?page=kategorie&action=stifte">Stifte</a></li>
        <li><a href="?page=kategorie&action=zeichnen">Zeichnen</a></li>
        <li><a href="?page=kategorie&action=ordnung">Ordnung</a></li>
        <li><a href="?page=kategorie&action=hefte">Hefte/Blöcke</a></li>
        <li><a href="?page=kategorie&action=sonstiges">Sonstiges</a></li>

<!-- Ist ein Benutzer oder ein Admin eingeloggt?-->
        <?php
            session_start();
            include_once "dbconnect.php";

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
            echo '<li><a href="account/index.php?page=account&action=registrieren">Registrieren</a></li>';
        }
        else {
            if (isset($_SESSION["login"])) {
                if ($row["Rollen_ID"] == 1) {

                    //Benutzer eingeloggt
                    echo '
                        <li><a href="#?page=profil&action=ansehen">Bestellungen ansehen</a></li>
                        <li><a href="#?page=profil&action=verwalten">Profil verwalten</a></li>
                        <li><a href="account/logout.php?page=account&action=logout">Logout</a></li>';
                }

                elseif ($row["Rollen_ID"] == 2) {                //Admin eingeloggt -> kann Backend sehen & bearbeiten
                    echo '
                        <li><a href="#?page=backend&action=bestellungen">Bestellungen</a></li>
                        <li><a href="#?page=backend&action=artikel">Artikel</a></li>
                        <li><a href="#?page=backend&action=benutzer">Benutzer</a></li>
                        <li><a href="account/logout.php?page=account&action=logout">Logout</a></li>';
                };

            }
        }

/*
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

                    break;}}

        else
        {

        }
*/
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