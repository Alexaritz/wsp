<html>
<head><title>GALDERAK EDITATU</title>
<script type="text/javascript" language = "javascript" >
	/*XMLHttpRequestObject = new XMLHttpRequest();
	
	function gorde(){
	var galdera=document.getElementById("galdera").value;
	var answ=document.getElementById("answ").value;
	var zail=document.getElementById("zail").value;
	var param= "galdera="+galdera+"&answ="+answ+"&zail="+zail;
	
	XMLHttpRequestObject.open("POST","galderaGorde.php", true);
	XMLHttpRequestObject.onreadystatechange = function(){
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
		document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
	}}
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send(param);*/
	}
</script>
</head>
<body>
<div align="center">
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
		$Id= $_POST["id"];					
}
$Posta=$_SESSION['email']; 
$Ekintza='GalderaTxertatu';
$konId=$_SESSION['konId'];
$ordua=date('H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];

	$galdera = mysqli_query($mysqli, "SELECT * FROM galdera where id=('$Id')" );
	$row = mysqli_fetch_array($galdera);
	$num_rows=mysqli_num_rows($galdera);
	
?>
<form onsubmit="return true;" action="galderaGorde.php" method="POST">
  GALDERA*:
  <input type='text' title='galdera' name='galdera' id='galdera' value='<?php echo $row['galdera'];?> ' /> 
  <br/>
  ERANTZUNA*(hitz batekoa):
  <input type='text' name='answ' id='answ' value="<?php echo $row['erantzuna'];?>" />
  <br/>
  ZAILTASUNA(1-5 bitartean):
  <input type='number' name='zail' id='zail' value="<?php echo $row['zailtasuna'];?>" />
  <br/>
 <input type="submit" value="Gorde" /> 

<div id="hint" style="background-color:#99FF66;">
	<p>Formularioa hemen agertuko da...</p>
  </div>
  
</form>  
</body>
</html> 