<?php
session_start();
echo '<div class="form">
<form action="./account/logincheck.php" method="post">
<h3>Login</h3>
<input type="text" name="email" placeholder="Email"> <br>
<input type="password" name="passwort" placeholder="Passwort"> <br>
<input type="submit" value="Einloggen">
</form>
</div>';
?>
