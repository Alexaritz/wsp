<?php
session_start();
if(!isset($_SESSION["email"])){
	header("Location: errorea.php");
}
$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";


$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);

//$mysqli =new mysqli ("localhost","root","", $sdb);
if ($mysqli->connect_error) {
    printf("Connection failed: " . $mysqli->connect_error);
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Id= $_POST["id"];					
}
$Posta=$_SESSION['email'];

	$galdera = mysqli_query($mysqli, "SELECT * FROM Galdera where id=('$Id')" );
	$row = mysqli_fetch_assoc($galdera);
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
<form id="editatu2" onSubmit="return false;" >
  GALDERA*:
  <input type='text' title='galdera' name='galdera' id='galdera' value='<?php echo $row['galdera'];?> ' /> 
  <br/>
  ERANTZUNA*(hitz batekoa):
  <input type='text' name='answ' id='answ' value="<?php echo $row['erantzuna'];?>" />
  <br/>
  ZAILTASUNA(1-5 bitartean):
  <input type='number' name='zail' id='zail' value="<?php echo $row['zailtasuna'];?>" />
  <br/>
  <input type='hidden' name='answ' id='id' value="<?php echo $row['id'];?>" />
 <input type='button' name='gorde' id='gorde' value='Gorde'  /> 
 <div id="hint2"> </div>
</form>
 </div>
</body>
</html> 