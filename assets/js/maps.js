var map = L.map('map', {
    'center': [0, 0],
    'zoom': 0,
    'layers': [
        L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
        })
    ]
});

var markers = {};

function setMarkers(data) {

    data.forEach(function (obj) {
        if (!markers.hasOwnProperty(obj.id)) {

            var icon = L.divIcon({
                className: 'custom-div-icon',
                html: "<img src='./../assets/img/animals/"+obj.name.toLowerCase()+".png' width='40' height='30'>",
                iconSize: [30, 42],
                iconAnchor: [15, 42]
            });

            markers[obj.id] = new L.Marker([obj.lat, obj.long],{icon: icon,title:obj.serial}).addTo(map);
            markers[obj.id].previousLatLngs = [];
        } else {
            markers[obj.id].previousLatLngs.push(markers[obj.id].getLatLng());
            markers[obj.id].setLatLng([obj.lat, obj.long]);
        }

    });
}


