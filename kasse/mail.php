<?php
$stmt = $db->prepare("SELECT email FROM Nutzer WHERE nutzer_id=" .$nutzerid);
$stmt->execute();
$result = $stmt->fetchAll();
$mail = $result['0']['email'];
$to = $mail;
echo $mail;

$subject = "Bestaetigungs e-mail zur Bestellung " .$newbn ." bei Jukian Schreibwaren";
$txt = "Vielen Dank für Ihre Bestellung!" . "\r\n"
    . "Die Übersicht über die bestellten Artikel erhalten Sie in Ihrer Profilverwaltung." . "\r\n"

."Ihre Bestellung sollte innerhalb der nächsten 3 Werktage bei Ihnen eintreffen." . "\r\n\r\n"
."Ihr Jukian Schreibwaren Team";
$headers = "From: jukian.webshop@yandex.com" . "\r\n";
echo $txt;
mail($to,$subject,$txt,$headers);
?>