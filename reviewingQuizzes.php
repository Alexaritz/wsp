<html>
<head><title>GALDERAK EDITATU</title>
<script type="text/javascript" language = "javascript" >
	XMLHttpRequestObject = new XMLHttpRequest();
		
	function galderaEditatu2(){
	var id=document.getElementById("idedit").value;
	var param= "id="+id;
	
	XMLHttpRequestObject.open("POST","galderaEditatu.php", true);
	XMLHttpRequestObject.onreadystatechange = function(){
	if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
		document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
	}}
	XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	XMLHttpRequestObject.send(param);
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
$mysqli =new mysqli ("localhost","root","", $sdb);
//$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);
if ($mysqli->connect_errno){
	die("<p>Errorea gertatu da: ".$mysqli -> error ."</p>");
}
$Ekintza='GalderakIkusi';
$ordua=date('H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
if (!isset($_SESSION['email'])) {
	$Posta='null';
	$konId='null';
}else{
	$Posta=$_SESSION['email'];
	$konId=$_SESSION['konId'];
}
$erabiltzaileak = $mysqli->query("SELECT * FROM Galdera");
$num_rows=mysqli_num_rows($erabiltzaileak);
	if ($num_rows> 0){
		echo '<table border=1>
		<tr>
		<th> Galdera </th>
		<th> Erantzuna </th>		
		<th> Zailtasuna </th>
		<th> Posta </th>
		<th> id </th>
		</tr>';

		while( $row = mysqli_fetch_array( $erabiltzaileak )) {
			echo '<tr><td>'.$row['galdera'].'</td> <td>'. $row['erantzuna'].'</td> <td>'. $row['zailtasuna'].'</td> <td>'. $row['posta'].'</td> <td>'. $row['id'].'</td></tr>';
		}

		echo '</table>';
	}else{
		echo 'Ez daukazu galderarik.';
	}
?>



<form action="galderaEditatu.php" onsubmit="return false;">

Sartu editatu nahi nuzun galderaren id zenbakia:
  <input type='text' title='idedit' name='idedit' id='idedit' value='' /> 
  <br/>
 <input type="button" name="galderaEditatu" value="Galdera Editatu" onclick='galderaEditatu2()'/>
   <div id="hint" style="background-color:#99FF66;">
	<p>Formularioa hemen agertuko da...</p>
  </div>
  
</form>
</body>
</html> 
