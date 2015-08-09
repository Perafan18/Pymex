<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: menuP.php");
}
if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM user WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  ?>
        <script>alert('Ingreso con éxito');</script>
        <?php
  		header("Location: menuP.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro de locales para PyMEx</title>
<link href="jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css">
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head>

<body>
<div data-role="page" id="page">
	<div data-role="header">
        <h1><img class="logoimage"src ="logo.png" width="150" height="100"></h1>
		<h1>Ingresar Vendedor</h1>
	</div>
	<div data-role="content">	
		<div id="formulario_registro">

   			<form method="post">
				<table align="center" width="30%" border="0">
				<tr>
                <td><input type="text" name="email" placeholder="Your Email" required /></td>
                </tr>
                <tr>
                <td><input type="password" name="pass" placeholder="Your Password" required /></td>
                </tr>
                <tr>
                <td><button type="submit" name="btn-login">Sign In</button></td>
                </tr>
                <tr>

                </tr>
                </table>
			</form>

		</div>		
	

	</div>
	<div data-role="footer">
		<h4><a href="index.html">Regresar</a></h4>
	</div>
</div>


    
</body>
</html>