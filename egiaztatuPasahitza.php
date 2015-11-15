<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
$ns="http://localhost/ikasleak/egiaztatuPasahitza.php?wsdl"; //name of the service
$server = new soap_server;
$server->configureWSDL('egiaztatuPasahitza',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('egiaztatuPasahitza',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

function egiaztatuPasahitza($x){
	$pass=trim(utf8_encode($x));	
	echo $pass;
	$bai=FALSE;
	$myfile = fopen("Top500.txt", "r") or die("Unable to open file!");
	
	while (!feof($myfile)){
		$y=fgets($myfile);
		if($x==$y){
			$bai=TRUE;
		}
	}
	if ($bai){
		return 'BALIOZKOA';
	}else{
		return 'BALIOGABEA';
	}
	$fclose($file);
}	
	/*$file= fopen("Top500.txt","r");
	$pass=trim(utf8_encode($x));
	if($file){
		while(($buffer= fgets($file))!==false){
				$ir=trim(utf8_encode($buffer));
			if($pass==$ir)
				return "BALIOGABEA";
		}
		if(!feof($file)){
			echo"Errorea: fgets() errorea eman du\n";			
		}else{
			return"BALIOZKOA";
		}/*echo count($file).'<br>';
		foreach($file as $name)
		{
			echo $name.'<br>';
		}*/
		/*	$fclose($file);
	}else{
		echo"Ezin izan da fitxategia iriki";
	}
	*/


//nusoap klaseko service metodoari dei egiten diogu
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>