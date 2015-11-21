<?php
session_start();
if(!isset($_SESSION["email"])){
		header("Location: errorea.php");
}
?>
<html>
<head><title>GALDEREN MANEIUA</title>
<script type="text/javascript" language = "javascript" >
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject2 = new XMLHttpRequest();
	XMLHttpRequestObject3 = new XMLHttpRequest();
	
	
	
	function galderakIkusi(){
	XMLHttpRequestObject.open("POST","gureGalderak.php", true);
	XMLHttpRequestObject.onreadystatechange = function(){
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
		document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
	}}
	XMLHttpRequestObject.send();
	}
	function galderaTxertatu2(){
	var galdera=document.getElementById("galdera").value;
	var answ=document.getElementById("answ").value;
	var zail=document.getElementById("zail").value;
	var param= "galdera="+galdera+"&answ="+answ+"&zail="+zail;
	
	XMLHttpRequestObject2.open("POST","sartuGaldera.php", true);
	XMLHttpRequestObject2.onreadystatechange = function(){
	if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 )){ 
		document.getElementById('hint').innerHTML=XMLHttpRequestObject2.responseText;
	}}
	XMLHttpRequestObject2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject2.send(param);
	}
	
	function galderaKop(){
	XMLHttpRequestObject3.open("POST","galderaKop.php", true);
	XMLHttpRequestObject3.onreadystatechange = function(){
	if ((XMLHttpRequestObject3.readyState==4)&&(XMLHttpRequestObject3.status==200 )){ 
		document.getElementById('kop').innerHTML=XMLHttpRequestObject3.responseText;
	}}
	XMLHttpRequestObject3.send();
	}
	setInterval(galderaKop,5000);

</script>
</head>
<body >
<div align="center">
<form onsubmit="return false;">
	GALDERA*:
  <input type='text' title='galdera' name='galdera' id='galdera' value='' /> 
  <br/>
  ERANTZUNA*(hitz batekoa):
  <input type='text' name='answ' id='answ' value='' />
  <br/>
  ZAILTASUNA(1-5 bitartean):
  <input type='number' name='zail' id='zail' value='' />
  <br/> 
  <input type="button" name="galderaTxertatu" value="Galdera Txertatu" onclick='galderaTxertatu2()'/>
  <input type="button" name="galderaIkusi" value="Galderak Ikusi" onclick='galderakIkusi()'/>
 </form>
  <div id="hint" style="background-color:#99FF66;">
	<p>Nire kideak hemen agertuko agertuko dira...</p>
  </div>
   <div id="kop" style="background-color:#99FF66;">
	<p>Galderak hemen agertuko dira...</p>
  </div>
<?php
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
