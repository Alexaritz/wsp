<html>   
<head>   
<title>Datuk gordekoizkiu</title>   
</head>   

<body>   
<?php   
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root  u266570359_alex
$password = "7dc3PZD4K8";//7dc3PZD4K8
$sdb = "u266570359_quiz";
       
mysql_connect($servidor,$usuario,$password) or die(mysql_error());
mysql_select_db($sdb) or die (mysql_error());

$emailfields = "/[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(us|s)/";
$passfields = "/[a-zA-Z,0-9]{6,}/";
$telfields = "/[0-9]{9}/";
$izenafields = "/([A-Z]+[a-zA-Z]\s*)/";


$email=$_POST ['email'];
$pass=$_POST ['pass'];
$tel=$_POST ['tel'];
$izena=$_POST ['izena'];
$besteesp=$_POST ['besteesp'];
$esp=$_POST ['esp'];


if (filter_var($email,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$emailfields)))){
	if (filter_var($pass,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$passfields)))){
		if (filter_var($tel,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$telfields)))){
			if (filter_var($izena,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$izenafields)))){
				if($esp=='Besterik'){
					if(!$besteesp==''){
						$txertatu="INSERT INTO Erabiltzaile(IzenaAb, Posta,Pasahitza, Tel, Espezialitatea, Interesak) VALUES ('$_POST[izena]','$_POST[email]','$_POST[pass]','$_POST[tel]','$_POST[besteesp]','$_POST[interesak]')"; 
						if (!mysql_query($txertatu)){
							die('Errorea: ' . mysql_error());
						}
						mysql_close();
						echo "<p>Datuak zuzen gorde dira.</p> <p><a href='IkusiErabiltzaileak.php'>ERREGISTROAK IKUSI</a></p>   ";
					}
					else{
						echo 'Beste espezialitatea sartu behar duzu';
					}
				}else{
					$txertatu="INSERT INTO Erabiltzaile(IzenaAb, Posta,Pasahitza, Tel, Espezialitatea, Interesak) VALUES ('$_POST[izena]','$_POST[email]','$_POST[pass]','$_POST[tel]','$_POST[esp]','$_POST[interesak]')";  
					if (!mysql_query($txertatu)){
						die('Errorea: ' . mysql_error());
					}
					mysql_close();
					echo "<p>Datuak zuzen gorde dira.</p> <p><a href='IkusiErabiltzaileak.php'>ERREGISTROAK IKUSI</a></p>   ";
				}	
			}else{mysql_close();
				echo 'Izena eta bi abizenak sartu behar dituzu, eta bakoitzaren lehen hizkia letra larriz';}			
		}else{mysql_close();
			echo 'Telefono zenbakiak 9 digitu izan behar ditu.';}				
	}else{mysql_close();
		echo 'Pasahitzak 6 karaktere gutxienez, letrak eta zenbakiak bakarrik.';}
}else{mysql_close();
	echo 'Ez da EHUko posta';}

	
?>   
</body>   

</html>  