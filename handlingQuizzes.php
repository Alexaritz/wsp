<html>
<head><title>GALDEREN MANEIUA</title>
<script type="text/javascript" language = "javascript">
	XMLHttpRequestObject = new XMLHttpRequestObject();
	
	XMLHttpRequestObject.onreadystatechange = function(){
	alert(XMLHttpRequestObject.readyState);
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
		document.getElementById("txtHint").innerHTML=XMLHttpRequestObject.responseText;
}}
	function galderakIkusi(){
	alert('ALex');
	XMLHttpRequestObject.open("GET","gureGalderak.php", true);
	XMLHttpRequestObject.send();
	}
	function galderaTxertatu(){
	var zail=document.getElementById("zail").value;
	if(zail!=""&&zail>0&&zail<6){
		XMLHttpRequestObject.open("GET","sartuGaldera.php", true);
		XMLHttpRequestObject.send();
	}else{
		alert('Zailtasuna 1-5 artean.');
	}
	}
</script>
</head>
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
 <button onclick="galderaTxertatu()">Galdera Txertatu</button>
 <button onclick="galderakIkusi()">Galderak Ikusi</button>

 </form>
  <div id="txtHint" style="background-color:#99FF66;">
	<p>Nire kideak hemen agertuko agertuko dira...</p>
  </div>
<?php
session_start();
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
				$Galdera= $_POST["galdera"];
				$Answ= $_POST["answ"];
				$Zail= $_POST["zail"];
				
}

$Posta=$_SESSION['email']; 
$Ekintza='GalderaTxertatu';
$konId=$_SESSION['konId'];
$ordua=date('H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];

?>

<a href='layout.html'>Hasiera</a>
<br/>
<div align="center">
</body> 
</html> 
