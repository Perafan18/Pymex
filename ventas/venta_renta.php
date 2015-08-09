




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
		<form action="precio.php" method="post" id="myForm" nctype="multipart/form-data">
            <fieldset>
                <legend>Búsqueda Inmobiliario</legend>                
                <fieldset data-role="renta">
                    <legend>Renta:</legend>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-1" id="radio-choice-1" value="sir">
                        <label for="radio-choice-1">SI</label>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-1" id="radio-choice-2" value="nor">
                        <label for="radio-choice-2">NO</label>
                </fieldset>
                 <fieldset data-role="venta">
                    <legend>Venta:</legend>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-2" id="siv" value="siv">
                        <label for="siv">SI</label>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-2" id="nov" value="nov">
                        <label for="nov">NO</label>
                </fieldset>
                <br>
              </fieldset>           
            <input type="submit" value="Enviar" name="btn-signup">
            <input type="reset" value="Borrrar" onClick="borrado()">			
	</div>
	<div data-role="footer">
		<h4><a href="index.html">Salir</a></h4>
	</div>
</div>



</body>
</html>