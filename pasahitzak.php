<?php
//nusoap.php klasea gehit d zenugu
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
//soapclient motadun objektua sortzen du http://di/h tzen dugu. http://www.mydomain.com/server.php
//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
$soapclient = new nusoap_client( 'egiaztatuPasahitza.php?wsdl', false);

//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
//eta itzultzen diguna inprimatzen dugu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Pass= $_POST["pass"];
}

if (isset($_POST['pass'])){
	/*
	$result=$soapclient->call('egiaztatuPasahitza',array('x'=>$Pass));
	echo $result.'2';
		if($result=="BALIOZKOA"){
			echo"Pasahitza baliozkoa da";
		}elseif($result=="BALIOGABEA"){
			echo"Sartu duzun pasahitza arruntegia da";
		}else{
			echo"ZE PUTETXE";
		}
	*/
	
	echo $soapclient->call('egiaztatuPasahitza',array('x'=>$Pass)).'aaa';
	if ($soapclient->call('egiaztatuPasahitza',array('x'=>$Pass))=="BALIOGABEA"){
		echo '<h1>Zuzena da? Ez.</h1>';
	}elseif ($soapclient->call('egiaztatuPasahitza',array('x'=>$Pass))=='BALIOZKOA'){
		echo '<h1>Zuzena da? Bai.</h1>';
	}else{
		echo 'Errorea.';
	}
}
//echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
//echo ' <h2> Response </h2><pre> '.htmlspecialchars($soapclient->response, ENT_QUOTES).'< pre>';

//echo '<h2>Debug</h2>';
//echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
//}
?>