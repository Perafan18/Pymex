



<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Consulta</title>
<link href="jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery.mobile-1.0.min.js" type="text/javascript"></script>
<meta http-equiv="content-type" charset="encoding" content="text/html; charset=iso-8859-1">
</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
		<h1><img class="logoimage"src ="logo.png" width="150" height="100"></h1>
		<h1>Bienvenido(a) </h1>
	</div>
    <div data-role="content">
    <?php
		include_once 'dbconnect.php';
		if(isset($_POST['radio-choice-1']))
		{
			if( $_POST['radio-choice-1'] == 'sir' ) 
			{
			$consulta_mysql="SELECT * FROM inmobiliario WHERE renta > 0 ORDER BY renta";
			$resultado_consulta_mysql=mysql_query($consulta_mysql);
	?>
    	<table align="center" border="4">
            <caption><h1>RENTA</h1></caption>
            <tbody>
              <tr>
                 <th><h3> Precio Renta.</h3></th>
                 <th><h3> Descripción.</h3></th>
                 <th><h3> Superficie (m<sup>2</sup>).</h3></th>
                 <th><h3> Dueño.</h3></th>
    <?php 
		while($row=mysql_fetch_array($resultado_consulta_mysql,MYSQL_ASSOC))
		{
			$user_id = $row['enlace_cliente'];
			$consulta_mysql2="SELECT username FROM user WHERE user_id = '$user_id'";
			$resultado_consulta_mysql2=mysql_query($consulta_mysql2);
			while($row2=mysql_fetch_array($resultado_consulta_mysql2,MYSQL_ASSOC))
				$duenio=$row2['username'];
			$renta = $row['renta'];
		    $descripcion = $row['descripcion'];
			$superficie = $row['superficie'];
	?>
			<tr>
            <td><?php echo "<p>".$renta."</p>"; ?></td>
            <td><?php echo "<p>".$descripcion."</p>"; ?></td>
            <td><?php echo "<p>".$superficie."</p>"; ?></td>
            <td><?php echo "<p>".$duenio."</p>"; ?></td>
            </tr>
     <?php
		}
		}
		}
		include_once 'dbconnect.php';
		if(isset($_POST['radio-choice-2']))
		{
			if( $_POST['radio-choice-2'] == 'siv' ) 
			{
			$consulta_mysql="SELECT * FROM inmobiliario WHERE venta > 0 ORDER BY venta";
			$resultado_consulta_mysql=mysql_query($consulta_mysql);
	?>
    	<table align="center" border="4">
            <caption><h1>VENTA</h1></caption>
            <tbody>
              <tr>
                 <th><h3> Precio Venta.</h3></th>
                 <th><h3> Descripción.</h3></th>
                 <th><h3> Superficie (m<sup>2</sup>).</h3></th>
                 <th><h3> Dueño.</h3></th>
    <?php 
		while($row=mysql_fetch_array($resultado_consulta_mysql,MYSQL_ASSOC))
		{
			$user_id = $row['enlace_cliente'];
			$consulta_mysql2="SELECT username FROM user WHERE user_id = '$user_id'";
			$resultado_consulta_mysql2=mysql_query($consulta_mysql2);
			while($row2=mysql_fetch_array($resultado_consulta_mysql2,MYSQL_ASSOC))
				$duenio=$row2['username'];
			$venta = $row['venta'];
		    $descripcion = $row['descripcion'];
			$superficie = $row['superficie'];
	?>
			<tr>
            <td><?php echo "<p>".$venta."</p>"; ?></td>
            <td><?php echo "<p>".$descripcion."</p>"; ?></td>
            <td><?php echo "<p>".$superficie."</p>"; ?></td>
            <td><?php echo "<p>".$duenio."</p>"; ?></td>
            </tr>
    <?php
        }
		}
		}
		
	?>
    </tr>
    </tbody>
    </table>
    </div>
	<div data-role="footer">
		<h4><a href="index.html">Salir</a></h4>
	</div>
</div>
</body>
</html>