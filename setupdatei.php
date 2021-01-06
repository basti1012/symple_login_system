<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Installation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
<?php
function setup(){
   if(empty($_POST['dbhost']) OR empty($_POST['dbpw']) OR  empty($_POST['dbname']) OR  empty($_POST['dbuser']) OR empty($_POST['pw_link']) OR empty($_POST['name_tabelle'])){
      echo "<div class='error'>Bitte fülle alle Felder aus</div>";
      echo "<a href='javascript:history.back()'>Zurück</a>";
   }else{
      $zeile='<?php $pwlink="'.$_POST['pw_link'].'"; $tabelle="'.$_POST['name_tabelle'].'";try{$mysql = new PDO("mysql:host='.$_POST['dbhost'].';dbname='.$_POST['dbname'].'", "'.$_POST['dbuser'].'", "'.$_POST['dbpw'].'");$mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );}catch (PDOException $e){echo "SQL Error: ".$e->getMessage();}?>';
      file_put_contents("mysql.php", $zeile);
      include('mysql.php');
      try{
         $query="CREATE TABLE `$tabelle`(
         `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
         `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
         `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
         `pass` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
         `token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
          PRIMARY KEY (`id`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

           $mysql->exec($query);
           echo "<div class='succes'>Tabelle $tabelle wurde erstellt.</div>";
           $eins=true;
      } catch(PDOException $e) {
           echo $e->getMessage();
           $eins=false;
           echo "<div class='error'>Fehler beim erstellen der Tabelle $tabelle .  </div>";
      }
      $filename2 = 'mysql.php';
      if (file_exists($filename2) AND $eins==true){
          if(isset($_POST['kill'])){
              //unlink('setupdatein.php');
              //unlink('install.php');
              echo "<div class='succes'>Die Setupdatein wurden gelöscht.</div>";
          }
          if(isset($_POST['kill_bild'])){
              //unlink('accound.png');
              //unlink('setup.png');
              //unlink('anmeldung.png');
              echo "<div class='succes'>Die Setup Bioderdatein wurden gelöscht.</div>";
          }
      }else{
           if(isset($_POST['kill'])){
               echo "<div class='error'>Die Setupdatein wurde nicht gelöscht.</div>";
           }
           if(isset($_POST['kill_bild'])){
               echo "<div class='error'>Die Bilder aus dem Setup wurde nicht gelöscht.</div>";
           }
      }
      echo "<a href='register.php'>User erstellen</a><br><a href='index.php'>Zum Login</a>";
   }
}
if(isset($_POST['dbpw'])){
    setup();
}
?>
</body>
</html>
