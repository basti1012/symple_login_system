<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebe ein neues Passwort ein</title>
    <link href="style.css" rel="stylesheet">

</head>
<body>
    <?php
    if(isset($_GET["token"])){
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM `$tabelle` WHERE token = :token");
        $stmt->bindParam(":token", $_GET["token"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count != 0){
            if(isset($_POST["submit"])){
                if($_POST["pw1"] == $_POST["pw2"]){
                    $hash = password_hash($_POST["pw1"], PASSWORD_BCRYPT);
                    $stmt = $mysql->prepare("UPDATE `$tabelle` SET pass = :pw, token = null WHERE token = :token");
                    $stmt->bindParam(":pw", $hash);
                    $stmt->bindParam(":token", $_GET["token"]);
                    $stmt->execute();
                    echo '<div class="succes">Das Passwort wurde geändert </div><br>
                    <a href="index.php"></a>Login</a>';
                } else {
                    echo "<div class='error'>Die Passwörter stimmen nicht überein</div>";
                }
            }
            ?>
 
            <form class="create" action="setpassword.php?token=<?php echo $_GET["token"] ?>" method="POST">
                       <h1>Neues Passwort setzen</h1>
                <input  class="input_feld" type="password" name="pw1" placeholder="Password" required><br>
                <input  class="input_feld" type="password" name="pw2" placeholder="Password wiederholen" required><br>
                <button class="input_feld erstelle"  type="submit" name="submit">Passwort setzen</button>
            </form>
            <?php
        } else {
            echo "<div class='error'>Der Token ist ungültig</div><a href='passwordreset.php'>Neues Passwort anfordern</a>";
        }
    } else {
        echo "<div class='error'>Kein gültiger Token gesendet</div><a href='passwordreset.php'>Neues Passwort anfordern</a>";
    }
    ?>
</body>
</html>
