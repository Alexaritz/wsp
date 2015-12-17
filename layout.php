<?php
	session_start();
?>
<html>
  <head><title>Quizzes</title></head>
<body>
<div align="center">
	<h1>QUIZZES</h1>
	<h3>Hasiera orria</h3>
	<span id="logout" style="display: none;"><a  href="logOut.php" >Logout</a></span>
	<span id="signUp" style="display: none;"><a  href="signUpBerria.php" >Erregistratu</a></span>
	<span id="signIn" style="display: none;"><a  href="signIn.php" >Saioa Hasi</a></span>
	<span id="erab" style="display: none;"><a  href="IkusiErabiltzaileak.php" >Erabiltzaileak Ikusi</a></span>
	<span id="handling" style="display: none;"><a  href="handlingQuizzes.php" >Galderak Kudeatu</a></span>
	<span id="galderak" style="display: none;"><a  href="reviewingQuizzes.php" >Galderak Ikusi</a></span>
	<span id="jokoa" style="display: none;"><a  href="quiz.php" >Quizz jokoa</a></span>
</div>
<script>
function displayResult() {
    document.getElementById("myHeader").innerHTML = "Have a nice day!";
	document.getElementById("pass").style.display="none";
}
function irakas(){
	document.getElementById("logout").style.display="";
	document.getElementById("galderak").style.display="";
	document.getElementById("erab").style.display="";
}
function ikas(){
	document.getElementById("logout").style.display="";	
	document.getElementById("handling").style.display="";	
}
function anon(){
	document.getElementById("signIn").style.display="";
	document.getElementById("signUp").style.display="";
	document.getElementById("jokoa").style.display="";
	
	
}
</script>
<?php
	if(isset($_SESSION['email'])){
		if (isset($_SESSION['rol'])){
			if($_SESSION['rol']=="Irakas"){//IRAKASLEA BADA
				echo '<script type="text/javascript">'   , 'irakas();' , '</script>';
				echo "Irakasle bezala hasi duzu saioa.";
			}
			else if($_SESSION['rol']=="Ikas"){//IKASLEA BADA
				echo '<script type="text/javascript">'   , 'ikas();' , '</script>';
				echo "Ikasle bezala hasi duzu saioa.";
			}else{								//ANONIMOA BADA
				echo '<script type="text/javascript">'   , 'anon();' , '</script>';
				echo "Erabiltzaile anonimoa.";
			}				
		}else{
			$_SESSION['rol']="anon";
			echo '<script type="text/javascript">'   , 'anon();' , '</script>';
			echo "Erabiltzaile anonimoa.";
		}
	}else{										//ANONIMOA BADA, HASIERAN
		$_SESSION['rol']="anon";
		echo '<script type="text/javascript">'   , 'anon();' , '</script>';
		$_SESSION['email']=null;
		echo "Erabiltzaile anonimoa.";
	}
?>
</body>
</html> 