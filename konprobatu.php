<html>
<head><title>DATU BASEAN DAUDEN ERABILTZAILEAK</title>
<body>

<?php
// Start the session
session_start();
if (!isset($_SESSION['saiakerak']))
$_SESSION['saiakerak']=1;
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";
$Id=$_POST['id'];
$Erantzuna=$_POST['erantzuna'];
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
}
$erab = $mysqli->query( "SELECT * FROM Galdera WHERE id=('$Id') and erantzuna=('$Erantzuna')" );
$num_rows=mysqli_num_rows($erab);
if ($num_rows> 0){
	$_SESSION['zuzenak'] = $_SESSION['zuzenak']+1;
	echo "<p>Erantzuna zuzena da. ".$_SESSION['zuzenak']." galdera zuzen erantzun dituzu, eta oker berriz ".$_SESSION['okerrak']." galdera.</p>";
}else{
	$_SESSION['okerrak'] = $_SESSION['okerrak']+1;
	echo "<p>Erantzuna okerra da. ".$_SESSION['zuzenak'] ." galdera zuzen erantzun dituzu, eta oker berriz ".$_SESSION['okerrak']." galdera.</p>";
}
?>

</body> 
</html> 
