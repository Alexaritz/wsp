<!DOCTYPE html>
<html>
<head><title>FORMULARIOA</title>
<script type="text/javascript" language = "javascript" >
	XMLHttpRequestObject = new XMLHttpRequest();
	
	function hutsaEz(){
	var email=document.getElementById("email").value;
			if (email=="" || email==null){
				return false;
			}
		return true;
	}
	function bid(){
		bidali();
		bidali2();
	}
	
	
	
	
	function bidali(){
		if (hutsaEz()){
			XMLHttpRequestObject.open("POST","bezeroa.php", true);
			
			var email=document.getElementById("email").value;
			var param= "email="+email;
			
			XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
				document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
			}}
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(param);
		}else{
			alert('Hutsik ez utzi.');
		}
	}
	function bidali2(){
		if (hutsaEz()){
			XMLHttpRequestObject.open("POST","pasahitzak.php", true);
			
			var pass=document.getElementById("pass").value;
			var param= "pass="+pass;
			
			XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
				document.getElementById('hint2').innerHTML=XMLHttpRequestObject.responseText;
			}}
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(param);
		}else{
			alert('Hutsik ez utzi.');
		}
	}

	

</script>
</head>
<body>
<div align="center">
<h1>Izen-emate formularioa</h1>
 
<form id="erregistro" name="erregistro">

  Posta elektronikoa*:
  <input type="text" title="EHUko posta" name="email" id="email" value="" />
  <br/>
  Pasahitza*:
  <input type="password" name="pass" id="pass" value="" />
  <input type="button" name="Bidali" value="Bidali" onclick='bid()'/>
  <input type="reset" value="Borratu" />
  <div id="hint" style="background-color:#99FF66;">
	<p>Email-a zuzena den ala ez</p>
  </div>
  <div id="hint2" style="background-color:#99FF66;">
	<p>Pasahitza zuzena den ala ez</p>
  </div>
</form>
<a href='layout.html'>Hasiera</a>
<div align="center">
</body>
</html>
