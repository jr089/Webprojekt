<?php
$dsn =    "mysql::dbhost=mars.iuk.hdm-stuttgart.de;dbname=u-sk284";
$dbuser = "sk284";
$dbpass = "ALuo1wiey1";
$option = array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8");

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
}
catch (PDOException $p) {
    echo ("Fehler beim Aufbau der Datenbankverbindung!");
    print_r($p);
    die();
}

?>