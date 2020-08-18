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
       echo "Setupdatei.php exestiert noch im Ordner<br> und kann gegenefalls noch Manuell ausgeführt werden<br>";
       $check=true;
       include('setupdatei.php');
   }else{
       echo "Die dazugehöhrigen Setupdatein wurden vom System gelöscht<br>";
   }
   exit;
} else {
?>
<form name="eingabe" action=" setupdatei.php" method="post">   
<h1>Setup starten</h1>
     <label><p>Datenbank Host: </p><input type="text" id="dbhost" name="dbhost" class="input_feld"></label> 
     <label><p>Datenbank Name: </p><input type="text" id="dbname" name="dbname" class="input_feld"></label> 
     <label><p>Datenbank User: </p><input type="text" id="dbuser" name="dbuser" class="input_feld"></label> 
     <label><p>Name der Tabelle: </p><input type="text" id="name_tabelle" name="name_tabelle" value="users" class="input_feld"></label> 
     <label><p>Passwort: </p><input type="text" id="dbpw" name="dbpw"  class="input_feld"></label> 
     <label><p>Link zum diesen Ordner:</p><input  type="text" id="pw_link"  class="input_feld input_feld_info" name="pw_link" value="sebastian1012.bplaced.net/Eigen-bau/login-system/">
  <div class="info">[?]<span class="infotext">
    Oder zum Ordner wo die Passwort wiederherstellungsdatei liegt.Dieser Link wird benötigt um den wiederherstellungs Passwort Links in der Email zu erzeigen
    </span>
  </div></label>
  <!--
     <label><p>Setupdatei Löschen ?*</p><input type="checkbox" name="kill" value="kill">  <div class="info">[?]<span class="infotext">
    Nach erfolgreicher Installation werden die Setupdatein gelöscht.Werden in der Regel auch nicht mehr gebraucht.
    </span>
  </div></label>
  -->
  <label>
<input type="submit" class="buttonstyle" value="Setup Starten">
  </label>
<small>*Die Setupdatein werden nach erfolgreicher Installation vom Server gelöscht.</small>
<h5>
Es wird eine Config Datei erstellt.
</h5>
 </form>
<?php
}
?>
