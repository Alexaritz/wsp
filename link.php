<html>
<head>
<script type="text/javascript" language="javascript">

</script>
</head>

<body>
<div align="center">
Zuzen erregistratu zara.
<?php
	session_start();
	if(strpos($_SESSION['email'],'ikasle')){
		echo '<a href="handlingQuizzes.php">Jarraitu</a>';
	}else {
		echo'<a href="irakasle.html">Jarraitu</a>';
	}
?>
<div align="center">
</body> 
</html> 