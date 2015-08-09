<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link href="jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
		<h1><img class="logoimage"src ="logo.png" width="150" height="100"></h1>
		<h1>Bienvenido(a) <?php echo $userRow['username']; ?></h1>
	</div>
	<div data-role="content">	
		<ul data-role="listview">
			<li><a href="registrarInmobilario.php">Registrar Inmobiliario</a></li>
            <li><a href="consulta.php">Consultar registros</a></li>
            
			<li><a href="logout.php?logout">Salir</a></li>
		</ul>		
	</div>
	<div data-role="footer">
		<h4>San Luis Potosí, S.L.P.</h4>
	</div>
</div>



</body>
</html>