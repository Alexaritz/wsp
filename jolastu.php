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
		$Id= $_POST["id"];					
}

$Posta=$_SESSION['email'];
$konId=$_SESSION['konId'];

$galdera = mysqli_query($mysqli, "SELECT * FROM galdera where id=('$Id')" );
$row = mysqli_fetch_assoc($galdera);
$num_rows=mysqli_num_rows($galdera);
	
?>
<html>
<head><title>GALDERAK EDITATU</title>
<script language="JavaScript">
	XMLHttpRequestObject = new XMLHttpRequest();

		function galderakIkusi(){
			var anon=document.getElementById("");
	XMLHttpRequestObject.open("GET","quiz.php?anon=", true);
	XMLHttpRequestObject.onreadystatechange = function(){
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
		document.getElementById('tabla').innerHTML=XMLHttpRequestObject.responseText;
	}}
	XMLHttpRequestObject.send();
	}
</script>
</head>
<body>
<div align="center">
<form id="anonimo" onsubmit="return false;">
  ERABILTZAILE IZENA*:
  <input type='text' title='izena' name='izena' id='izena' value='' /> 
  <input type="button" name="galderaIkusi" value="Galderak Ikusi" onclick='galderakIkusi()'/>
</form>
<div id="tabla" >
 
 </div>
 </div>
</body>
</html> 