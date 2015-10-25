<html>
<head><title>DATU BASEAN DAUDEN ERABILTZAILEAK</title>
<body>
<div align="center">
<form method="post">
	POSTA:
  <input type='text' title='EHUko posta' name='email' id='email' value='' />
  <br/>
  PASAHITZA:
  <input type='password' name='pass' id='pass' value='' />
  <br/>
  <button name='submit'	type='submit' value='submit'>Bidali</button>
<?php
// Start the session
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
				$Posta = $_POST["email"];
				$Pasahitza = $_POST["pass"];
}
$ordua=date('H:i:s');
 if (isset($_POST['submit'])) {
	 
echo "Session variables are set.";
	$erab = $mysqli->query( "SELECT * FROM Erabiltzaile WHERE Posta=('$Posta') and Pasahitza=('$Pasahitza')" );
	$num_rows=mysqli_num_rows($erab);
	if ($num_rows> 0){
		//echo "<p>Datuak zuzenak dira.</p> <p><a href='galderenErregistroa.php'>GALDERAK IKUSI</a></p>   ";
		echo "<p>Datuak zuzenak dira.</p>";
		$_SESSION['email'] = $Posta;
		$txertatu="INSERT INTO Konexioak (posta, ordua) VALUES ('$Posta', '$ordua')"; 
		if (!$mysqli -> query($txertatu)){
			die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
		}
		$KonId = $mysqli->query( "SELECT konId FROM konexioak WHERE posta=('$Posta') and ordua=('$ordua')" );
		if ($KonId->num_rows>0){
		$_SESSION['konId']=$KonId->fetch_object()->konId;
		}else{
			echo 'Ez da bilatu';
		}
		mysqli_close($mysqli);	
		header('Location: insertQuestion.php');
	}
	else{
		echo "<p>Datuak ez dira zuzenak</p>";
		echo"<p><a href='layout.html'>Hasiera orria</a></p>   ";
	}
}else{
	echo 'Sartu datuak eta sakatu Bidali';
}
?>
</form>
<div align="center">
</body> 
</html> 
