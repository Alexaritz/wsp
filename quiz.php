<html>
<head><title>DATU BASEAN DAUDEN ERABILTZAILEAK</title>
<body>

<?php
$link = mysql_connect ("localhost","root","") or die (mysql_error());  //localhost mysql.hostinger.es root 7dc3PZD4K8
mysql_select_db("u266570359_quiz", $link) or die(mysql_error());

$erabiltzaileak = mysql_query( "SELECT * FROM Galdera" );
echo '<table border=1>
<tr>
<th> Galdera </th>
<th> Zailtasuna </th>
</tr>';

while( $row = mysql_fetch_array( $erabiltzaileak )) {
echo '<tr><td>'.$row['galdera'].'</td> <td>'. $row['zailtasuna'].'</td></tr>';
}

echo '</table>';
?>

</body> 
</html> 