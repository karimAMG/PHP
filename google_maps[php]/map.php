<?php
if(isset($_GET['lat']) and isset($_GET['lng'])){
if($_GET['lat'] != '' and $_GET['lng'] != ''){
if(isset($_GET['title']) and isset($_GET['label'])){
if($_GET['title'] != '' and $_GET['label'] != ''){
$label = $_GET['label'];
$title = $_GET['title'];
echo '<script>title="'.$title.'";label="'.$label.'";</script>';
}
}
$lat = $_GET['lat'];
$lng = $_GET['lng'];
echo '<script>var latlng = { lat:'.$lat.',lng:'.$lng.' };</script>';
}else{
echo '<script>var latlng = { lat:30.4211144,lng:-9.5830626 };title="Marker";label="Place";</script>';
}
}else{
echo '<script>var latlng = { lat:30.4211144,lng:-9.5830626 };title="Marker";label="Place";</script>';
}
?>
<!-- map here -->
<div id='map' style="width:100%;height:100%;"></div>
<script>
function myMap(){
var My_map = document.getElementById('map');
var maped = {
    center:latlng,
    zoom:5,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var infoWindow = new google.maps.InfoWindow();
var map = new google.maps.Map(My_map,maped);
// add marker
var marker = new google.maps.Marker({
    map: map,
    //icon: icons,
    position: latlng,
    title: title,
    label: {
     text: label,
     color: 'brown',
     fontSize: '16px',
   }
  });
marker.setMap(map);
// infowindow pop up
google.maps.event.addListener(marker, "click", function (e) {
infoWindow.setContent('<div class="latlng">lat: '+e.latLng.lat()+' | lng: '+e.latLng.lng()+'<br>Title: '+title+'<br>Label: '+label+'</div>');
infoWindow.open(map, marker);
})
google.maps.event.addListener(marker, 'dblclick', function (e) {
                zoom = map.getZoom();
                if (zoom < 10){
                map.setZoom(16);
                map.setCenter(e.latLng);
                }
                if (zoom == 16){
                    map.setZoom(18)
                }
                if (zoom == 18){
                    map.setZoom(19)
                }
                if (zoom == 19){
                    alert('Dude !! No More Zooming ;)')
                }
                
           });
// remove marker
google.maps.event.addListener(marker, 'rightclick', function(e) {
        marker.setMap(null);
    });
}

if (frameElement == null) {
    //change location or close
    window.location = "iframe.php";
    // or window.close();
}
    </script>
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
