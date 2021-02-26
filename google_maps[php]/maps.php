<?php

?>
<center><div id='map' style="width:100%;height:500px;"></div></center>
<label>Title Here: <center><input type='text' id='title' value='Marker' onkeyup='myMap()'> </center></label>
<label>Label Here:  <center><input type='text' id='label' value='Place' onkeyup='myMap()'></center></label>
<label>Latitude Here:  <center><input type='text' id='lat' value='30.4211144'></center></label>
<label>Longitude Here:  <center><input type='text' id='lng' value='-9.5830626'> </center></label>
<script>
lat1 = document.getElementById('lat').value;
lng1 = document.getElementById('lng').value;
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  document.getElementById('lat').value = position.coords.latitude; 
  document.getElementById('lng').value = position.coords.longitude;
}
getLocation()
function myMap(){
var My_map = document.getElementById('map');
var latlng = { lat:parseFloat(lat1),lng:parseFloat(lng1) };
var maped = {
    center:latlng,
    zoom:5,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var infoWindow = new google.maps.InfoWindow();
var map = new google.maps.Map(My_map,maped);
// add marker() function
function addMarker(latlng){
// add marker
var marker = new google.maps.Marker({
    map: map,
    //icon: icons,
    position: latlng,
    draggable: true,
    title: 'Marker',
    label: {
     text: 'Place',
     color: 'brown',
     fontSize: '16px',
   }
  });
marker.setMap(map);
// infowindow pop up
label=document.getElementById('label').value;
title=document.getElementById('title').value;
if (label != ''){
marker.setLabel(label);
}
if (title != ''){
marker.setTitle(title);
}
//if (lat1 != '' && lng1 != ''){
//cor = { lat:parseFloat(lat1),lng:parseFloat(lng1) };
//lat1 = 44.809122;
//lng1 = -36.650391;
//cor = new google.maps.LatLng(lat1,lng1);
//marker.setPosition(cor);
//map.setZoom(10)
//}
google.maps.event.addListener(marker, "click", function (e) {
infoWindow.setContent('<div class="latlng">lat: '+lat1+' | lng: '+lng1+'<br>Title: '+title+'<br>Label: '+label+'</div><br><a href="map.php?lat='+e.latLng.lat()+'&lng='+e.latLng.lng()+'&label='+label+'&title='+title+'" target="_blank">share link</a>');
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
addMarker(latlng);
// call add marker() function
map.addListener('click', function(e) {
    addMarker(e.latLng);
    document.getElementById('lat').value = e.latLng.lat();
    document.getElementById('lng').value = e.latLng.lng();
  });
}

//marker.setLabel({text: 'mustach',
//     color: 'pink',
//     fontSize: '16px',});
//php?lat=30.4211144&lng=-9.5830626&
//php?id=129003
</script>
<style>
input[type="text"] {

    width: 50%;
    border: 5px solid chocolate;
    padding: 15px 22px;
    border-radius: 6px;
    font-size: 16px;
    font-family: arial;
    font-weight: bold;
    color: bisque;
    background-color: black;

}
body {

    background-color: aliceblue;

}
.latlng{
width: 322px;
height: 100%;
padding: 7px 4px;
text-align: left;
color: aliceblue;
background-color: darkblue;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
