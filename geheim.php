<?php
session_start();
if(!isset($_SESSION["username"])){
  echo "Den Inhalt kannst du nur eingeloggt sehen";
  exit;
}
?><!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Top Secret</h1>
    <a href="logout.php">Abmelden</a>
  </body>
</html>
