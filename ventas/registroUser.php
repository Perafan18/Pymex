<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: menu.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 $username = mysql_real_escape_string($_POST['uname']);
 $nombre = mysql_real_escape_string($_POST['nombre']);
 $apellidoM = mysql_real_escape_string($_POST['apellidoM']);
 $apellidoP = mysql_real_escape_string($_POST['apellidoP']);
 $email = mysql_real_escape_string($_POST['email']);
 $userpass = md5(mysql_real_escape_string($_POST['pass']));
 
 if(mysql_query("INSERT INTO user(username,nombre,apellido_m,apellido_p,email,password) VALUES('$username','$nombre','$apellidoM','$apellidoP','$email','$userpass')"))
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Encuesta Shimano</title>
<link href="jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css">
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head>

<body>
<div data-role="page" id="page3">
	<div data-role="header">
    <h1><img class="logoimage"src ="logo.png" width="150" height="100"></h1>
		<h1>Registro</h1>
	</div>
	<div data-role="content">	
		<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="text" name="nombre" placeholder="Nombre" required /></td>
</tr>
<tr>
<td><input type="text" name="apellidoP" placeholder="Apellido Paterno" required /></td>
</tr>
<tr>
<td><input type="text" name="apellidoM" placeholder="Apellido Materno" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="E-Mail" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Contraseña" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Resgistrar</button></td>
</tr>
<tr>

</tr>
</table>
</form>		
	</div>
	<div data-role="footer">
		<h4><a href="index.html">Regresar</a></h4>
	</div>
</div>

    
</body>
</html>