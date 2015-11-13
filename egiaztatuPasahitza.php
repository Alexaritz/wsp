<?php
//nusoap.php klasea gehitzen dugu
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');


//soap_server motako objektua sortzen dugu
$ns="http://localhost/nusoap-0.9.5/samples"; //name of the service
$server = new soap_server;
$server->configureWSDL('passKonprobatu',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

//inplementatu nahi dugun funtzioa erregistratzen dugupggg
//funtzio bat baino gehiago erregistra liteke ...
$server->register('passKonprobatu',
array('x'=>'xsd:int','y'=>'xsd:int'),
array('z'=>'xsd:int')array(z=>xsd:int),
$ns);

//funtzioa inplementatzen da
function passKonprobatu($x, $y){
	$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
return $x + $y;
}

//nusoap klaseko service metodoari dei egiten diogu
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>