<html>
<head><title>Galderak</title>
<body>
<div align="center">
<form method="post">
	GALDERA*:
  <input type='text' title='galdera' name='galdera' id='galdera' value='' /> 
  <br/>
  ERANTZUNA*(hitz batekoa):
  <input type='text' name='answ' id='answ' value='' />
  <br/>
  ZAILTASUNA(1-5 bitartean):
  <input type='number' name='zail' id='zail' value='' />
  <br/>
  <button name='submit'	type='submit' value='submit'>Bidali</button>
<?php
session_start();
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";


$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
//$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Posta = $_POST["email"];//HAU NOLA HARTU BEHAR DA?
				$Galdera= $_POST["galdera"];
				$Answ= $_POST["answ"];
				$Zail= $_POST["zail"];
				
}
if(isset ($_SESSION['email']))
 $Posta=$_SESSION['email']; 
 // Echo session variables that were set on previous page
if (isset($_POST['submit'])) {
	echo'$Posta';
	$txertatu="INSERT INTO Galdera(galdera, erantzuna, zailtasuna, posta) VALUES ('$Galdera','$Answ','$Zail','$Posta')"; 
}
?>
</form>
<div align="center">
</body> 
</html> 
