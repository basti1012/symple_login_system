<?php
if(file_exists('mysql.php')){
session_start();
$infos='';
if(!isset($_SESSION['username'])) {
    include('login.php');
}
?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
  </head>
<body>
<?php echo $infos;
if (isset($_SESSION['username'])) {
     include('config.php');
     echo "<div class='succes'>Du bist schon eingeloggt</div>";
     echo "<a href='$nach_login'>Geheime Seite</a>  <br>  <a href='logout.php'>Abmelden</a>";
}else{
     if(isset($_GET['logout'])){
         echo "<div class='succes'>Du hast dich erfolgreich ausgeloggt</div>";
     }
?>
    <form class="anmelden" action="index.php" method="post">
       <h1>Anmelden</h1>
       <label>Username</label>
      <input  class="input_feld" type="text" name="username" placeholder="Username" required><br>
      <label>Password eingabe</label>
      <input  class="input_feld" type="password" name="pw" placeholder="Passwort" required><br>
      <button  class="input_feld" type="submit" name="submit">Einloggen</button>
          <br>
       <a href="register.php">Noch keinen Account?</a><br>
       <a href="passwordreset.php">Hast du dein Passwor vergessen?</a>
    </form>
<?php
}
  }else{
  ?>
  <!doctype html>
  <html lang="de">
  <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
