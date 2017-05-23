//****************************************************************************
//******************** FUNCTION 1 - SET UP THE MAP ***************************
//****************************************************************************
function initMap() {

	//initialize variables
	var myPosition = {lat: 53.3601147, lng: -6.2763354};
	var directionsDisplay = new google.maps.DirectionsRenderer;
	var directionsService = new google.maps.DirectionsService;
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: myPosition
	});

	//set the marker icon
	//********************
	var myMarkerImage = 'images/marker.png';
	var marker = new google.maps.Marker({
		position: myPosition,
		map: map,
		icon: myMarkerImage
	});

	//display info and image when clicking on the marker icon
	//*******************************************************
	var infoOnClick =
	'<div id = "content">' +
		'<div id = "siteNotice">' +
		'</div>' +
		'<h2> Ardeja Fitness Club </h2>' +
		'<div>' +
			'<p>' +
				'<img src = "images/gym_2.jpg" alt = "Gym Logo" width = "200" height = "85"' +
			'</p>' +
			'<p>' +
				'Ardeja is a Four Star fitness club situated in Dublin city centre.' +
				'We believe in helping you to the best of our abilities.' +
				'It is important for us to know your needs and goals.' +
				'Our team is fully professional, and it is dedicated to providing you ' +
				'with advice, support, fun, and experience.' +
			'</p>' +
		'</div>' +
	'</div>';

	//window with information
	var infowindow = new google.maps.InfoWindow({
		content: infoOnClick
	});

	//add listener to open a window with info
	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});

	//icon marker mouseover and mouseout
	//**********************************
	var iconTitle =
	'<p> Ardeja Fitness Club </p>';

	var titleInfo = new google.maps.InfoWindow({
		content: iconTitle
	});

	//add listener for mouseover (icon marker)
	google.maps.event.addListener(marker, 'mouseover', function() {
		titleInfo.open(map, marker);
	});

	//add listener for mouseout (icon marker)
	google.maps.event.addListener(marker, 'mouseout', function() {
		titleInfo.close();
	});

	//set the panel and map
	//*********************
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById('right-panel'));

	var control = document.getElementById('floating-panel');
	control.style.display = 'block';
	map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

	var onChangeHandler = function() {
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	};

	document.getElementById('start_point').addEventListener('change', onChangeHandler);
}

//****************************************************************************
//********************* FUNCTION 1 - GET THE ROUTE ***************************
//****************************************************************************
function calculateAndDisplayRoute(directionsService, directionsDisplay) {

	//initialize variables
	var start = document.getElementById('start_point').value;
	var end = {lat: 53.3601147, lng: -6.2763354};

	//set the starting point and destination for travel mode (plus display status)
	directionsService.route({
		origin: start,
		destination: end,
		travelMode: google.maps.TravelMode.DRIVING
		}, function(response, status) {
			if (status === google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
			else {
				window.alert('Location cannot be found!');
			}
	});
}