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
		

		<center><h1>Estado de Preguntas</h1></center>   
     
     <?php
	 	$registros=mysql_query("SELECT * FROM inmobiliario WHERE enlace_cliente =".$_SESSION['user']);
		
	if($registros)
{
    while($row = mysql_fetch_array($registros))
    {
        echo "<hr>";
		echo "<br>";
		if($row['venta']>0)
		{
		echo "Precio venta: ".$row['venta']."<br>";
		}else{
			echo "Precio venta: Este establecimiento no esta en venta";
			echo"<br>";

		}
		if($row['renta']>0)
		{
		echo "Precio renta: ".$row['renta']."<br>";
		}else{
			echo "Precio renta: Este establecimiento no esta en renta";
			echo"<br>";
		}
		
		echo "Latitud: ".$row['latitud']."<br>";
		echo "Longitud: ".$row['longitud']."<br>";
		echo "Descripción: ".$row['descripcion']."<br>";
		echo "Cliente: ".$row['enlace_cliente']."<br>";
		
		
		echo "<br>";
		echo "<hr>";
    }
} else {
    echo 'Invalid query: ' . mysql_error() . "\n";
    echo 'Whole query: ' . $query; 
}
	

	

?>
	

	






	</div>
	<div data-role="footer">
		<h4><a href="menuP.php">Regresar</a></h4>
	</div>
</div>



</body>
</html>