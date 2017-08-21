//Fonction pour le bouton 'Center map' : mise en place du css et du listener
function CenterControl(controlDiv, map) 
{
  // CSS du bouton
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '2px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginTop = '10px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Cliquer ici pour recentrer la map';
  controlDiv.appendChild(controlUI);

  // CSS du texte du bouton
  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
  controlText.style.fontWeight = 'bold';
  controlText.style.fontSize = '14px';
  controlText.style.padding = '8px';
  controlText.innerHTML = 'Center Map';
  controlUI.appendChild(controlText);

  // Listener du bouton
  controlUI.addEventListener('click', function() 
  {
    map.setCenter(new google.maps.LatLng(50.463882 , 3.952698));
	map.setZoom(15);
  });
}

//Fonction qui met en place la Map
function myMap()
{
	myCenter=new google.maps.LatLng(50.463882 , 3.952698);
	myMarker=new google.maps.LatLng(50.463882, 3.952698);
	var mapOptions= 
	{
		center:myCenter,
		zoom:15, scrollwheel: false, draggable: true,
		mapTypeId:google.maps.MapTypeId.ROADMAP 
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);
	
	/*
	var marker = new google.maps.Marker
	({
		position: myMarker,
	});
	marker.addListener('click', function() 
	{
		map.setZoom(19);
		map.setCenter(marker.getPosition());
	});
	marker.setMap(map);
	*/
	
	// Mise en place du cercle sur la Map
	var circle = new google.maps.Circle
	({
		strokeColor: '#90e1d6',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#90e1d6',
		fillOpacity: 0.6,
		map: map,
		center: myMarker,
		radius: 160
	});

	// Mise en place du bouton 'Center' sur la Map
	var centerControlDiv = document.createElement('div');
	var centerControl = new CenterControl(centerControlDiv, map);

	centerControlDiv.index = 1;
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(centerControlDiv);
}





