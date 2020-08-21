<?php
if(file_exists('mysql.php')){
session_start();
$infos='';
if(!isset($_SESSION['username'])) {
    include('login.php');
}
?>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
  </head>
<body>
<?php echo $infos;
if (isset($_SESSION['username'])) {
include('config.php');
     echo "<div class='succes'>Sie sind schon eingeloggt.</div>";
     echo "<a href='$nach_login'>Geheime Seite</a>  <br>  <a href='logout.php'>Abmelden</a>";
} else {
if(isset($_GET['logout'])){
    echo "<div class='succes'>Sie haben sich erfolgreich ausgeloggt.</div>";
}
?>
    <form class="anmelden" action="index.php" method="post">
    <h1>Anmelden</h1>
      <input  class="input_feld" type="text" name="username" placeholder="Username" required><br>
      <input  class="input_feld" type="password" name="pw" placeholder="Passwort" required><br>
      <button  class="input_feld" type="submit" name="submit">Einloggen</button>
          <br>
    <a href="register.php">Noch keinen Account?</a><br>
    <a href="passwordreset.php">Haben Sie Ihr Passwort vergessen?</a>
    </form>
<?php
}
  }else{
  ?>
  <html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include('install.php');
  }
?>
  </body>
</html>
