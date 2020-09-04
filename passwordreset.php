<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neues Passwort anfordern</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php
    if (isset($_POST["submit"])) {
        include('config.php');
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT `email` FROM `$tabelle` WHERE email = :email");
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count != 0){
            $token = generateRandomString(25);
            $stmt = $mysql->prepare("UPDATE `$tabelle` SET token = :token WHERE email = :email");
            $stmt->bindParam(":token", $token);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->execute();

            $link=$pwlink."setpassword.php?token=".$token;
            $sendetext = str_replace('{link}',$link,$sendetext);
            
            mail($_POST["email"], $betreff, $sendetext,$header);
            echo "<div class='succes'>Die Email wurde versendet<br>Checke deinen Email accound</div>";
        } else {
            echo "<div class='error'>Diese Email ist nicht angemeldet</div>";
        }
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    ?>

    <form class="create" action="passwordreset.php" method="POST">
        <h1>Passwort vergessen?</h1>
        <label>Email eingabe</label>
        <input class="input_feld" type="email" name="email" placeholder="Email" required><br>
        <button class="input_feld" type="submit" name="submit">Zurücksetzen</button>
    </form>
</body>

</html>
