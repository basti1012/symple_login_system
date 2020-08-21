<?php
if(isset($_POST['submit'])){
      include("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM $tabelle WHERE user = :user");
      $stmt->bindParam(":user",$_POST["username"]);
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
         }else{
            $infos="<div class='error'>Das Passwort ist falsch.</div>";
         }
      }else{
         $infos="<div class='error'>Den User gibt es nicht.</div>";
      }
}
?>
