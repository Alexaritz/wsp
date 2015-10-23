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
				$Galdera= $_POST["galdera"];
				$Answ= $_POST["answ"];
				$Zail= $_POST["zail"];
				
}
$Posta=$_SESSION['email']; 
// Echo session variables that were set on previous page
if (isset($_POST['submit'])) {
	if(!$Zail==""&&$Zail>0&&$Zail<6){
	$txertatu="INSERT INTO Galdera (galdera, erantzuna, zailtasuna, posta) VALUES ('$Galdera','$Answ','$Zail','$Posta')"; 
	if (!$mysqli -> query($txertatu)){
		die("<p>Errorea gertatu da: ".$mysqli -> error()."</p>");
	}else{
		echo 'Galdera zuzen sartu da';
	}
	}else{
		echo 'Zailtasuna 1-5 artean.';
	}
}else{
	echo 'Sartu datuak eta sakatu Bidali';
}

?>
</form>
<div align="center">
</body> 
</html> 
