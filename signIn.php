<html>
<head><title>DATU BASEAN DAUDEN ERABILTZAILEAK</title>
<body>
<div align="center">
<h1>Saioa hasi</h1>
<form method="post">
  POSTA:
  <input type='text' title='EHUko posta' name='email' id='email' value='' />
  <br/>
  PASAHITZA:
  <input type='password' name='pass' id='pass' value='' />
  <br/>
  <button name='submit'	type='submit' value='submit'>Bidali</button>
    <button name='pasber' id='pasber'	type='submit' value='submit'>Pasahitza ahaztu dut</button>
<?php
// Start the session
session_start();
if (!isset($_SESSION['saiakerak']))
$_SESSION['saiakerak']=1;
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";

//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Posta = $_POST["email"];
	$Pasahitza = $_POST["pass"];
	$Pasahitza=crypt($Pasahitza,'rd');
	if (strpos($Posta,'ikasle') !== false) {
		$_SESSION['rol'] = "Ikas";
	}else if($_POST["email"]!=""){
		$_SESSION['rol'] = "Irakas";
	}	
	$_SESSION['email'] = $Posta;	
}

if (isset($_POST['submit'])) { 
	$erab = $mysqli->query( "SELECT * FROM Erabiltzaile WHERE Posta=('$Posta') and Pasahitza=('$Pasahitza')" );
	$num_rows=mysqli_num_rows($erab);
	if ($num_rows> 0){
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
		if ($_SESSION['rol']=="Ikas")
			header('Location: handlingQuizzes.php');
		else
			header('Location: layout.php');
	}
	else{
		if($_SESSION['saiakerak']==3){
			header('Location: maxtries.php');
		}else{
			echo "<p> <br/> Datuak ez dira zuzenak</p>";
			echo "Saiakera kopurua: " .$_SESSION['saiakerak'];
			$_SESSION['saiakerak']=$_SESSION['saiakerak']+1;
		}	
	}
}else if(isset($_POST['pasber'])){
	$erab = $mysqli->query( "SELECT * FROM Erabiltzaile WHERE Posta=('$Posta')" );
	$num_rows=mysqli_num_rows($erab);
	if ($num_rows> 0){
		header('Location: pasahitzaBerreskuratu.php');
	}else{
		echo "<p>Emaila ez da zuzena</p>";
	}
}else{
	echo '</br> Sartu datuak eta sakatu Bidali';
	echo '</br> Pasahitza ahaztu baduzu, sartu emaila eta sakatu PASAHITZA AHAZTU DUT.';
}
?>
</form>
<a href='layout.php'>Hasiera</a>
<div align="center">
</body> 
</html> 
