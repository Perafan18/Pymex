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

			
			
		</script>
<?php
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
	 $latitud = mysql_real_escape_string($_POST['latitud']);
	 $longitud = mysql_real_escape_string($_POST['longitud']);
	 
	 if(mysql_query("INSERT INTO inmobiliario(venta,renta,latitud,longitud,descripcion,superficie,enlace_cliente) VALUES('$venta','$renta','$latitud','$longitud','$descripcion','$superficie','$enlace_cliente')"))
	 {
	  ?>
	  		<script>alert('Registro Ingresado');</script>
	  		<?php
	  		?>
	  		
	  		<?php
			
			?>
           
			<?php
	 }
	 else
	 {
	  ?>	
			<script>alert('Ocurrió un error');</script>
	  <?php
			
            ?>
			<?php
	 }
?>
