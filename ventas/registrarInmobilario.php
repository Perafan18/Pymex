<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);


if(isset($_POST['btn-signup']))
{
	
	if(isset($_POST['renta']))
	{
		$renta = mysql_real_escape_string($_POST['renta']);
	}
	if(isset($_POST['venta']))
	{
		$venta = mysql_real_escape_string($_POST['venta']);
	}

	 
	 
	 $superficie = mysql_real_escape_string($_POST['superficie']);
	 
	 $descripcion = mysql_real_escape_string($_POST['descripcion']);
	 $enlace_cliente = mysql_real_escape_string($_SESSION['user']);
	 
	 if(mysql_query("INSERT INTO inmobiliario(venta,renta,latitud,longitud,descripcion,superficie,enlace_cliente) VALUES('$venta','$renta','$latitud','$longitud','$descripcion','$superficie','$enlace_cliente')"))
	 {
	  ?>
			<script>alert('Registro realizado ');</script>
			<?php
	 }
	 else
	 {
	  ?>
			<script>alert('Ocurrió un error');</script>
			<?php
	 }
}

?>




<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link href="jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery.mobile-1.0.min.js" type="text/javascript"></script>

<script type="text/javascript">
            function ventaRenta() {
                if (document.getElementById('radio-choice-1').checked) {
                    document.getElementById('precior').style.display = 'block';
                }
                else document.getElementById('precior').style.display = 'none';
                if (document.getElementById('siv').checked) {
                    document.getElementById('preciov').style.display = 'block';
                }
                else document.getElementById('preciov').style.display = 'none';
            }
        </script>
        <script>
			
			
			function borrado()
			{
                document.getElementById("myForm").reset();
			}
		</script>
<meta http-equiv="content-type" charset="encoding" content="text/html; charset=iso-8859-1">
</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
		<h1><img class="logoimage"src ="logo.png" width="150" height="100"></h1>
		<h1>Bienvenido(a) <?php echo $userRow['username']; ?></h1>
	</div>
	<div data-role="content">



		
            <iframe src="mapa.php" width="100%" height="500px">
            </iframe>
	</div>
	<div data-role="footer">
		<h4><a href="menuP.php">Salir</a></h4>
	</div>
</div>



</body>
</html>