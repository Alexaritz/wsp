<html>
<head><title>DATU BASEAN DAUDEN GALDERAK</title>
<body>

<div align="center">
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
	//$konId=$_SESSION['konId'];
}

$erab = mysqli_query($mysqli, "SELECT * FROM Galdera" );
	$num_rows=mysqli_num_rows($erab);
	$erab2 = mysqli_query($mysqli, "SELECT * FROM Galdera WHERE Posta=('$Posta')" );
	$num_rows2=mysqli_num_rows($erab2);
	echo 'Datu basean '.$num_rows. ' galdera daude eta hauetatik '.$num_rows2.' zuk sartutakoak dira';
?>
</div>
</body> 
</html> 