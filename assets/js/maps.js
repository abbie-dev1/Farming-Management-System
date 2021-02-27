mapboxgl.accessToken = 'pk.eyJ1IjoiZ29sZHdpbmZhbmEiLCJhIjoiY2tsamJoZHdhMjd2NDJ6bWdvemxydWMzOCJ9.N4lxy0RwuwipREz3-sDacw';

function remaker(geo) {
    var geojson = {'type': 'FeatureCollection', 'features': []};
    geojson.features=geo;

    if(geojson.features.length ===1) {
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [geojson.features[0].geometry.coordinates[0], geojson.features[0].geometry.coordinates[1]],

            zoom: 20

        });
    }else{
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [geojson.features[0].geometry.coordinates[0], geojson.features[0].geometry.coordinates[1]],

            zoom: 15

        });
    }

// add markers to map
    geojson.features.forEach(function (marker) {
// create a DOM element for the marker
        var el = document.createElement('div');
        el.className = 'marker';
        el.style.backgroundImage = 'url(./../assets/img/animals/'+marker.properties.message+'.png)';
        el.style.backgroundSize = 'contain';
        el.style.width = marker.properties.iconSize[0] + 'px';
        el.style.height = marker.properties.iconSize[1] + 'px';

        el.addEventListener('mouseover', function () {
            var span=document.createElement('span');
            span.className='tooltiptext';
            span.innerHTML= '<p>'+marker.properties.message+'</p><p> SR No:'+marker.properties.serial+'</p>';
            if(el.hasChildNodes()){
                el.replaceChild(span,el.childNodes[0]);
            }else{
                el.append(span);
            }

        });

// add marker to map
        new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);
    });
}