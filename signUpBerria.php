<!DOCTYPE html>
<html>
<head><title>FORMULARIOA</title>
<script type="text/javascript" language = "javascript" >
	
	
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
	
	
	
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject2 = new XMLHttpRequest();
	
	function bidali(){
		
		if (hutsaEz()){
			var email=document.getElementById("email").value;
			var param= "email="+email;
			XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
				document.getElementById('hint').innerHTML=XMLHttpRequestObject.responseText;
			}}
			XMLHttpRequestObject.open("POST","bezeroa.php", true);
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(param);
		}else{
			alert('Hutsik ez utzi.');
		}
	}
	function bidali2(){
		
		if (hutsaEz()){
			
			
			var pass=document.getElementById("pass").value;
			var pass2=document.getElementById("pass2").value;
			var param= "pass="+pass+"&pass2="+pass2;
			
			XMLHttpRequestObject2.onreadystatechange = function(){
			if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 )){ 
				document.getElementById('hint2').innerHTML=XMLHttpRequestObject2.responseText;
			}}
			XMLHttpRequestObject2.open("POST","pasahitzak.php", true);
			XMLHttpRequestObject2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject2.send(param);
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
  <br/>
  Sar ezazu pasahiza berriz:
  <input type="password" name="pass2" id="pass2" value="" />
  <br/>
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
