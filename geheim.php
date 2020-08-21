<?php
session_start();
if(!isset($_SESSION["username"])){
  echo "Den Inhalt können Sie nur eingeloggt sehen.";
  exit;
}
?><!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Geheim</title>
  </head>
  <body>
    <h1>Top Secret</h1>
    <a href="logout.php">Abmelden</a>
  </body>
</html>
