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
$servidor = "localhost";//localhost mysql.hostinger.es
$usuario = "root";//root u266570359_alex
$password = "";// 7dc3PZD4K8
$sdb = "u266570359_quiz";

session_start();

$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Posta = $_POST["email"];//HAU NOLA HARTU BEHAR DA?
				$Galdera= $_POST["galdera"];
				$Answ= $_POST["answ"];
				$Zail= $_POST["zail"];
				
}
 $Posta=$_SESSION["email"]; 
if (isset($_POST['submit'])) {
	echo'$Posta';
	$txertatu="INSERT INTO Galdera(galdera, erantzuna, zailtasuna, posta) VALUES ('$Galdera','$Answ','$Zail','$Posta')"; 
}
?>
</form>
<div align="center">
</body> 
</html> 
insertQuestion.php?idePosta=(nameko balioa)
$nereeposta=$_GET
			$_POST [idePosta]