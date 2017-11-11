<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webshop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Navigation oben -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Jukian Schreibwaren</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
        </ul>
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="loginform.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<!-- Navigation oben Ende-->

<!-- Sidebar linke Seite -->

<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-sm-2 navbar navbar-inverse">
            <!--Sidebar content-->
            <nav id="sidebar">
                <!-- Sidebar Header -->
                <div class="sidebar-header">
                    <h3>Navigation</div>
                <!-- Sidebar Links -->
                <ul class="list-unstyled components">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Profil</a></li>

                    <li><!-- Link with dropdown items -->
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Artikel</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Schreibwaren</a></li>
                            <li><a href="#">Blöcke</a></li>
                            <li><a href="#">Messgeräte</a></li>
                        </ul>

                        <!--<li><a href="#">Portfolio</a></li>
                        <li><a href="#">Contact</a></li>-->
                </ul>
            </nav>
        </div>
        <div class="col-sm-10">
            <!--Body content-->
            <div id="bla2">
                <div class="col-sm-4">
                    <h3>Column 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <h3>Column 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="#">Impressum</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
    </div>
</nav>

</body>
</html>
