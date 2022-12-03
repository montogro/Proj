<?php

$sname="127.0.0.1";
$uname="root";
$password="";

$db_name="syst_zgl";

$conn = mysqli_connect($sname, $uname, $password, $db_name); #jeśli wyrzuca błąd z nawiązaniem połączenia, po przecinku dopisać poprawny port z dostępem do mySQL. Przy XAMPP'ie należy jeszcze w phpmyadmin/config.inc zmienić "$cfg['Servers'][$i]['host'] = '127.0.0.1:3306';"

if(!$conn){
    echo "Connection failed!";
}

?>