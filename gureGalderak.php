<?php
session_start();

$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";
$mysqli =new mysqli ("localhost","root","", $sdb);
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);

$Ekintza='GalderakIkusi';
$ordua=date('H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
if (!isset($_SESSION['email'])) {
	$Posta='null';
	$konId='null';
}else{
	$Posta=$_SESSION['email'];
	$konId=$_SESSION['konId'];
}
echo 'asd';
$erabiltzaileak = $mysqli->query("SELECT * FROM Galdera WHERE posta='$Posta'");
$num_rows=mysqli_num_rows($erabiltzaileak);
	if ($num_rows> 0){
		echo '<table border=1>
		<tr>
		<th> Galdera </th>
		<th> Zailtasuna </th>
		</tr>';

		while( $row = mysqli_fetch_array( $erabiltzaileak )) {
			echo '<tr><td>'.$row['galdera'].'</td> <td>'. $row['zailtasuna'].'</td></tr>';
		}

		echo '</table>';
	}else{
		echo 'Ez daukazu galderarik.';
	}
$txertatu2="INSERT INTO ekintzak (konId, posta, ekintza, ordua, ip) VALUES ('$konId','$Posta','$Ekintza','$ordua', '$ip')"; 
if (!$mysqli -> query($txertatu2)){
	die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
}
?>