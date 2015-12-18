<html>   
<head>   
<title>Datuk gordekoizkiu</title>   
</head>   

<body>   
<?php  
session_start(); 
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root  u266570359_alex
$password = "7dc3PZD4K8";//7dc3PZD4K8
$sdb = "u266570359_quiz";
       

$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);

//$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 

$emailfields = "/[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(us|s)/";
$passfields = "/[a-zA-Z,0-9]{6,}/";
$telfields = "/[0-9]{9}/";
$izenafields = "/([A-Z]+[a-zA-Z]\s*)/";

$izena=$_POST ['izena'];
$email=$_POST ['email'];
$pass=$_POST ['pass'];
$tel=$_POST ['tel'];
$galdera=$_POST ['galdera'];
$erantzuna=$_POST ['erantzuna'];
$besteesp=$_POST ['besteesp'];
$esp=$_POST ['esp'];
$interesak=$_POST['interesak'];
$Pasahitza = crypt($pass, 'rd');


if($_FILES['image']['error']==0){
	$file= $_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
}else{
	$image=null;
	$image_name="";
}


if (filter_var($email,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$emailfields)))){
	if (filter_var($pass,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$passfields)))){
		if (filter_var($tel,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$telfields)))){
			if (filter_var($izena,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$izenafields)))){
				if($esp=='Besterik'){
					if(!$besteesp==''){
						$txertatu="INSERT INTO Erabiltzaile(IzenaAb, Posta,Pasahitza, Tel, Espezialitatea, Interesak, Galdera, Erantzuna, Argazkia, ArgazkiIzena) VALUES ('$_POST[izena]','$_POST[email]','$Pasahitza','$_POST[tel]','$_POST[besteesp]','$_POST[interesak]', '$galdera', '$erantzuna', '$image','$image_name')"; 
						if (!$mysqli -> query($txertatu)){
							die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
						}
						$_SESSION['email']=$email;
						if(strpos($email,'ikasle')){
							$_SESSION['rol']="Ikas";
							header('Location: handlingQuizzes.php');
						}else{
							$_SESSION['rol']="Irakas";
							header('Location: layout.php');
						}
					}
					else{
						echo 'Beste espezialitatea sartu behar duzu';
					}
				}else{
					$txertatu="INSERT INTO Erabiltzaile(IzenaAb, Posta,Pasahitza, Tel, Espezialitatea, Interesak, Galdera, Erantzuna, Argazkia, ArgazkiIzena) VALUES ('$_POST[izena]','$_POST[email]','$Pasahitza','$_POST[tel]','$_POST[esp]','$_POST[interesak]', '$galdera', '$erantzuna', '$image','$image_name')";  
					if (!$mysqli -> query($txertatu)){
						die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
					}
					$_SESSION['email']=$email;
					if(strpos($email,'ikasle')){
						$_SESSION['rol']="Ikas";
						header('Location: handlingQuizzes.php');
					}else{
						$_SESSION['rol']="Irakas";
						header('Location: layout.php');
					}
				}	
			}else{mysqli_close($mysqli);
				echo 'Izena eta bi abizenak sartu behar dituzu, eta bakoitzaren lehen hizkia letra larriz';}			
		}else{mysqli_close($mysqli);
			echo 'Telefono zenbakiak 9 digitu izan behar ditu.';}				
	}else{mysqli_close($mysqli);
		echo 'Pasahitzak 6 karaktere gutxienez, letrak eta zenbakiak bakarrik.';}
}else{mysqli_close($mysqli);
	echo 'Ez da EHUko posta';}

	
?>   
</body>   

</html>  