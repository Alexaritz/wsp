<?php
session_start();

$er1 = $_SESSION['erantzuna'];
$er2 = $_POST['erantzuna2'];

if ("$er1" == "$er2"){
	echo '<form id="erregistro" name="erregistro" method="post" action="eguneratuPasahitza.php">';
	echo 'Sartu pasahitz berria hemen: <br/>';
	echo '<input type="text" name="pasahitzberria" id="pasahitzberria" value=""  />';
	echo '<br/>';
	echo '<button name="submit" id="submit" type="submit" value="submit" >Eguneratu</button>';
	echo '</form>';
}else{ echo "Erantzuna ez da zuzena, saiatu berriro.";}		
?>