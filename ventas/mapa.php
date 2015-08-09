<!DOCTYPE html>
<html lang="en-us" dir="ltr"
	  class='com_content view-article itemid-752 j34 mm-hover'>

<head>
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

  <script src="/t3-assets/js/js-5c76c.js?t=297" type="text/javascript"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript"></script>

  <script src="/t3-assets/js/js-e03bf.js?t=345" type="text/javascript"></script>

  <script type="text/javascript">
jQuery(window).on('load',  function() {
				new JCaption('img.caption');
			});
jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
;jQuery(document).ready(function(){
	jQuery('.hasTooltip').tooltip({"html": true,"container": "body"});
});
  </script>
  <script type="text/javascript">
    (function() {
      Joomla.JText.load({"JLIB_FORM_FIELD_INVALID":"Invalid field:&#160"});
    })();
  </script>
</script>

<!-- Le HTML5 shim and media query for IE8 support -->
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="/plugins/system/t3/base-bs3/js/respond.min.js"></script>
<![endif]-->

<!-- You can add Google Analytics here or use T3 Injection feature -->
<meta name="google-site-verification" content="iD_X10CcCcgJfT4IZJ8Un-orddTOeuISR8CZ9R8VXFw" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-17663461-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Universal Google Analytics Plugin by PB Web Development -->

</head>

<body>  

<div id="t3-mainbody" class="t3-mainbody">
	<div class="row">

		<!-- MAIN CONTENT -->
		<div id="t3-content" class="t3-content col-xs-12">	
	
	<section class="article-content clearfix" itemprop="articleBody">
		<style type="text/css" scoped>
.bs-wizard {margin-top: 40px;}
</style>
  
	<!-- SPOTLIGHT 2 -->
	<div class="container t3-sl t3-sl-2">
			<!-- SPOTLIGHT -->
<!--	<div class="zen-spotlight zen-spotlight-2X  ">  -->
		<div class="row">
							<div id="position-1" class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
<div class="custom"  >
	<LINK REL=StyleSheet HREF="http://mondeca.com/mdc_css/weather.css" TYPE="text/css">

<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript"
	src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.0.2/jquery.simpleWeather.min.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBVTKLztwVOGDuo1qGsjHzdY7wXRcKbAVI"> </script>
<script>
// Docs at http://simpleweatherjs.com

jQuery(document).ready(function($) {

	var weatheron=0;
	$('#weatherbutton').on('click', function() {
    weatheron=1-weatheron;
	 ga('send', 'event', 'button', 'click', 'weather');
      
      
    if (weatheron)
    {
		lng=$('#lng')[0].innerHTML;
		lat=$('#lat')[0].innerHTML;
    	loadWeather(lat+','+lng); //load weather using your lat/lng coordinates
        $('#weatherbutton').html('Hide weather');
        $('#weatherbutton').css('color', 'white');
    }
      else
      {
       
        $('#weather').html('');
        $('#weatherbutton').html('Show weather');
        $('#weatherbutton').css('color', 'white');
          
     }


});
 $("#enviar").click(function(event){
	 	event.preventDefault();
		var lat = $("#lat").text();
		var lon = $("#lng").text();
		$("#inputlat").val(lat);
		$("#inputlng").val(lon);
		$("#form1").submit();
	});

function loadWeather(location, woeid) {
  $.simpleWeather({
    location: location,
    woeid: woeid,
    unit: 'c',
    success: function(weather) {
           
      html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
      html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
      html += '<li class="currently">'+weather.currently+'</li>';
      html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';
  
      
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
}
});
</script>
<script>
  function load() {

      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(22.15469, -100.98583);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").innerHTML = center.lat().toFixed(5);
        document.getElementById("lng").innerHTML = center.lng().toFixed(5);

        
        GEvent.addListener(map, "dragstart", function() {
    		document.getElementById("weather").innerHTML = "";
          document.getElementById("weatherbutton").innerHTML = "Show weather";
        
         });
             
        
	  GEvent.addListener(marker, "dragend", function() {
        ga('send', 'event', 'map', 'drag/move', 'map');
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").innerHTML = point.lat().toFixed(5);
       document.getElementById("lng").innerHTML = point.lng().toFixed(5);

        });
       GEvent.addListener(marker, "dragstart", function() {
    		document.getElementById("weather").innerHTML = "";
            document.getElementById("weatherbutton").innerHTML = "Show weather";
        
         });
        

	 GEvent.addListener(map, "moveend", function() {
       ga('send', 'event', 'map', 'drag/move', 'map');
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = center.lng().toFixed(5);


	 GEvent.addListener(marker, "dragend", function() {
       
       ga('send', 'event', 'map', 'drag/move', 'map');
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	     document.getElementById("lng").innerHTML = point.lng().toFixed(5);

        });
 
        });

      }
    }

	   function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		  document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = point.lng().toFixed(5);
		 map.clearOverlays()
			map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
		 map.addOverlay(marker);

		GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
      document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
	     document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = center.lng().toFixed(5);

	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
    document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
        });
        
        GEvent.addListener(marker, "dragstart", function() {
    		console.log('dragstart');
    		document.getElementById("weather").innerHTML = "";
	        document.getElementById("weatherbutton").innerHTML = "Show weather";
        });
       
       
        });

            }
          }
        );
      }
    }
  
  
  
  
  if(window.attachEvent) {
    window.attachEvent('onload', load);
} else {
    if(window.onload) {
        var curronload = window.onload;
        var newonload = function() {
            curronload();
            load();
        };
        window.onload = newonload;
    } else {
        window.onload = load;
    }
}


