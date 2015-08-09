<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nombre</title>

    <!-- Bootstrap -->
    <?php
    $url = base_url();
    ?>
	<link href="css/animate.css" rel="stylesheet">
    <link href="<?=$url?>css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7170VuMY8-WHDKzMImO-9Lv2LpFH7xwQ"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
  	<nav class="navbar navbar-inverse navbar-static-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Nombre</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="<?=$url?>inicio/negociosCercanos">Ver negocios cercanos</a></li>
	        <li><a href="<?=$url?>nuevo">Nuevo</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Busqueda Personalizada <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?=$url?>inicio/buscarNombre">Nombre</a></li>
	            <li><a href="<?=$url?>inicio/buscarGiro">Giro</a></li>
	            <li><a href="<?=$url?>inicio/buscarColonia">Colonia</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar...">
	        </div>
	        <button type="submit" class="btn btn-primary">Buscar</button>
	      </form>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>