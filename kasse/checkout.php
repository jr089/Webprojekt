<?php
session_start();
if((!isset($_POST['zahlmethode'])) || (!isset($_POST['agb']))){
echo "AGB oder Zahlungsart nicht angegeben";
}
else{
    echo "gut";
}
?>