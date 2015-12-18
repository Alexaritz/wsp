<?php
session_start();
echo $_GET["anon"];echo ' moduan sartu zara.';
echo '<a href="jolastu.php">Irten</a>';
?>
<html>
<head>
<script language="JavaScript">
	XMLHttpRequestObject = new XMLHttpRequest();

		/*function konprobatu(){
			var id=document.getElementById("id").value;
			var erantzuna=document.getElementById("erantzuna").value;
			var param= "id="+id+"&erantzuna="+erantzuna;		
			XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
				document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
			}}
			XMLHttpRequestObject.open("POST","konprobatu.php", true);
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(param);
		}*/

</script>
</head>
<body>
<form id="galdera" onsubmit="return false;">
 GALDERAREN ID-A:
  <input type='text' title='izena' name='id' id='id' value='' /> 
  <br/>
  GALDERAREN ERANTZUNA:
  <input type='text' title='izena' name='erantzuna' id='erantzuna' value='' /> 
  <input type='button' title='konprobatu' name='konprobatu' id='konprobatu' value='Konprobatu'  /> 
  <br/>
  </form>
<div align="center">
<h1>GALDERAK</h1>
<?php


$servidor = "mysql.hostinger.es";//localhost mysql.hostinger.es
$usuario = "u266570359_alex";//root u266570359_alex
$password = "7dc3PZD4K8";// 7dc3PZD4K8
$sdb = "u266570359_quiz";
//$mysqli =new mysqli ("localhost","root","", $sdb);
$mysqli =new mysqli ($servidor,$usuario,$password, $sdb);

	
$erabiltzaileak = mysqli_query($mysqli, "SELECT * FROM Galdera" );
echo '<table border=1>
<tr>
<th> Id </th>
<th> Galdera </th>
<th> Zailtasuna </th>
</tr>';

while( $row = mysqli_fetch_array( $erabiltzaileak )) {
	echo '<tr> <td>'.$row['id'].'</td> <td>'.$row['galdera'].'</td> <td>'. $row['zailtasuna'].'</td></tr>';
}

echo '</table>';


?>

  <div id="hint"> </div>
</div>
</body> 
</html> 