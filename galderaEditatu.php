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
	$row = mysqli_fetch_array($galdera);
	$num_rows=mysqli_num_rows($galdera);
	
?>
<html>
<head><title>GALDERAK EDITATU</title>
<script language="JavaScript">
	function gorde(){
		alert('Gordetzera zoaz');
		return true;
	}
</script>
</head>
<body>
<div align="center">
<form id="editatu" onSubmit="gorde()" action="galderaGorde2.php" method="POST">
  GALDERA*:
  <input type='text' title='galdera' name='galdera' id='galdera' value='a' /> 
  <br/>
  ERANTZUNA*(hitz batekoa):
  <input type='text' name='answ' id='answ' value="a" />
  <br/>
  ZAILTASUNA(1-5 bitartean):
  <input type='number' name='zail' id='zail' value="a" />
  <br/>
  <input type='hidden' name='answ' id='id' value="12" />
 <input type="submit" value="Gorde" /> 
</form>
 </div>
</body>
</html> 