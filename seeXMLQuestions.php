<html>
<head><title>XML-an DAUDEN GALDERAK</title>
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


echo '<table border=1>
<tr>
<th> Galdera </th>
<th> Zailtasuna </th>
<th> Gaia </th>
</tr>';

$xml = simplexml_load_file("galderak.xml");
	foreach($xml ->children() as $child){
		$Galdera = $child[0] -> itemBody -> p;
		$Konpl = $child[0]['konpl'];
		$Gaia = $child[0]['subject'];
		
		echo "<tr><td>".$Galdera."</td>";
		echo "<td>". $Konpl."</td>";
		echo "<td>". $Gaia. "</td></tr>";
	}
	
	echo "<a href='layout.html'>Hasiera</a>";
?>

<br/> 
<a href='insertQuestion.php'>Atzera</a>
</div>
</body> 
</html> 