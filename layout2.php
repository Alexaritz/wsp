	<html>
  <head><title>Quizzes</title>
	<script> 
	function ikaslearenEstekak(){
			document.getElementById("signup").style.display="none";
			document.getElementById("signin").style.display="none";
			document.getElementById("try").style.display="none";
			document.getElementById("logout").style.display="inline";
			document.getElementById("handling").style.display="inline";
			document.getElementById("review").style.display="none";
			document.getElementById("listusers").style.display="none";
		}
	
		function irakaslearenEstekak(){
			alert("a");
			document.getElementById("signup").style.display="none";
			document.getElementById("signin").style.display="none";
			document.getElementById("try").style.display="none";
			document.getElementById("logout").style.display="inline";
			document.getElementById("handling").style.display="none";
			document.getElementById("review").style.display="inline";
			document.getElementById("listusers").style.display="inline";
		}
	<?php
		session_start();
		echo "<p>blas<p>";
		//if(isset($_SESSION['email'])){
			$Posta = $_SESSION['email'];
			echo "$Posta";
			
					
			if ($_SESSION['rol'] == "Ikas"){ 
			echo '<script type="text/javascript">'   , 'ikaslearenEstekak();'   , '</script>';
					//echo ikaslearenEstekak();
			}else if ($_SESSION['rol'] == "Irakas"){
				echo '<script type="text/javascript">'   , 'irakaslearenEstekak();'   , '</script>';
					//irakaslearenEstekak();		
			}
		//}?> 
		
	</script>
	
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	
	   
  </head>
  <body>
 
		<div align="center">
			<h1> QUIZZES: Praktika Orokorra </h1>
			</br>	
			<a id="signup" href="signUpBerria.php">Erregistratu</a>
			</br>
			<a id="signin" href="signIn.php">Saioa hasi</a> <!--honen barruan pasahitza berreskuratu-->
			</br>
			<a id="try" href="">Zenbat dakizu? Proba nazazu!</a> <!--5.puntua, OSATZEKO-->
			</br>
			<a id="logout" href="logOut.php" style="display: none;">Logout</a>
			</br>
			<a id="handling" href="handlingQuizzes.php" style="display: none;" >Handling quizzes</a>
			</br>
			<a id="review" href="reviewingQuizzes.php" style="display: none;" >Review quizzes</a>
			</br>
			<a id="listusers" href="IkusiErabiltzaileak.php" style="display: none;" >List users</a>	
		</div>	
  
	
  
  <!--<div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href="signIn.php">Login</a></span><br/>
	  <span class="right"><a href="signUp.html">SignUp</a></span>
      <span class="right" style="display:none;"><a href="logout">Logout</a></span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='quiz.php'>Quizzes</a></span>
		<span><a href='credits.html'>Kredituak</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<!--<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>-->
</body>
</html>