</script>
<div style="display:flex;flex-wrap:wrap; margin-top: 2%; margin-bottom: 2%;">
	<div align="center" id="map" style="min-width:300px; min-height:300px;max-width:600px;max-height:600px; width:48%;"></div>
	<div style="display: flex; flex-wrap:wrap; flex-direction:column;
                
              max-width: 600px; justify-content:flex-start; min-width:300px; width:48%; ">
      <form class="form-inline" id="address" style="margin-left:5%; width:100%;" action="#" onreset="showAddress(this.address.value);
                                          ga('send', 'event', 'form', 'submit', 'address');                                                            
                                                                                                      
                                                                                                      return false">             
        <input type="text" size="60" name="address" id="inputaddress" 	value="San Luis Potosí" /> 
          <input type="reset" value="Search" class="" />
      </form>
        <form id="form1" action="reg.php" method="post">
      <table class="table" style="margin-left:5%; margin-top:5%; width:100%;">
            <tbody>
              <tr><th>Latitude</th><th>Longitude</th><th></th></tr>
              <tr>
                  <td style="font-size: 48px; color: green;" id="lat" name="latitud">&nbsp;</td>
                  <td style="font-size: 48px; color: green;" id="lng" name="longitud">&nbsp;</td>
                  <td style="vertical-align:middle;"> 
                 <!-- <button class="weather btn btn-mondeca text-center" id="weatherbutton" style="float:right;" >how weather</button>--></td>
             </tr>
      </tbody>
        </table>

            <fieldset>
              
                <legend>Registro Inmobiliario</legend>
                <label>Área de terreno (m2)</label>
                <input type="number" name="superficie">
                <br>
                
                <fieldset data-role="renta">
                    <legend>Renta:</legend>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-1" id="radio-choice-1" >
                        <label for="radio-choice-1">SI</label>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-1" id="radio-choice-2" >
                        <label for="radio-choice-2">NO</label>
                        
                </fieldset>
                <div id="precior" style="display:none">
                    <label>Precio: </label>
                    <input type="number" name="renta"><br>
                </div>
                 <fieldset data-role="venta">
                    <legend>Venta:</legend>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-2" id="siv" >
                        <label for="siv">SI</label>
                        <input type="radio" onclick="javascript:ventaRenta();" name="radio-choice-2" id="nov" >
                        <label for="nov">NO</label>
                        
                </fieldset>
                <br>
                <div id="preciov" style="display:none">
                    <label>Precio: </label>
                    <input type="number" name="venta"><br>
                </div>
              </fieldset>
                
                <br>
                <br>
                <label>Descripción</label>
                <br>
                <textarea rows="4" cols="50" name="descripcion">
                </textarea>
                <br>
               
            
            
           
              
        <input type="text" name="latitud" id="inputlat" readonly/>
        <input type="text" name="longitud" id="inputlng" readonly>
             <input type="submit" id="enviar" value="Enviar" >
            </form>
        <div id="weather"></div>
    </div>
  </div>

<script>
var formaddress = document.getElementById("address");

formaddress.addEventListener("focusin", myFocusFunction);
formaddress.addEventListener("focusout", myBlurFunction);

function myFocusFunction() {
    document.getElementById("weather").innerHTML = ""; 

                 
}

function myBlurFunction() {
    document.getElementById("weather").innerHTML = ""; 
}

</script>

</div>

					
								
				</div>
			
							<div id="None" class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
										
					&nbsp;
					
								
				</div>
			
				
		</div>

<!--	</div> -->
<!-- SPOTLIGHT -->	</div>
	<!-- //SPOTLIGHT 2 -->

							<div id="footer-3" class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
					
										
					&nbsp;
					
								
				</div>
	
	<section class="t3-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 copyright ">
					
				</div>
							</div>
		</div>
	</section>

</body>

</html>