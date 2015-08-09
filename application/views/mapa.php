<?php
$Latitud = $coordenadas["0"]["Latitud"];
$Longuitud = $coordenadas["0"]["Longuitud"];
//print_r($datos);
$RazonSocial = $datos["0"]["Nombre"];
$Giro = $datos["0"]["Giro"];
$Direccion = $datos["0"]["Domicilio"]." ,".$datos["0"]["Colonia"];
?>
<div class="col-md-8 well">
    <div class="embed-responsive embed-responsive-16by9">
        <div id="canvas" class="embed-responsive-item"></div>
    </div>
</div>
<div class="col-md-4 well">
  <div class="list-group">
    <a href="#" class="list-group-item">
      Razón Social: <?=$RazonSocial?>
    </a>
    <a href="#" class="list-group-item">Giro: <?=$Giro?></a>
    <a href="#" class="list-group-item">Dirección: <?=$Direccion?></a>
  </div>
</div>
<script>
  function initializeDos() {
  var myLatlng = new google.maps.LatLng(<?=$Longuitud?>,<?=$Latitud?>);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
}

google.maps.event.addDomListener(window, 'load', initializeDos);
</script>
