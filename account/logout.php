<?php
session_start();
session_destroy();
echo "Abgemeldet!";

header( 'location: ../index.php');
?>