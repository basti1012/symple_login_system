<?php
if(isset($_POST['submit'])){
      include("mysql.php");      
      if (filter_var($_POST["username"], FILTER_VALIDATE_EMAIL)) {
          $stmt = $mysql->prepare("SELECT * FROM $tabelle WHERE email = :email");
          $stmt->bindParam(":email",$_POST["username"]);
      } else {
          $stmt = $mysql->prepare("SELECT * FROM $tabelle WHERE user = :user");
          $stmt->bindParam(":user",$_POST["username"]);
      } 
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 1){
         $row = $stmt->fetch();
         if(password_verify($_POST["pw"], $row["pass"])){
            session_start();
            $_SESSION["username"] = $row["user"];
            include('config.php');
            if($nach_login!=''){
            header("Location: $nach_login");
            }
         } 
      }
      $infos="<div class='error'>Einlogdaten  falsch</div>";
}
?>
