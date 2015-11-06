<html>
<head><title>DATU BASEAN DAUDEN ERABILTZAILEAK</title>
<body>

<?php
$link = mysql_connect ("localhost","root","") or die (mysql_error()); 
//$link = mysql_connect ("mysql.hostinger.es","u266570359_alex","7dc3PZD4K8") or die (mysql_error());
mysql_select_db("u266570359_quiz", $link) or die(mysql_error());

$erabiltzaileak = mysql_query( "SELECT * FROM Erabiltzaile" );
echo '<table border=1>
<tr>
<th> Posta </th>
<th> IzenaAb </th>
<th> Pasahitza </th>
<th> Tel </th>
<th> Espezialitatea </th>
</tr>';

while( $row = mysql_fetch_array( $erabiltzaileak )) {
echo '<tr><td>'.$row['Posta'].'</td> <td>'. $row['IzenaAb']. '</td> <td>'. $row['Pasahitza']. '</td> <td>'. $row['Tel']. '</td> <td>'. $row['Espezialitatea'].'</td></tr>';
}

echo '</table>';
?>

</body> 
</html> 