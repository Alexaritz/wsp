<?php
session_start();
if(!isset($_SESSION["email"])){
		header("Location: errorea.php");
}
?>
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
$Ekintza='GalderaTxertatu';
$konId=$_SESSION['konId'];
$ordua=date('H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];

if (isset($_POST['submit'])) {
	if(!$Zail==""&&$Zail>0&&$Zail<6){
		$txertatu="INSERT INTO Galdera (galdera, erantzuna, zailtasuna, posta) VALUES ('$Galdera','$Answ','$Zail','$Posta')"; 
		if (!$mysqli -> query($txertatu)){
			die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
		}else{
			$txertatu2="INSERT INTO ekintzak (konId, posta, ekintza, ordua, ip) VALUES ('$konId','$Posta','$Ekintza','$ordua', '$ip')"; 
			if (!$mysqli -> query($txertatu2)){
				die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
			}else{
				echo 'Ekintza zuzen txertatu da.';
				$xml = simplexml_load_file('galderak.xml');
				$assessmentItem = $xml->addChild('assessmentItem');
				$assessmentItem->addAttribute('konpl',$Zail);
				$assessmentItem->addAttribute('subject','');
				$itemBody= $assessmentItem ->addChild('itemBody');
				$itemBody->addChild('p',$Galdera);
				$correctResponse= $assessmentItem-> addChild('correctResponse');
				$correctResponse->addChild('value',$Answ);
				
				//echo $xml->asXML();
				$xml->asXML('galderak.xml');
				echo "<a href ='seeXMLQuestions.php'>Ikusi galderak</a><br>";
				
				
			}
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
<a href='layout.html'>Hasiera</a>
<br/>
<div align="center">
</body> 
</html> 
