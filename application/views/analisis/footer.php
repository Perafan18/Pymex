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
    	
    	function plantilla(nombre,tipo,direccion){
    		var html;
	        html+='  <tr>';
	        html+='    <td>'+nombre+'</td>';
	        html+='    <td>'+tipo+'</td>';
	        html+='    <td>'+direccion+'</td>';
	        html+='    <td>     ';                  
	        html+='      <a class="btn btn-default" href=" " role="button">Link</a>';
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
		  					$( "#resultados" ).after(plantilla(val["Nombre"],val["Giro"],val["Domicilio"]+val["Colonia"]));
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
		  					$( "#resultados" ).after(plantilla(val["Nombre"],val["Giro"],val["Domicilio"]+val["Colonia"]));
		  				});
		  			}
		  		});
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
		  					$( "#resultados" ).after(plantilla(val["Nombre"],val["Giro"],val["Domicilio"]+val["Colonia"]));
		  				});
		  				
		  			}
		  		});
    	});

    	$("#comprobarNombre").on("keypress",function(event) {
    		$("#ocupado").css("display","block");
			if ( event.which == 13 ) {
		    	event.preventDefault();
				var value = $(this).val();
		  		$.ajax({
		  			url : base_url+"nuevo/nombreOcupado",
		  			type : "POST",
		  			data : {nombre:value},
		  		}).done(function(data){
		  			console.log(data);		  				
		  			$("#resultadoOcupado").text(data.resultado);
		  		});	
		  	}
    	});

    });
	$("#localizacion").click(function(){
		$("#mapacercanos").css("display","block");
		initialize();
	});

	$("#todo").click(function(){
		$.ajax({
			url : base_url+"gerardo/pruebados",
			type: "GET"
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
	    zoom: 15
	  };
	  map = new google.maps.Map(document.getElementById('map-canvas'),
	      mapOptions);

	  // Try HTML5 geolocation
	  if(navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	      var pos = new google.maps.LatLng(position.coords.latitude,
	                                       position.coords.longitude);

	      var infowindow = new google.maps.InfoWindow({
	        map: map,
	        position: pos,
	        content: 'Tu posición'
	      });

	      map.setCenter(pos);
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

	        $.ajax({
		    	url : base_url+"gerardo/guardarDatos",
		    	data: {latitude:position.coords.latitude,longuitud:position.coords.longitude}
		    });
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
		console.log("holla");
	    x.innerHTML = "Latitude: " + position.coords.latitude + 
	    "<br>Longitude: " + position.coords.longitude;
	}
	$(document).on(function(){
		load_map();
		
	});
	function load_map() {
		    var myLatlng = new google.maps.LatLng(20.68009, -101.35403);
		    var myOptions = {
		        zoom: 4,
		        center: myLatlng,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
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