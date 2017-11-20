<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title of the document </title>
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
        <h3>Navigation</div>
    <ul>
        <li><a href="#">Schreibwaren</a></li>
        <li><a href="#">Blöcke</a></li>
        <li><a href="#">Messgeräte</a></li>
    </ul>

</nav>
<footer id="pageFooter">
    <ul class="breadcrumb">
        <li><a href="#">Impressum</a></li>
        <li><a href="#">Datenschutz</a></li>
        <li><a href="#">Kontakt</a></li>
    </ul>
</footer>

</body>

</html>
