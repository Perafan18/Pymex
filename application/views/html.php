<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pimex</title>

    <!-- Bootstrap -->
    <?php
    $url = base_url();
    ?>
    <link href="<?=$url?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=$url?>css/material.min.css" rel="stylesheet">
    <link href="<?=$url?>css/material-fullpalette.min.css" rel="stylesheet">
    <link href="<?=$url?>css/ripples.min.css" rel="stylesheet">
    <link href="<?=$url?>css/roboto.min.css" rel="stylesheet">
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
  	<nav class="navbar navbar-static-top navbar-material-blue-grey-900">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?=$url;?>"><img src="<?=base_url();?>img/logo.png"  style="height:35px;" alt=""></a>
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
	      <!--
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar...">
	        </div>
	        <button type="submit" class="btn btn-primary">Buscar</button>
	      </form>
	  -->
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row-fluid">
			<!--
			<div>
			<input type="text" maxlength="100" id="address" placeholder="Dirección" /> 
			<input type="button" id="search" value="Buscar" /></div><br/>
			<div id='map_canvas' style="width:600px; height:400px;">
			</div>
			-->
			<?php
			echo isset($contenido)? $contenido : '';
			?>

			<div id="ocupado" class="col-md-10 col-md-offset-1 well well-sm" style="display:none">
				<h1 class="fadeIn animated" id="resultadoOcupado"></h1>
				<a type="button" id="nuevoGiro" href="<?=$url?>inicio/buscarGiros" class=" btn btn-success" style="display:none">Siguiente</a> 			
			</div>	
			

			<div id="tablabla" style="display:none">
				<table class="table table-bordered">';
		          <tr id="resultados">
		            <td>Nombre</td>
		            <td>Tipo de giro</td>
		            <td>direccion</td>
		            <td>Ver en mapa</td>
		          </tr>
		          </table>	
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="col-md-12">
				Tunahack 2015 | Team PentaK
			</div>
		</div>
	</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$url?>js/bootstrap.min.js"></script>
    <script>

    $(document).on("ready",function(){
    	
    	function plantilla(nombre,tipo,direccion,id){
    		var html;
	        html+='  <tr>';
	        html+='    <td>'+nombre+'</td>';
	        html+='    <td>'+tipo+'</td>';
	        html+='    <td>'+direccion+'</td>';
	        html+='    <td>     ';                  
	        html+='      <a class="btn btn-default" href="'+base_url+'inicio/verMapa?id='+id+'" role="button">ver Mapa</a>';
	        html+='    </td> ';        
	        html+='  </tr>';
	        return html;
    		
    	}
    	
    	base_url = "<?php echo base_url();?>";
    	$("#InputNombre").on("keypress",function(event) {
    		$("#tablabla").css("display","block");
    		if ( event.which == 13 ) {
		    	event.preventDefault();
				var value = $(this).val();
		  		$.ajax({
		  			url : base_url+"inicio/busquedaNombre",
		  			type : "POST",
		  			data : {nombre:value},
		  		}).done(function(data){
		  			console.log(data);
		  			if(data!=false){
		  				$.each(data, function(index, val) {
		  					$( "#resultados" ).after(plantilla(val["Nombre"],val["Giro"],val["Domicilio"]+val["Colonia"],val["ID"]));
		  				});
		  			}
		  		});	
		  	}
    	});
    	
    	$("#SelectColonia").change(function(event) {
    		$("#tablabla").css("display","block");
			var colonia = $(this).val();
				$.ajax({
		  			url : base_url+"inicio/busquedaColonia",
		  			type : "POST",
		  			data : {colonia:colonia},
		  		}).done(function(data){
		  			console.log(data);
		  			if(data!=false){
		  				$.each(data, function(index, val) {
		  					$( "#resultados" ).after(plantilla(val["Nombre"],val["Giro"],val["Domicilio"]+val["Colonia"],val["ID"]));
		  				});
		  			}
		  		});
    	});

		$("#SelectGiro").change(function(event) {
			 if(navigator.geolocation) {
			 	var mapOptions = {
			    zoom: 12
			  };
	  			map = new google.maps.Map(document.getElementById('canvasGiro'),mapOptions);
   				 navigator.geolocation.getCurrentPosition(function(position) {

   				 	var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
				    console.log(pos);
				    
				    var infowindow = new google.maps.InfoWindow({
				        map: map,
				        position: pos,
				        content: 'Tu posición'
			 	     });
					
				    
				    var array = [];
				    var arraydos = [];
				     
				    map.setCenter(pos);

   				 	var lat = position.coords.latitude;
   				 	var lon = position.coords.longitude;
					var giro = $("#SelectGiro").val();
					console.log(lat);
					console.log(lon);
					console.log(giro);
					$.ajax({
			  			url : base_url+"nuevo/nuevoGiro",
			  			type : "POST",
			  			data : { giro: giro,lat:lat,lon:lon},
			  		}).done(function(data){
			  			console.log("data:"+data);
			  			if(data!=false){
			  				$.each(data, function(index, val) {
			  					var nuevo = Number(val["Latitud"])/1.0;
				    			var dos = Number(val["Longuitud"])/1.0;
				    			nuevo = parseFloat(nuevo).toFixed(6);
				    			dos = parseFloat(dos).toFixed(6);
				    			var myLatlng = new google.maps.LatLng(dos,nuevo);
				    			var marker = new google.maps.Marker({
						      		position: myLatlng,
								    map: map,
								    title: val["Nombre"]
								});
			  				});
			  				
			  			}
			  		}).fail(function(data){
			  			alert("algo se cago");
			  		});
		  		});
		  	}else{
		  		alert("No es compatible este navegador");
		  	}
    	});

		$("#SelectGiros").change(function(event) {
			$("#tablabla").css("display","block");
			var  giro = $(this).val();
				$.ajax({
		  			url : base_url+"inicio/busquedaGiro",
		  			type : "POST",
		  			data : { giro: giro},
		  		}).done(function(data){
		  			console.log(data);
		  			if(data!=false){
		  				
		  				$.each(data, function(index, val) {
		  					$( "#resultados" ).after(plantilla(val["Nombre"],val["Giro"],val["Domicilio"]+val["Colonia"],val["ID"]));
		  				});
		  				
		  			}
		  		});
    	});


    	$("#comprobarNombre").on("keypress",function(event) {
    		if ( event.which == 13 ) {
		    	event.preventDefault();
				var value = $(this).val();
		  		$.ajax({
		  			url : base_url+"nuevo/nombreOcupado",
		  			type : "POST",
		  			data : {nombre:value},
		  		}).done(function(data){
		  			console.log(data);
		  			$("#ocupado").css("display","block");		  				
		  			$("#resultadoOcupado").text(data.resultado);
		  			if(data.resultado=="Nombre Libre"){
		  				$("#ocupado > a").css("display","block");
		  			}else{	
		  				$("#ocupado > a").css("display","none");
		  			}
		  		});	
		  	}
    	});

    });
	$(document).on("ready",function(){
		initialize();
		console.log("Hola");
	
	});

	$("#todo").click(function(){
		$.ajax({
			url : base_url+"gerardo/pruebados",
			type: "GET",
			cache : false,
		}).done(function(data){
			$.each(data, function(index, val) {
			 	var geocoder = new google.maps.Geocoder();
			    // Hacemos la petición indicando la dirección e invocamos la función
			    // geocodeResult enviando todo el resultado obtenido
			    geocoder.geocode({ 'address': "San Luis Potosi "+val["Domicilio"]}, geocodeResult);
			    console.log(index);
			});
		});
	});
	var map;

	function initialize() {
	  var mapOptions = {
	    zoom: 14
	  };
	  map = new google.maps.Map(document.getElementById('map-canvas'),
	      mapOptions);

	  // Try HTML5 geolocation
	  if(navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	      	//aqui van cosas
	    	
		    var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
		    console.log(pos);
		    
		    var infowindow = new google.maps.InfoWindow({
		        map: map,
		        position: pos,
		        content: 'Tu posición'
	 	     });
			
		    
		    var array = [];
		    var arraydos = [];
		     
		    map.setCenter(pos);
	    	
	    	$.ajax({
	    		url : base_url+"inicio/verCercanos",
	    		type: "GET",
	    		data:{ lon:position.coords.longitude,lat:position.coords.latitude}
	    	}).done(function(data){
	    		console.log(data);
	    		if(typeof data != "undefined"){
	    			$.each(data, function(index, val) {
	    				var nuevo = Number(val["Latitud"])/1.0;
		    			var dos = Number(val["Longuitud"])/1.0;
		    			nuevo = parseFloat(nuevo).toFixed(6);
		    			dos = parseFloat(dos).toFixed(6);
		    			var myLatlng = new google.maps.LatLng(dos,nuevo);
		    			var marker = new google.maps.Marker({
				      		position: myLatlng,
						    map: map,
						    title: val["RazonSocial"]
						});
	    			});
	    		}
	    	});
	    	
	    	/*
	    	setTimeout(function(){
	    		for(var i=0;i<array.length;i++){
	    			var nuevo = Number(array[i])/1.0;
	    			var dos = Number(arraydos[i])/1.0;
	    			nuevo = parseFloat(nuevo).toFixed(6);
	    			dos = parseFloat(dos).toFixed(6);
	    			var myLatlng = new google.maps.LatLng(dos,nuevo);
	    			var marker = new google.maps.Marker({
			      		position: myLatlng,
					    map: map
					});
		    	}
	    	},2000);
	    	*/
	    }, function() {
	      handleNoGeolocation(true);
	    });
	  } else {
	    // Browser doesn't support Geolocation
	    handleNoGeolocation(false);
	  }
	}

	function handleNoGeolocation(errorFlag) {
	  if (errorFlag) {
	    var content = 'Error: The Geolocation service failed.';
	  } else {
	    var content = 'Error: Your browser doesn\'t support geolocation.';
	  }

	  var options = {
	    map: map,
	    position: new google.maps.LatLng(60, 105),
	    content: content
	  };

	  var infowindow = new google.maps.InfoWindow(options);
	  map.setCenter(options.position);
	}
    
	function geocodeResult(results, status) {
	    // Verificamos el estatus
	    if (status == 'OK') {
	        // Si hay resultados encontrados, centramos y repintamos el mapa
	        // esto para eliminar cualquier pin antes puesto
	        var mapOptions = {
	            center: results[0].geometry.location,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
	        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
	        map.fitBounds(results[0].geometry.viewport);
	        // Dibujamos un marcador con la ubicación del primer resultado obtenido
	        var markerOptions = { position: results[0].geometry.location }
	        var marker = new google.maps.Marker(markerOptions);
	        marker.setMap(map);
	        posicion = results[0].geometry.location;
	        var longuitud = posicion.G;
	        var latitude = posicion.K;
	        
	        $.ajax({
		    	url : base_url+"gerardo/guardarDatos",
		    	data: {latitude:latitude,longuitud:longuitud},
		    	
		    });
			
	    } else {
	        // En caso de no haber resultados o que haya ocurrido un error
	        // lanzamos un mensaje con el error
	        alert("Geocoding no tuvo éxito debido a: " + status);
	    }
	}

/* 
 
function load_map() {
    var myLatlng = new google.maps.LatLng(20.68009, -101.35403);
    var myOptions = {
        zoom: 4,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
}
 
$('#search').on('click', function() {
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#address').val();
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
});
 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
        var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        var markerOptions = { position: results[0].geometry.location }
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
    } else {
        // En caso de no haber resultados o que haya ocurrido un error
        // lanzamos un mensaje con el error
        alert("Geocoding no tuvo éxito debido a: " + status);
    }
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude; 
}
*/
    </script>
  </body>
</html>