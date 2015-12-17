<?php
session_start();
if(!isset($_SESSION["email"])){
		header("Location: errorea.php");
}
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
	$Galdera = $_POST['galdera'];
	$Answ = $_POST['erantzuna'];
	$Zail = $_POST['zailtasuna'];
}
echo "$Answ";
$Posta=$_SESSION['email']; 
$Ekintza='GalderaTxertatu';
//$konId=$_SESSION['konId'];
$ordua=date('H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];

if(!$Zail==""&&$Zail>0&&$Zail<6&&!$Answ=""&&!$Galdera=""){
	$txertatu="INSERT INTO galdera (galdera,erantzuna,zailtasuna,posta) VALUES ('$Galdera','$Answ','$Zail','$Posta')"; 
	if (!$mysqli -> query($txertatu)){
		die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
	}else{
		/*$txertatu2="INSERT INTO ekintzak (konId, posta, ekintza, ordua, ip) VALUES ('$konId','$Posta','$Ekintza','$ordua', '$ip')"; 
		if (!$mysqli -> query($txertatu2)){
			die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
		}else{*/
			echo 'Ekintza zuzen txertatu da.';
			$xml = simplexml_load_file('galderak.xml');
			$assessmentItem = $xml->addChild('assessmentItem');
			$assessmentItem->addAttribute('konpl',$Zail);
			$assessmentItem->addAttribute('subject','');
			$itemBody= $assessmentItem ->addChild('itemBody');
			$itemBody->addChild('p',$Galdera);
			$correctResponse= $assessmentItem-> addChild('correctResponse');
			$correctResponse->addChild('value',$Answ);
			
			$xml->asXML('galderak.xml');
			
			
	}
	echo 'Galdera zuzen sartu da';
}else{
	echo'Ez da hutsunerik onartuko.';
}
	


?>