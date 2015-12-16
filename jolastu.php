<?php
session_start();
$_SESSION['zuzenak'] = 0;
$_SESSION['okerrak'] = 0;
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

	
?>
<html>
<head><title>GALDERAK EDITATU</title>
<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script language="JavaScript">
	XMLHttpRequestObject = new XMLHttpRequest();

		function galderakIkusi(){
			document.getElementById("anonimo").style.display="none";		
			var anoname=document.getElementById("izena").value;
			XMLHttpRequestObject.open("GET","quizzes.php?anon="+anoname, true);
			XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
				document.getElementById('tabla').innerHTML=XMLHttpRequestObject.responseText;
			}}
			XMLHttpRequestObject.send();
		}
			/*XMLHttpRequestObject2 = new XMLHttpRequest();

		/*function konprobatu(){
			var id=document.getElementById("id").value;
			var erantzuna=document.getElementById("erantzuna").value;
			var param= "id="+id+"&erantzuna="+erantzuna;		
			XMLHttpRequestObject2.onreadystatechange = function(){
			if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 )){ 
				document.getElementById('hint').innerHTML=XMLHttpRequestObject2.responseText;
			}}
			XMLHttpRequestObject2.open("POST","konprobatu.php", true);
			XMLHttpRequestObject2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject2.send(param);
		}*/
		$(document).on("click", '#konprobatu', function(event) { 
			var id = document.getElementById('id').value; 
			var erantzuna = document.getElementById('erantzuna').value;
			$("#hint").load("konprobatu.php",{id:id, erantzuna:erantzuna} );
		});
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