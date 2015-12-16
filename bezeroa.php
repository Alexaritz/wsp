<?php
//nusoap.php klasea gehit d zenugu
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
//soapclient motadun objektua sortzen du http://di/h tzen dugu. http://www.mydomain.com/server.php
//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
$soapclient = new nusoap_client( 'http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', false);

//Web-Service-n inplementatu dugun funtzioari dei egiten diogu
//eta itzultzen diguna inprimatzen dugu
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Posta= $_POST["email"];
//}

if (isset($_POST['email'])){
	if ($soapclient->call('comprobar',array('x'=>$Posta))=='NO'){
		echo 'Ez.';
	}elseif ($soapclient->call('comprobar',array('x'=>$Posta))=='SI'){
		echo 'Bai.';
	}else{
		echo 'Errorea.';
	}
}
echo '<h2>Request</h2><pre>'.htmlspecialchars($soapclient->request, ENT_QUOTES).'</pre>';
echo ' <h2> Response </h2><pre> '.htmlspecialchars($soapclient->response, ENT_QUOTES).'< pre>';

//echo '<h2>Debug</h2>';
//echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
//}
?>