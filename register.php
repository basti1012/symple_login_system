<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <?php

    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM `$tabelle` WHERE user = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0){
        $stmt = $mysql->prepare("SELECT * FROM `$tabelle` WHERE email = :email");
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0){
          if($_POST["pw"] == $_POST["pw2"]){
            $stmt = $mysql->prepare("INSERT INTO `$tabelle` (user, pass, email) VALUES (:user, :pw, :email)");
            $stmt->bindParam(":user", $_POST["username"]);
             $hash = password_hash($_POST["pw"], PASSWORD_DEFAULT);
            $stmt->bindParam(":pw", $hash);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->execute();
            echo "<div class='succes'>Dein Account wurde angelegt</div>";
          } else {
            echo "<div class='error'>Die Passwörter stimmen nicht überein</div>";
          }
        } else {
          echo "<div class='error'>Email bereits vergeben</div>";
        }
      } else {
        echo "<div class='error'>Der Username ist bereits vergeben</div>";
      }
    }
     ?>
         <form class="create" action="register.php" method="post">
    <h1>Account erstellen</h1>

      <input  class="input_feld input_feld_info" type="text" name="username" placeholder="Username" required><br>
      <input  class="input_feld input_feld_info" type="text" name="email" placeholder="Email" required><br>
      <input  class="input_feld input_feld_info" type="password" name="pw" placeholder="Passwort" required><br>
      <input  class="input_feld input_feld_info" type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
      <button  class="input_feld erstelle" type="submit" name="submit">Erstellen</button>
    </form>
    <br>
    <a href="index.php">Hast du bereits einen Account?</a>
  </body>
</html>
