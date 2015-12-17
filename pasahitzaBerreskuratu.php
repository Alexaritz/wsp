<html>   
<head>   
<title>PASAHITZA BERRESKURATU</title>   
<script>
XMLHttpRequestObject = new XMLHttpRequest();

function konprobatu(){	
	var erantzuna=document.getElementById("erantzuna2").value;
	var param= "erantzuna2="+erantzuna;
	XMLHttpRequestObject.onreadystatechange = function(){
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
		document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
	}}
	XMLHttpRequestObject.open("POST","ajaxPasahitzaBer.php", true);
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send(param);	
}

</script>
</head>   

<body>   
<?php
session_start();

$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";
$mysqli =new mysqli ("localhost","root","", $sdb);
//$mysqli = new mysqli ($servidor,$usuario,$password, $sdb);
if ($mysqli->connect_errno){
	die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
}

//$Posta = $_POST['email'];
$Posta = $_SESSION['email'];



$row = $mysqli->query("SELECT * FROM Erabiltzaile WHERE posta='$Posta'");
$row1 = mysqli_fetch_assoc($row);
$galdera = $row1["Galdera"];
$erantzuna = $row1["Erantzuna"];
//echo "$erantzuna";

$_SESSION['erantzuna'] = $erantzuna;
?>
</body>   
	<div align="center">
		<h1>Pasahitza berreskuratzeko formularioa</h1>
		<h3> <?php echo "$galdera";?> </h3>
		<form id="erregistro" name="erregistro" method="post" >
		
		Erantzuna:
		<input type="text"  id="erantzuna2" value="" />
		<br/>
		<input type="button" id="Bidali" value="Bidali" onclick='konprobatu()'/>
		<br/>
		</form>
	</div>
	<div align="center" id="hint">
	</div>
</html>  