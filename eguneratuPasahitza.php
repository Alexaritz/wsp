<?php
session_start();

$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";
//$mysqli =new mysqli ("localhost","root","", $sdb);
$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
if ($mysqli->connect_errno){
	die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
}

//$Erantzuna = $_POST["erantzuna"];
$PassBerri = $_POST["pasahitzberria"];
$Posta = $_SESSION["email"];
$Pasahitza=crypt($PassBerri, "rd");

$Pass=$PassBerri;
$Pass2=$PassBerri;

require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
//soapclient motadun objektua sortzen du http://di/h tzen dugu. http://www.mydomain.com/server.php
//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
$soapclient = new nusoap_client( 'http://wsalex.hol.es/proiektuakws/ikasleak/egiaztatuPasahitza.php?wsdl/egiaztatuPasahitza.php?wsdl', false);

//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
//eta itzultzen diguna inprimatzen dugu


if (isset($Pass)&&isset($Pass2)){
	if ($soapclient->call('egiaztatuPasahitza',array('x'=>$Pass, 'y'=>$Pass2))=='BALIOGABEA'){
		echo 'Pasahitza ez da segurua.';
		echo "<a href='pasahitzaBerreskuratu.php'>Atzera</a>";
	}elseif ($soapclient->call('egiaztatuPasahitza',array('x'=>$Pass, 'y'=>$Pass2))=='BALIOZKOA'){	
		$EGUNERATU = "UPDATE Erabiltzaile SET Pasahitza = '$Pasahitza' WHERE Posta = '$Posta'";
		if (!$mysqli -> query($EGUNERATU)){
					die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
		}else{
			echo "Pasahitza zuzen eguneratu da. <br/>";
			echo "Itzuli hasiera orrira: ";
			echo "<a href='layout.php'>Hasiera</a>";
		}
	}elseif ($soapclient->call('egiaztatuPasahitza',array('x'=>$Pass, 'y'=>$Pass2))=='EZBERDINAK'){
		echo '<h1>Pasahitzak ezberdinak dira.</h1>';
	}else{
		echo 'Errorea.';
	}
}








?>