<html>
<head><title>DATU BASEAN DAUDEN ERABILTZAILEAK</title>
<body>
<div align="center">
<form method="post">
	POSTA:
  <input type='text' title='EHUko posta' name='email' id='email' value="<?php echo $_REQUEST["variable"] ?>" />
  <br/>
  PASAHITZA:
  <input type='password' name='pass' id='pass' value='' />
  <br/>
  <button name='submit'	type='submit' value='submit'>Bidali</button>
<?php
$servidor = "localhost";//localhost mysql.hostinger.es
$usuario = "root";//root u266570359_alex
$password = "";// 7dc3PZD4K8
$sdb = "u266570359_quiz";

// Start the session
session_start();



$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Posta = $_POST["email"];
				$Pasahitza = $_POST["pass"];
}
$_SESSION["email"] = $Posta;

 if (isset($_POST['submit'])) {
	$erab = $mysqli->query( "SELECT * FROM Erabiltzaile WHERE Posta=('$Posta') and Pasahitza=('$Pasahitza')" );
	$num_rows=mysqli_num_rows($erab);
	if ($num_rows> 0){
		mysqli_close($mysqli);
		//echo "<p>Datuak zuzenak dira.</p> <p><a href='galderenErregistroa.php'>GALDERAK IKUSI</a></p>   ";
		echo "<p>Datuak zuzenak dira.</p>";
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
