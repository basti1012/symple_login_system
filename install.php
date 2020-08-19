<?php
$pfad=$_SERVER['PHP_SELF'];
$HOST=$_SERVER['HTTP_HOST'];
$pfad=explode('/',$pfad);
$count_ordner=count($pfad)-1;
for($f=0;$f<$count_ordner;$f++){
    $HOST.=$pfad[$f].'/';
}
$filename3='mysql.php';
if (file_exists($filename3)) {
   echo "Die Setup Datei wurde schon ausgeführt<br>";
   $filename1 = 'setupdatei.php';
   if (file_exists($filename1)) {
       echo "Setupdatei.php exestiert noch im Ordner<br> und kann gegebenfalls noch Manuell ausgeführt werden<br>";
       $check=true;
       include('setupdatei.php');
   }else{
       echo "Die dazugehöhrigen Setupdatein wurden vom System gelöscht<br>";
   }
   exit;
} else {
?>
<div id="setupcontainer">
<h1>Anleitung und Setup</h1>
<p>Wilkommen zur vereinfachten Version eines Login Systems mit Php und Datenbank</p>
<p>1.Starten Sie den Setup mit dem öffnen der index.php.
<p>Glückwunsch, das haben SIE gemacht sonst könnten SIE das hier nicht lesen.</p>
<img src="setup.png" style="height:300px"><br>
<p>2.Nach erfolgreicher Installation können SIE einen Benutzer erstellen</p>
<img src="accound.png" style="height:300px"><br>
<p>3.Danach können SIE sich einloggen</p>
<img src="anmelden.png" style="height:300px"><br>
</div>
<form id="install" name="eingabe" action="setupdatei.php" method="post">   
     <h1>Setup starten</h1>
     <label>
          <p>Datenbank Host: </p>
          <input type="text" id="dbhost" name="dbhost" class="input_feld">
     </label> 
     <label>
          <p>Datenbank Name: </p>
          <input type="text" id="dbname" name="dbname" class="input_feld">
     </label> 
     <label>
          <p>Datenbank User: </p>
          <input type="text" id="dbuser" name="dbuser" class="input_feld">
     </label> 
     <label>
          <p>Name der Tabelle: </p>
          <input type="text" id="name_tabelle" name="name_tabelle" value="users" class="input_feld">
     </label> 
     <label>
          <p>Passwort: </p>
          <input type="text" id="dbpw" name="dbpw"  class="input_feld">
     </label> 
     <label>
          <p>Link zum diesen Ordner:</p>
          <input  type="text" id="pw_link"  class="input_feld input_feld_info" name="pw_link" value="<?php echo $HOST; ?>">
          <div class="info">[?]
              <span class="infotext">
                 Oder zum Ordner wo die Passwort wiederherstellungsdatei liegt.
                 Dieser Link wird benötigt um den wiederherstellungs Passwort Links in der Email zu erzeigen
              </span>
          </div>
     </label>
  <!--
     <label>
         <p>Setupdatei Löschen ?*</p>
         <input type="checkbox" name="kill" value="kill"> 
              <div class="info">[?]
                  <span class="infotext">
                       Nach erfolgreicher Installation werden die Setupdatein gelöscht.Werden in der Regel auch nicht mehr gebraucht.
                  </span>
              </div>
     </label>
     <label>
          <p>Bilder auch Löschen ?*</p>
          <input type="checkbox" name="kill_bild" value="kill_bild">  
          <div class="info">[?]
              <span class="infotext">
                  Nach erfolgreicher Installation werden auch die Bilder der Installations Anleitung gelöscht
              </span>
          </div>
     </label>
  -->
  <label>
        <input type="submit" class="buttonstyle" value="Setup Starten">
  </label>
    <!--
  <small>*Die Setupdatein werden nach erfolgreicher Installation vom Server gelöscht.</small>
-->
  <h5>Es wird eine mysql.php Datei erstellt.</h5>
</form>
<?php
}
?>
