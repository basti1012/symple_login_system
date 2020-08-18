<?php
$nach_login='geheim.php';// nach login umleiten nach

$sendetext="<h1>Passwort anforderung</h1>
<p>Sie haben ein neues Passwort angefordert,<br>
klicken SIE auf den Link um ein neues Passwort zu erstellen <a href='{link}'>Neues Passwort erstellen</a></p>
<h4>Mfg euer https://soforthilfe-forum.de</h4>";

$absender   = "basti1012@soforthilfe-forum.de";
$betreff    = "Neues Passwort von soforthilfe-forum.de";
$antwortan  = "basti1012@soforthilfe-forum.de";
$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=utf-8\r\n";
$header .= "From: $absender\r\n";
$header .= "Reply-To: $antwortan\r\n";
// $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
$header .= "X-Mailer: PHP ". phpversion();      
?>
