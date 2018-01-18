<?php
session_start();
if (isset($_POST['anzahl']) || isset($_POST['delete'])) {
    if (isset($_POST['anzahl'])) {
        $catch = $_POST['ref'];
        foreach ($catch as $temp) {
            $anzahl = $_POST['anzahl'][$temp];
            $_SESSION['warenkorb'][$temp]['anzahl'] = $anzahl;
        }
    }
    if (isset ($_POST['delete'])) {
        $catch = $_POST['delete'];
        foreach ($catch as $temp) {
            unset($_SESSION['warenkorb'][$temp]);
        }
        $count = count($_SESSION['warenkorb']);
        if ($count < 1) {
            unset($_SESSION['warenkorb']);
        }
    }
    header('Location: ../index.php?page=warenkorb');
}
else{
    echo "error";
}
?>