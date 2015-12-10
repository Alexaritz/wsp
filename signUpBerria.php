<!DOCTYPE html>
<html>
<head><title>FORMULARIOA</title>
<script type="text/javascript" language = "javascript" >
	

	
	/*function hutsaEz(){
	var email=document.getElementById("email").value;
			if (email=="" || email==null){
				return false;
			}
		return true;
	}*/
	XMLHttpRequestObject = new XMLHttpRequest();
	XMLHttpRequestObject2 = new XMLHttpRequest();
	XMLHttpRequestObject3 = new XMLHttpRequest();
	
	function bid(){
		if (balidatu()){
		bidali();
		bidali2();
		}
	}

	
	
	function bidali(){
			var email=document.getElementById("email").value;
			var param= "email="+email;
			XMLHttpRequestObject.onreadystatechange = function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200 )){ 
				document.getElementById('hint').innerHTML="Matrikulatuta dago?"+XMLHttpRequestObject.responseText;
			}}
			XMLHttpRequestObject.open("POST","bezeroa.php", true);
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(param);
	}
	
	function bidali2(){
			var pass=document.getElementById("pass").value;
			var pass2=document.getElementById("pass2").value;
			var param= "pass="+pass+"&pass2="+pass2;
			
			XMLHttpRequestObject2.onreadystatechange = function(){
			if ((XMLHttpRequestObject2.readyState==4)&&(XMLHttpRequestObject2.status==200 )){ 
				document.getElementById('hint2').innerHTML="Pasahitza zuzena da?"+XMLHttpRequestObject2.responseText;
			}}
			XMLHttpRequestObject2.open("POST","pasahitzak.php", true);
			XMLHttpRequestObject2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject2.send(param);
	}

	function balidatuTel(tel){
		var ptel = new RegExp("[0-9]{9}") ;
		if (ptel.test(tel)){
			return true;
		}else{
			return false;
		}	
	}
	
	function balidatuPass(pass){
		var ppas = new RegExp("[a-zA-Z,0-9]{6,}") ;
		if (ppas.test(pass)){
			return true;
		}else{
			return false;
		}	
	}
	
	function hutsaEz(){
	var frm=document.getElementById("erregistro");
	var n=6;
	if(document.getElementById("esp").value=="Besterik"){
	n=5;
	}
		for(i=0;i<frm.elements.length-n;i++){
			if (frm.elements[i].value=="" || frm.elements[i].value==null){
				return false;
			}
		}
		return true;
	}
	
	function balidatuPosta(posta){
		var pposta = new RegExp("[a-z]+[0-9]{3}@ikasle(\.e)hu(\.e)(us|s)") ;
		if (pposta.test(posta)){
			return true;
		}else{
			return false;
		}	
	}
	
	function izAbAb(izena){
		var izab = new RegExp("([A-Z]+[a-zA-Z]\s*)");
		if (izab.test(izena)){
			return true;
		}else{return false;}
	}
	
	function balidatu(){
		alert("a");
	 	if (hutsaEz()){
			if (balidatuPass(document.getElementById("pass").value)){
				if (balidatuTel(document.getElementById("tel").value)){
					if (balidatuPosta(document.getElementById("email").value)){
						if(izAbAb(document.getElementById("izena").value)){
							if(document.getElementById("pass").value==document.getElementById("pass2").value){
							alert("Formularioa ondo bidali da :)");
							return true;
							}else{alert("Pasahitzek ez dute koinziditzen.");}
						}else{alert("Izena eta bi abizenak sartu behar dituzu, eta bakoitzaren lehen hizkia letra larriz.");}
					}else{
						alert("EHUko posta sartu behar duzua.");
					}
				}else{
					alert("Telefono zenbakiak 9 digitu izan behar ditu.");
				}
			}else{
				alert("Pasahitzak 6 karaktere gutxienez, letrak eta zenbakiak bakarrik.");
			}
		}else{
			alert("Beharrezko* kutxak ezin dira hutsik utzi.");
		}return false;
	}

	 function irudiaErakutsi(irudia) {
        var files = irudia.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("img");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
	
	function besteEsp(){
		if (document.getElementById("esp").value=="Besterik"){
			document.getElementById("besteesp").style.display="inline";
		}
		else{
			document.getElementById("besteesp").style.display="none"; 
		}
	}
	
	function bukatu(){
				var izena=document.getElementById("izena").value;
				var email=document.getElementById("email").value;
				var pass=document.getElementById("pass").value;
				var tel=document.getElementById("tel").value;
				var erantzuna=document.getElementById("erantzuna").value;
				var esp=document.getElementById("esp").value;
				var besteesp=document.getElementById("besteesp").value;
				var interesak=document.getElementById("interesak").value;
				var galdera=document.getElementById("galdera").value;
				//var irudia=document.getElementById("irudia").value;
				
				if (document.getElementById("galdera").value=="galdera1"){
					galdera="Musika talde gustokoena?";
				}else if(document.getElementById("galdera").value=="galdera2"){
					galdera="Lehen maskotaren izena?";
				}else{
					galdera="Aitona/Amonaren jaioterria?";
				}
				
				var param= "izena="+izena+"&email="+email+"&pass="+pass+"&tel="+tel+"&galdera="+galdera+"&erantzuna="+erantzuna+"&esp="+esp+"&besteesp="+besteesp+"&interesak="+interesak;
				
				XMLHttpRequestObject3.open("POST","erregistratu.php", true);
				XMLHttpRequestObject3.onreadystatechange = function(){
				if ((XMLHttpRequestObject3.readyState==4)&&(XMLHttpRequestObject3.status==200 )){ 
					document.getElementById('reg').innerHTML=XMLHttpRequestObject3.responseText;
				}}
				XMLHttpRequestObject3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				XMLHttpRequestObject3.send(param); 
	}
	function dale(){
	if (XMLHttpRequestObject.responseText=='Bai.' && XMLHttpRequestObject2.responseText=='Bai.' ){
			bukatu();
	}
	}
	setInterval(dale,1000);
</script>
</head>
<body>
<div align="center">
<h1>Izen-emate formularioa</h1>
 
<form id="erregistro" name="erregistro">

  Izen-abizenak*:
  <input type="text" name="izena" id="izena" value="" />
  <br/>
  Posta elektronikoa*:
  <input type="text" title="EHUko posta" name="email" id="email" value="" />
  <br/>
  Pasahitza*:
  <input type="password" name="pass" id="pass" value="" />
  <br/>
  Sar ezazu pasahiza berriz:
  <input type="password" name="pass2" id="pass2" value="" />
  <br/>
  Telefono Zenbakiak*:
  <input type="text" name="tel" value="" id="tel" />
  <br/>
  Pasahitza berreskuratzeko galdera*:
  <select id="galdera">    
       <option value="galdera1" selected="selected">Musika talde gustokoena?</option>
       <option value="galdera2">Lehen maskotaren izena?</option>
       <option value="galdera3">Aitona/Amonaren jaioterria?</option>
  </select>
  <input type="text" name="erantzuna" value="" id="erantzuna" />
  <br/>
  Espezialitatea*:
  <select name="esp" id="esp" onchange="besteEsp()">    
       <option value="Konputazioa" selected="selected">Konputazioa</option>
       <option value="Software">Software</option>
       <option value="Hardware">Hardware</option>
	   <option value="Besterik">Besterik</option>
   </select>
    <br/>
   <textarea rows="1" cols="20" name="besteesp" id="besteesp" value=""   style="display: none;" ></textarea>
  <br/>
  Interesak:
  <br/>
  <textarea rows="5" cols="25" name="interesak" id="interesak" value=""  ></textarea>
  <br/>
  <input name="uploadedfile" type="file" accept="image/*" onchange="irudiaErakutsi(this)"/>
  <br/>
  <img id="img" src="" alt="image" style="width:15%; margin-top:10px;"/>  
  <br/>
  
   
  <input type="button" name="Bidali" value="Bidali" onclick="bid()"/>
  <input type="reset" value="Borratu" />
  <input type="button" name="Bidali" value="Proba" onclick='bukatu()'/>
  <div id="hint" style="background-color:#99FF66;" >
	<p>Email-a zuzena den ala ez</p>
  </div>
  <div id="hint2" style="background-color:#99FF66;">
	<p>Pasahitza zuzena den ala ez</p>
  </div>
    <div id="reg" style="background-color:#99FF66;">
	<p>Erregistratu zara?</p>
  </div>
</form>
<a href='layout.html'>Hasiera</a>
<div align="center">
</body>
</html>
