

function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    minZoom: 13,
    styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#76cabc'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
  });

  bays.forEach(function(bay){
    var pos = {lat: parseFloat(bay['latitude']), lng: parseFloat(bay['longitude'])};
    var secure = bay['secure'] == true ? '<p>This parking bay has secure locking points</p>':'<p>There are no secure locking points at this parking bay</p>';
    var content = bay.image != "" ? '<h3>' + bay['streetname'] + '</h3>'+secure+'<br><img src="'+bay.image+'" height="200" width="400"></img>' : '<h3>' + bay['streetname'] + '</h3>'+secure;

    var secureImage = 'images/map-marker-secure.png';
    var nonSecureImage = 'images/map-marker.png';

    var infowindow = new google.maps.InfoWindow({
      content: content
    });

    var marker = new google.maps.Marker({
      position: pos,
      icon: bay['secure']==true?secureImage:nonSecureImage,
      map: map
    });

    marker.addListener('click', function() {
          infowindow.open(map, marker);
    });
  });

  map.fitBounds(bounds);
}
